<?php

defined('BASEPATH') or exit('no direct access');

/**
 * Description of Registracija
 *
 * @author gordan
 */
class Registracija extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->has_userdata('user')) {
            redirect('User');
        }

        $this->load->model('RegistracijaModel');
    }

    public function index() {

        $data['middle'] = 'middle/registracija';
        $this->load->view('viewTemplate', $data);
    }

    public function regKor() {

        $this->form_validation->set_message('required', '{field} je obavezno polje');
        $this->form_validation->set_message('valid_email', 'E-mail adresa nije u ispravnom formatu');
        $this->form_validation->set_message('is_unique', 'Polje {field} mora biti jedinstveno.');
        // $this->form_validation->set_message('regex_match', '{field} nije odgovarajuceg formata. ');
        $this->form_validation->set_message('matches', ' {field} i lozinka se ne poklapaju');
        $this->form_validation->set_message('min_length', '{field} mora da sadrzi najmanje {param} karaktera');     

        $this->form_validation->set_rules('ime', 'Ime', 'required');
        $this->form_validation->set_rules('prezime', 'Prezime', 'required');
        $this->form_validation->set_rules('korisnicko', 'Korisnicko ime', 'required|is_unique[korisnik.korisnicko]|min_length[3]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[korisnik.email]');
        $this->form_validation->set_rules('lozinka', 'Lozinka', 'required|min_length[3]');
        $this->form_validation->set_rules('ponLozinka', 'Potvrda lozinke', 'required|matches[lozinka]');
        // $this->form_validation->set_rules('telefon', 'Telefon', 'required|regex_match[/^\d{3}\/?\d{6,7}$/]');
        $this->form_validation->set_rules('rodjen', 'Datum rodjenja', 'required');

        if ($this->form_validation->run() == 0) {
            $this->index();
        } else {

            $korisnicko = $this->input->post('korisnicko');
            $lozinka = $this->input->post('lozinka');
            $ime = $this->input->post('ime');
            $prezime = $this->input->post('prezime');
            $email = $this->input->post('email');
            $telefon = $this->input->post('telefon');
            $rodjen = $this->input->post('rodjen');
            $tip = 'k';
            $this->form_validation->set_error_delimiters("<span style='color:red'>", "</span>");

            $this->RegistracijaModel->dodajKorisnika($korisnicko, $lozinka, $ime, $prezime, $email, $telefon, $rodjen, $tip);
            $this->output->enable_profiler(false);
            redirect('Login');
        }
    }

}
