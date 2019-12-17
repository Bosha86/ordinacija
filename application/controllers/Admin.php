<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        
         if (!$this->session->has_userdata('user')) {
            redirect('Login');
         }else if($this->session->userdata('user')['tip'] !== "a"){
           redirect('User');
         }
       $this->load->model('AdminModel');
       $this->load->model('RezervacijaModel');
    }
    
    public function index(){
        $data['middle'] = 'middle/admin';
        $this->load->view('viewTemplate', $data);
    }
    
    public function prikaziTermine(){
        $datum = $this->input->get('datum');
        $data = ["zauzetiTermini" => $this->AdminModel->dohvatiTermine($datum),
                 "sati" => $this->get_hours_range(),
                 "datum" => $datum];
        
         $this->load->view('terminiAdmin', $data);
    }
    
    function get_hours_range( $start = 32400, $end = 68400, $step = 1800, $format = 'H:i:s' ) {
        $times = array();
        foreach ( range( $start, $end, $step ) as $timestamp ) {
                $hour_mins = gmdate( 'H:i', $timestamp );
                if ( ! empty( $format ) )
                        $times[$hour_mins] = gmdate( $format, $timestamp );
                else $times[$hour_mins] = $hour_mins;
        }
        return $times;
}
}
