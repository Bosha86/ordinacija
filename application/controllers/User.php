<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {
   
    public function __construct() {
        parent::__construct();
        
         if (!$this->session->has_userdata('user')) {
            redirect('Login');
       }   
       $this->load->model('UserModel');
    }
    //F-JA ZA OTVARANJE POETNE STRANICE NAKON LOGOVANJA
    public function index(){
        
        $idKor = $this->session->userdata('user')['idKor'];
        $idTer = $this->input->get('idTer');
        $data['middle'] = 'middle/pocetna';
        //SALJEMO TERMINE I USLUGE, JER KORISNIK TREBA DA VIDI SVOJE ZAKAZANE, OTKAZANE I URADJENE TERMINE
        $data['middle_data'] = ['termini' => $this->UserModel->termini($idKor),
                                'usluge' => $this->UserModel->usluge($idKor, $idTer)];
//  OVO SA USLUGAMA JOS TREBA PROVERITI ZASTO VRACA POGRESNE PODATKE
        $this->load->view('viewTemplate', $data);
    }
    
    public function usluge(){
        
        // F-JA ZA DOHVATANJE USLUGA (URADJENIH)
       $idKor = $this->session->userdata('user')['idKor'];
       $idTer = $this->input->get('idTer');
       $usluge = $this->UserModel->usluge($idKor, $idTer);
       $this->load->view('middle/usluge', ['usluge' => $usluge]);
        
        
    }

    public function otkazTermina(){
        //F-JA ZA OTKAZIVANJE TERMINA
       $idKor = $this->session->userdata('user')['idKor'];
       $idTer = $this->input->get('idTer');
       $this->UserModel->otkazTermina($idKor, $idTer);
       redirect('User');
    }

    public function logout(){
//LOGOUT
          $this->session->sess_destroy();
          redirect("Login");
      }
      
      
}