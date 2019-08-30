<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('UserModel');
    }

    public function index() {

        $data['middle'] = 'middle/pocetna';
        $this->load->view('viewTemplate', $data);
    }

    public function login() {

        $username = $this->input->post('korisnicko');
        $password = $this->input->post('lozinka');

        $users = $this->UserModel->login($username, $password);
        
        if (password_needs_rehash($password, PASSWORD_DEFAULT)) {
                $this->UserModel->hashstored($username, $password);
            }

        if ($users) {
            $this->session->set_userdata('user', $this->UserModel->dohvatiKorisnika($username));
            $this->output->enable_profiler(false);
            redirect('User');
        } else {

            redirect("Login");
        }
    }

}
