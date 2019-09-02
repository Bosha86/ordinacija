<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Rezervacija
 *
 * @author gordan
 */
class Rezervacija extends CI_Controller {

    public function __construct() {
        parent::__construct();


        if (!$this->session->has_userdata('user')) {
            redirect('Login');
        }
        $this->load->model('RezervacijaModel');
    }

    public function index() {
        
        $data['middle'] = 'middle/rezervacija';
       
        $this->load->view('viewTemplate', $data);
    }
    
    public function rezervacija(){
        
        $datum = date("Y-m-d", strtotime($this->input->post('datum')));
        $vreme = date("H:i:s", mktime($this->input->post('vreme'),0,0));
       
        $idKor = $this->session->userdata('user')['idKor'];
        $idDok = $this->input->post('idDok');
        $idUsl = $this->input->post('idUsl');
        $this->output->enable_profiler(false);
        $this->RezervacijaModel->rezervacija($datum, $vreme, $idKor, $idDok, $idUsl);
        
            redirect('User/index');
        
    }
    
    

}
