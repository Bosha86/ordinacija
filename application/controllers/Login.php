<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if ($this->session->has_userdata('user')) {
            redirect('User');
        }
        $this->load->model('UserModel');
    }


    public function index() {
        
        $data['middle'] = 'middle/guest';
        $data['middle_data'] = ['kontakt' => $this->load->view('kontakt_deo', '', true)];
        $this->load->view('viewTemplate', $data);
    }

    public function login() {

        $username = $this->input->post('korisnicko');
        $password = $this->input->post('lozinka');

        $users = $this->UserModel->login($username, $password);

        if (password_needs_rehash($password, PASSWORD_DEFAULT)) {
            $this->UserModel->hashstored($username, $password);
        }

        if (empty($users)) {      
            $this->session->set_flashdata('log','false');
            redirect('Login');
        } else {
            $korisnici = $this->UserModel->dohvatiKorisnika($username);
            $user = $korisnici[0];
            $this->session->set_userdata('user', $user);
            if($user['tip'] == 'k'){
                    redirect('User');
            }else if($user['tip'] == 'a'){
                    redirect('Admin');
            }
        }
    }
    
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
    

    
}
