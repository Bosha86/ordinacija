<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Rezervacija
 *
 * @author gordan
 */
class Rezervacija extends CI_Controller {

    public function __construct() {
        parent::__construct();
        

        if (!$this->session->has_userdata('user')) {
            redirect('Login');
        }
        $this->load->model('RezervacijaModel');
    }

    public function index() {
        
        $data['middle'] = 'middle/rezervacija';
        $data['middle_data'] = ['usluge' => $this->RezervacijaModel->dohvatiUsluge()];
       
        $this->load->view('viewTemplate', $data);
    }
    
    public function rezervisi(){
        
        $vremeUkupno = (explode(':', $this->input->post('termin')));
        $sat = $vremeUkupno[0];
        $minut = $vremeUkupno[1];
        
        
        $datum = date("Y-m-d", strtotime($this->input->post('datum')));
        $vreme = date("H:i:s", mktime($sat, $minut,0,0));
       
        $idKor = $this->session->userdata('user')['idKor'];
        $ime = $this->session->userdata('user')['ime'];
        $prezime = $this->session->userdata('user')['prezime'];
        $mejl = $this->session->userdata('user')['email'];
        $idDok = $this->input->post('doktor');
        $idUsl = $this->input->post('usluga');
        $this->RezervacijaModel->rezervacija($datum, $vreme, $idKor, $idDok, $idUsl);  
        $kod = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        $msg = "Poštovani/a $ime $prezime, uspešno ste zakazali termin u ordinaciji 'Unident PRO' za ".date("d.m.Y", strtotime($this->input->post('datum')))." u ".$this->input->post('termin')." časova. Vas jedinstveni kod je $kod.";
        $this->posaljiMejl($mejl, $msg);
        echo "Uspešno ste zakazali termin za ".date("d.m.Y", strtotime($this->input->post('datum')))." u ".$this->input->post('termin')." časova. Uskoto ce vam stici mejl.";
    }
    
    public function prikaziTermine(){
        $datum = $this->input->get('datum');
        $doktor = $this->input->get('doktor');
//        $zauzetiTermini = $this->RezervacijaModel->zauzetiTermini($doktor, $datum);
//        $doktori = $this->RezervacijaModel->dohvatiDoktore();
        
        $data = ["zauzetiTermini" => $this->RezervacijaModel->zauzetiTermini($doktor, $datum),
                 "doktori" => $this->RezervacijaModel->dohvatiDoktore(),
                 "odabraniDoktor" => $doktor,
                 "sati" => $this->get_hours_range(),
                 "datum" => $datum];
        $this->load->view('termini', $data);
        
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


        public function posaljiMejl($mejl, $msg){
        
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
    }


}
