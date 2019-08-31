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

        $data['middle'] = 'middle/login';
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
            redirect("Login");
        } else {
            $korisnici = $this->UserModel->dohvatiKorisnika($username);
            $user = $korisnici[0];
            $this->session->set_userdata('user', $user);
            $this->output->enable_profiler(false);
            redirect('User');
        }
    }

}
