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
// FUNKCIJA ZA ITVARANJE STRANICE ZA REGISTRACIJU
    public function index() {

        $data['middle'] = 'middle/registracija';
        $this->load->view('viewTemplate', $data);
    }
//FUNKCIJA ZA SAMU REGISTRACIJU
    public function regKor() {
//OVDE POSTAVLJAMO PRAVILA ZA VALIDACIJU I PORUKE KOJE ISKACU U SLUCAJU DA VALIDACIJA NIJE PROSLA KAKO TREBA
        $this->form_validation->set_message('required', '{field} je obavezno polje');
        $this->form_validation->set_message('valid_email', 'E-mail adresa nije u ispravnom formatu');
        $this->form_validation->set_message('is_unique', 'Polje {field} mora biti jedinstveno.');
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
// AKO VALIDACIJA NIJE PROSLA KAKO TREBA, VRATI ME NA INDEX
        if ($this->form_validation->run() == 0) {
            $this->session->set_flashdata('reg', 'false');
            $this->index();
        } else {
// AKO JE PROSLA KAKO TREBA, REGISTRUJ KORISNIKA
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
            //NAKON USPESNE REGISTRACIJE ISPISUJEMO PORUKU DA JE KORISNIK REGISTROVAN
            //I VRACAMO GA NA POCETNU DA SE ULOGUJE
            $this->session->set_flashdata('regPoruka', 'Uspesno ste se registrovali. Ulogujte se kako biste pristupili svom korisnickom profilu.');
            redirect('Login');
        }
    }
    //FUNCKIJA ZA VALIDACIJU LOZINKE
     public function valid_password($lozinka){
        
        $lozinka = trim($lozinka);
        $malaSlova = '/[a-z]/';
        $velikaSlova = '/[A-Z]/';
        $brojevi = '/[0-9]/';
        $prvoVeliko = "/^[A-Z]/";
        $dvaIsta  = '/([\w])\1/';
        
        //LOZINKA MORA DA IMA MINIMUM 8 KARAKTERA
        if(strlen($lozinka) < 8){
            $this->form_validation->set_message('valid_password', '{field} mora da ima minimum 8 karaktera');
            return false;
            //A MAKSIMUM 12
        } else if(strlen($lozinka) > 12){
            $this->form_validation->set_message('valid_password', '{field} mora da ima najvise 12 karaktera');
            return false;
            //MORA DA IMA NAJMANJE DVA VELIKA SLOVA
        } else if(preg_match_all($velikaSlova, $lozinka) < 2){
            $this->form_validation->set_message('valid_password', '{field} mora da ima najmanje 2 velika slova');
            return false;
            //I BAR TRI MALA SLOVA
        } else if(preg_match_all($malaSlova, $lozinka) < 3){
            $this->form_validation->set_message('valid_password', '{field} mora da ima minimum 3 mala slova');
            return false;
            //BAR JEDAN BROJ
        } else if(preg_match_all($brojevi, $lozinka) < 1){
            $this->form_validation->set_message('valid_password', '{field} mora da imam bar 1 broj ');
            return false;
            //MORA DA IMA PRVO VELIKO SLOVO
        } else if (!preg_match_all($prvoVeliko, $lozinka)){
             $this->form_validation->set_message('valid_password', '{field} mora da ima prvo veliko slovo');
             return false;
             //I NE SME DA IMA DVA ISTA KARAKTERA ZAREDOM
        } else if(preg_match_all($dvaIsta, $lozinka)){
            $this->form_validation->set_message('valid_password', '{field} ne sme imati dva ista uzastopna karaktera');
            return false;
        }
        
        return true;
        
    }
    // F-JA ZA OTVARANJE STRANICE ZA NOVU LOZINKU (RESET LOZINKE)
     public function novaLozinka(){
        $data['middle'] = 'middle/resetLozinke';
        $this->load->view('viewTemplate', $data);
    }
    //F-JA ZA PROMENU SAME LOZINKE
    public function promenaLozinke(){
        
        $this->load->model('UserModel');
        //OPET PRVO IDE VALIDACIJA
        $this->form_validation->set_message('required', '{field} je obavezno polje');
        $this->form_validation->set_message('differs', '{field} mora da se razlikuje od polja {param}');
        $this->form_validation->set_message('matches', '{field} mora da bude ista kao polje {param}');
        
        
        $this->form_validation->set_rules('korisnicko', 'Korisnicko ime', 'required');
        $this->form_validation->set_rules('staraLozinka', 'Stara lozinka', 'required');
        $this->form_validation->set_rules('novaLozinka', 'Nova lozinka', 'required|differs[staraLozinka]|callback_valid_password');
        $this->form_validation->set_rules('novaLozinkaPon', 'Potvrda nove lozinke', 'required|matches[novaLozinka]');
        //AKO NE PRODJE VALIDACIJU, VRACAMO GA NA STRANICU ZA UNOS PODATAKA ZA NOVU LOZINKU
          if ($this->form_validation->run() == 0) {
              $this->novaLozinka();
              //AKO PRODJE VALIDACIJU, PROVERAVAMO DA LI KORISNIK SA TIM KOR IMENOM I LOZINKOM POSTOJI U BAZI
          } else {
                $username = $this->input->post('korisnicko');
                $oldPass = $this->input->post('staraLozinka');
                $newPass = $this->input->post('novaLozinka');
                $user = $this->UserModel->login($username, $oldPass);
                //AKO NE POSTOJI, VRACAMO GA NAZAD I ISPISUJEMO PORUKU
                if(empty($user)){
                    $data['middle'] = 'middle/resetLozinke';
                    $data['middle_data'] = ['err' => 'Neispravni podaci. Molimo vas, unesite ispravno korisnicko ime i/ili staru lozinku.'];
                    $this->load->view('viewTemplate', $data);
                    //AKO POSTOJI, ONDA MENJAMO LOZINKU U BAZI, ISPISUJEMO PORUKU I VRACAMO GA NA LOGIN, DA SE ULOGUJE SA NOVOM LOZINKOM
                }else{
                    $this->RegistracijaModel->promeniLozinku($username, $newPass);
                    $this->session->set_flashdata('regPoruka', 'Lozinka je  uspesno izmenjena. Molimo vas da se ulogujete.');
                    redirect('Login');
                }
          }
        
        
    }

    }
    