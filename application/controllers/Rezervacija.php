<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rezervacija extends CI_Controller {

    public function __construct() {
        parent::__construct();
        

        if (!$this->session->has_userdata('user')) {
            redirect('Login');
        }
        $this->load->model('RezervacijaModel');
    }
// F-JA ZA OTVARANJE STRANICE ZA REZERVACIJE
    public function index() {
        
        $data['middle'] = 'middle/rezervacija';
        //PROSLEDJUJEMO NIZ SVIH USLUGA IZ BAZE, DA BISMO MOGLI DA IH ISPISEMO
        $data['middle_data'] = ['usluge' => $this->RezervacijaModel->dohvatiUsluge()];
       
        $this->load->view('viewTemplate', $data);
    }
    //F-JA ZA REZERVACIJE
    public function rezervisi(){
       //VREME EXPLODUJEMO ZATO STO JE TO NEOPHODNO DA BI SE LEPO UPISALO U BAZU
        //SAMO ZBOG FORMATA VREMENA I DATUMA
        $vremeUkupno = (explode(':', $this->input->post('termin')));
        $sat = $vremeUkupno[0];
        $minut = $vremeUkupno[1];
        
        
        $datum = date("Y-m-d", strtotime($this->input->post('datum')));
        $vreme = date("H:i:s", mktime($sat, $minut,0,0));
       //POKUPIMO SVE PODATKE IZ SESIJE I IZ POSTA (PREKO AJAXA SMO POSLALI)
        $idKor = $this->session->userdata('user')['idKor'];
        $ime = $this->session->userdata('user')['ime'];
        $prezime = $this->session->userdata('user')['prezime'];
        $mejl = $this->session->userdata('user')['email'];
        $idDok = $this->input->post('doktor');
        $idUsl = $this->input->post('usluga');
        //KAZEMO MODELU DA IZVRSI REZERVACIJU, TJ DA UPISE SVE U BAZU
        $this->RezervacijaModel->rezervacija($datum, $vreme, $idKor, $idDok, $idUsl); 
        //NAPRAVIMO KOD OD RENDOM 10 SLOVA
        $kod = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        //NAPRAVIMO PORUKU ZA MEJL
        $msg = "Poštovani/a $ime $prezime, uspešno ste zakazali termin u ordinaciji 'Unident PRO' za ".date("d.m.Y", strtotime($this->input->post('datum')))." u ".$this->input->post('termin')." časova. Vas jedinstveni kod je $kod.";
        //POZOVEMO F-JU ZA SLANJE MEJLA (I PROSLEDIMO MEJL ADRESU ULOGOVANOG KORINIKA I PORUKU KOJU SMO UPRAVO NAPRAVILI)
        $this->posaljiMejl($mejl, $msg);
        echo "Uspešno ste zakazali termin za ".date("d.m.Y", strtotime($this->input->post('datum')))." u ".$this->input->post('termin')." časova. Uskoto ce vam stici mejl.";
    }
    //F-JA ZA PRIKAZIVANJE SVIH ZAUZETIH TERMINA KOD ODABRANOG LEKARA ZA ODABRANI DATUM
    public function prikaziTermine(){
        $datum = $this->input->get('datum');
        $doktor = $this->input->get('doktor');
        // POACI KOJE PROSLEDJUJEMO SU ZAUZETI TERMINI, SVI DOKTORI, ODABRANI DOKTOR, SATI (IZ FUNKCIJE DOLE) I DATUM
        $data = ["zauzetiTermini" => $this->RezervacijaModel->zauzetiTermini($doktor, $datum),
                 "doktori" => $this->RezervacijaModel->dohvatiDoktore(),
                 "odabraniDoktor" => $doktor,
                 "sati" => $this->get_hours_range(),
                 "datum" => $datum];
        // I UCITAVAMO VIEW, KOJI JE ZAPRAVO ONAJ DEO PORED KALENDARA U KOM PISE LISTA SVIH SLOBODNI/ZAUZETIH TERMINA
        $this->load->view('termini', $data);
        
    }
    

    
    // F-JA ZA TERMINE, PRIKAZUJE SVE OD 9 DO 19 CASOVA, NA PO POLA SATA
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

    //F-JA ZA SLANJE MEJLA, PO DRAZENOVIM INSTRUKCIJAMA
        public function posaljiMejl($mejl, $msg){
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
            $Mail->Subject = 'Potvrda rezervacije termina';
            $Mail->Body = $msg;
            $Mail->AddAddress($mejl); 
            $Mail->Send();
    }


}
