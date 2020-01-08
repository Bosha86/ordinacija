<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        
         if (!$this->session->has_userdata('user')) {
            redirect('Login');
         }else if($this->session->userdata('user')['tip'] !== "a"){
           redirect('User');
         }
       $this->load->model('AdminModel');
       $this->load->model('RezervacijaModel');
    }
    
    public function index(){
        $korisnici = $this->AdminModel->dohvatiKorisnike();
        $data['middle'] = 'middle/admin';
        $data['middle_data'] = ['korisnici' => $korisnici];
        $this->load->view('viewTemplate', $data);
    }
    
    
    function get_hours_range( $start = 32400, $end = 68400, $step = 1800, $format = 'H:i:s' ) {
        $times = array();
        foreach ( range( $start, $end, $step ) as $timestamp ) {
                $hour_mins = gmdate( 'H:i', $timestamp );
                if ( ! empty( $format ) )
                        $times[$hour_mins] = gmdate( $format, $timestamp );
                else $times[$hour_mins] = $hour_mins;
        }
        return $times;
}

    public function termini(){
        $datum = $this->input->get('datum');
        $listaSati = $this->get_hours_range( $start = 32400, $end = 68400, $step = 1800, $format = 'H:i:s' );
        $terminiZaIspis = [];
        $termini = $this->AdminModel->dohvatiTermine($datum);
        foreach ($termini as $termin){
            $terminiZaIspis[$termin['vreme']][] = $termin;
        }
        
        
        foreach ($listaSati as $sat){
             $satZaIspis=date("H:i", strtotime($sat));
             
             $dan = "<div class='termin-admin'><span class='sat'>$satZaIspis</span>";
             
            if(isset($terminiZaIspis[$sat])){
                foreach ($terminiZaIspis[$sat] as $terminIspis){
                    $idTer = $terminIspis['idTer'];
                    $datum = $terminIspis['datum'];
                    $vreme = $terminIspis['vreme'];
                    $idKor = $terminIspis['idKor'];
                    $idDok = $terminIspis['idDok'];
                    $idUsl = $terminIspis['idUsl'];
                    $naziv = $terminIspis['naziv'];
                    $imeKor = $terminIspis['korisnikIme'];
                    $prezKor = $terminIspis['korisnikPre'];
                    $imeDok = $terminIspis['ime'];
                    $prezDok = $terminIspis['prezime'];
                    
                $dan.= "<a href='#' onclick='prikaziInfo($idTer)'><span class='naziv-termina'>Dr $prezDok - $naziv</span></a>";
//                echo "<div class='termin-admin-zauzeto'><span class='sat'>$satZaIspis<br/><span class='naziv-termina'> Dr $prezDok - $naziv</span></span></div>";
//            }
                }  
            }else if(!isset($terminiZaIspis[$sat])){
                
                $dan.= "<span class='slobodni-termini'>Nema zauzetih termina</span>";
                
//                echo $dan;
//                echo "<div class='termin-admin'><span class='sat'>$satZaIspis<br/>Nema zakazanih termina<br/><br/><input type='button' value='Zakazi'></span></div>";
            }
            $dan.= "</div>";
            echo $dan;
        }
    }
    
    public function korisnici(){
        $korisnici = $this->AdminModel->dohvatiKorisnike();
        $data['middle'] = 'middle/admin';
        $data['middle_data'] = ['korisnici' => $korisnici];
        $this->load->view('viewTemplate', $data);
    }
    
    
    public function dohvatiInfoZaTermin(){
        $idTer = $this->input->get('idTer');
        $podaci = $this->AdminModel->dovatiPodatke($idTer);
        foreach ($podaci as $podatak){
                    $idTer = $podatak['idTer'];
                    $datum = $podatak['datum'];
                    $vreme = $podatak['vreme'];
                    $idKor = $podatak['idKor'];
                    $idDok = $podatak['idDok'];
                    $idUsl = $podatak['idUsl'];
                    $naziv = $podatak['naziv'];
                    $imeKor = $podatak['korisnikIme'];
                    $prezKor = $podatak['korisnikPre'];
                    $imeDok = $podatak['ime'];
                    $prezDok = $podatak['prezime'];
                    $kod = $podatak['kod'];
        }
        
        echo "<table class='table'><tr><td>Doktor: </td><td>$imeDok $prezDok </td></tr><tr><td>Korisnik usluge:</td><td>$imeKor $prezKor</td></tr><tr><td>Datum: </td><td>$datum</td></tr><tr><td>Vreme: </td><td>$vreme</td></tr> <tr><td>Usluga: </td><td>$naziv</td></tr><tr><td>Kod: </td><td>$kod</td></tr></table><input type='hidden' name='idTermina' id='idTermina' value='$idTer'>";
        
        
        
       
    }
    
    public function uradjeno(){
        $idTer = $this->input->post('idTer');
        $this->AdminModel->uradjeno($idTer);
        $podaci = $this->AdminModel->dovatiPodatke($idTer);
        foreach ($podaci as $podatak){
            $idKor = $podatak['idKor'];
            $idUsl = $podatak['idUsl'];
        }
        $this->AdminModel->dodajRadjeno($idTer, $idKor, $idUsl);
        echo "Termin je obelezen kao uradjen";
    }
    
    public function otkazi(){
        $idTer = $this->input->post('idTer');
        $podaci = $this->AdminModel->dovatiPodatke($idTer);
        foreach ($podaci as $podatak){
        $mejl = $podatak['email'];
        $ime = $podatak['korisnikIme'];
        $prezime = $podatak['korisnikPre'];
        $vreme = $podatak['vreme'];
        $datum = $podatak['datum'];        
        }
        $this->AdminModel->otkazi($idTer); 
        $msg = "Postovani/a $ime $prezime, Vas termin za $datum u $vreme casova je otkazan. Molimo Vas da zakazete novi termin.";
        $this->posaljiMejl($mejl, $msg);
        echo "Termin je otakazan";
                
        
        
    }
    
    
    function posaljiMejl($mejl, $msg){
        //OVDE SAMO KAZES DA SMO U BIBLIOTEKE DODALI PHPMAILER BIBLIOTEKU PO DRAZENOVIM ISTRUKCIJAMA
            //I TU BIBLIOTEKU OVDE POZIVAMO
             $this->load->library('Phpmailer_lib');
             $Mail = $this->phpmailer_lib->load();

            $Mail->SMTPDebug = 0;
            $Mail->Mailer = 'smtp';
            $Mail->isSMTP();
            $Mail->Host = "smtp.gmail.com";
            $Mail->Port = 587;
            $Mail->SMTPSecure = "tls";
            $Mail->SMTPAuth = true;
            $Mail->Username = "karijera.online@gmail.com";
            $Mail->Password = "A123A123*";
            $Mail->SetFrom("admin-karijera.online@gmail.com");
            $Mail->Subject = 'Obaveztenje o otkazivanju termina';
            $Mail->Body = $msg;
            $Mail->AddAddress($mejl); 
            $Mail->Send();
    }
    
    public function pretraga(){
        $korisnicko = $this->input->get('korisnicko');
        $ime = $this->input->get('ime');
        $prezime = $this->input->get('prezime');
        $email = $this->input->get('email');
        $telefon = $this->input->get('telefon');
        $rodjen = $this->input->get('rojendan');
        
        $rezultat = $this->AdminModel->pretraga($korisnicko, $ime, $prezime, $email, $telefon, $rodjen);
        if(empty($rezultat)){
            $data['middle'] = 'middle/admin';
            $data['middle_data'] = ['msgPret' => 'Nema rezultata'];
            $this->load->view('viewTemplate', $data);
        }else{
            $data['middle'] = 'middle/admin';
            $data['middle_data'] = ['korisnici' => $rezultat]; 
            $this->load->view('viewTemplate', $data);
        }
        
    }

    public function komentari(){
        $komentari = $this->AdminModel->sviKomentari();
        $data['middle'] = 'middle/admin';
        $data['middle_data'] = ['komentari' => $komentari];
        $this->load->view('viewTemplate', $data);
    }
    
    public function obrisiKomentar($idRad){
        $this->AdminModel->obrisiKomentar($idRad);
        $this->komentari();
    }
    
}
