<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stranice extends CI_Controller{
   // BUKVALNO SAMO FUNCKIJE ZA OTVARANJE SVIH STRANICE
    public function oNama(){
         $data['middle'] = 'middle/oNama';
         $this->load->view('viewTemplate', $data);
    }
    
    public function tim(){
        $data['middle'] = 'middle/tim';
        $this->load->view('viewTemplate', $data);
    }
    
    public function usluge(){
        $data['middle'] = 'middle/ponuda';
        $this->load->view('viewTemplate', $data);
    }
    
    public function cenovnik(){
        $this->load->model("RezervacijaModel");
        $usluge = $this->RezervacijaModel->dohvatiUsluge();
        
        $data['middle'] = 'middle/cenovnik';
        $data['middle_data'] = ['usluge' => $usluge];
        $this->load->view('viewTemplate', $data);
    }
    
    public function kontakt(){
        
        $data['middle'] = 'middle/kontakt';
        $data['middle_data'] = ['kontakt_deo' => $this->load->view('kontakt_deo','', true)];
         $this->load->view('viewTemplate', $data);
    }
    
    
}
