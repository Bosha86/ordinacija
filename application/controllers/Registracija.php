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
        $this->form_validation->set_rules('lozinka', 'Lozinka', 'required|callback_valid_password');
        $this->form_validation->set_rules('ponLozinka', 'Potvrda lozinke', 'required|matches[lozinka]');
        // $this->form_validation->set_rules('telefon', 'Telefon', 'required|regex_match[/^\d{3}\/?\d{6,7}$/]');
        $this->form_validation->set_rules('rodjen', 'Datum rodjenja', 'required');

        if ($this->form_validation->run() == 0) {
            $this->session->set_flashdata('reg', 'false');
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
            $this->session->set_flashdata('regPoruka', 'Uspesno ste se registrovali. Ulogujte se kako biste pristupili svom korisnickom profilu.');
            redirect('Login');
        }
    }
    
     public function valid_password($lozinka){
        
        $lozinka = trim($lozinka);
        $malaSlova = '/[a-z]/';
        $velikaSlova = '/[A-Z]/';
        $brojevi = '/[0-9]/';
        $prvoVeliko = "/^[A-Z]/";
        $dvaIsta  = '/([\w])\1/';
        
        
        if(strlen($lozinka) < 8){
            $this->form_validation->set_message('valid_password', '{field} mora da ima minimum 8 karaktera');
            return false;
        } else if(strlen($lozinka) > 12){
            $this->form_validation->set_message('valid_password', '{field} mora da ima najvise 12 karaktera');
            return false;
        } else if(preg_match_all($velikaSlova, $lozinka) < 2){
            $this->form_validation->set_message('valid_password', '{field} mora da ima najmanje 2 velika slova');
            return false;
        } else if(preg_match_all($malaSlova, $lozinka) < 3){
            $this->form_validation->set_message('valid_password', '{field} mora da ima minimum 3 mala slova');
            return false;
        } else if(preg_match_all($brojevi, $lozinka) < 1){
            $this->form_validation->set_message('valid_password', '{field} mora da imam bar 1 broj ');
            return false;
        } else if (!preg_match_all($prvoVeliko, $lozinka)){
             $this->form_validation->set_message('valid_password', '{field} mora da ima prvo veliko slovo');
             return false;
        } else if(preg_match_all($dvaIsta, $lozinka)){
            $this->form_validation->set_message('valid_password', '{field} ne sme imati dva ista uzastopna karaktera');
            return false;
        }
        
        return true;
        
    }

    }
    