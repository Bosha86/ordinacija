<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of User
 *
 * @author gordan
 */
class User extends CI_Controller {
   
    public function __construct() {
        parent::__construct();
        
         if (!$this->session->has_userdata('user')) {
            redirect('Login');
       }   
       $this->load->model('UserModel');
    }
    
    public function index(){
        
        $idKor = $this->session->userdata('user')['idKor'];
        $idTer = $this->input->get('idTer');
        $data['middle'] = 'middle/pocetna';
        $data['middle_data'] = ['termini' => $this->UserModel->termini($idKor),
                                'usluge' => $this->UserModel->usluge($idKor, $idTer)];
        $this->load->view('viewTemplate', $data);
    }
    
    public function usluge(){
        
        
       $idKor = $this->session->userdata('user')['idKor'];
       $idTer = $this->input->get('idTer');
       $usluge = $this->UserModel->usluge($idKor, $idTer);
       $this->load->view('middle/usluge', ['usluge' => $usluge]);
        
        
    }

    public function otkazTermina(){
        
       $idKor = $this->session->userdata('user')['idKor'];
       $idTer = $this->input->get('idTer');
       $this->UserModel->otkazTermina($idKor, $idTer);
       redirect('User');
    }

    public function logout(){

          $this->session->sess_destroy();
          redirect("Login");
      }
      
      
}