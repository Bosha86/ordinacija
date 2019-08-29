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
        
        if($this->session->has_userdata('user')){
            redirect('User');
        }
        
        $this->load->model('RegistracijaModel');
        
    }
    
    public function index(){
        
        $data['middle'] = 'middle/registracija';
        $this->load->view('viewTemplate', $data);
    }
    
    public function regKor(){
        
    }
            
    
    
    
}
