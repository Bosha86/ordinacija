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
        $data['middle'] = 'middle/pocetna';
        $data['middle_data'] = ['prethodneUsluge' => $this->UserModel->prethodneUsluge($idKor)];
        $this->load->view('viewTemplate', $data);
    }
    
    public function logout(){
          $this->session->sess_destroy();
          redirect("Login");
      }
}