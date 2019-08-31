<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author gordan
 */
class UserModel extends CI_Model {

    public function login($username, $password) {

        $this->db->where('korisnicko', $username);
        $query = $this->db->get('korisnik');
        $korisnik = $query->row_array();

        if (!empty($korisnik) && password_verify($password, $korisnik['lozinka'])) {
            return $korisnik;
        } else {
            return false;
        }
    }

    public function hashstored($username, $password) {

        $data = ['lozinka' => password_hash($password, PASSWORD_DEFAULT)];
        $this->db->where('korisnicko', $username);
        $this->db->update('korisnik', $data);
    }

    public function dohvatiKorisnika($username) {

        $this->db->select('*');
        $this->db->where('korisnicko', $username);
        $this->db->from('korisnik');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function prethodneUsluge($idKor){
        
        $this->db->select('termin.datum, termin.vreme, termin.stanje, usluge.naziv, usluge.cena')
                ->from('termin')
                ->join('uradjeno', 'uradjeno.idTer = termin.idTer')
                ->join('usluge', 'usluge.idUsl = uradjeno.idUsl')
                ->join('korisnik', 'korisnik.idKor = termin.idKor')
                ->where('korisnik.idKor', $idKor);
              
          $query = $this->db->get();
          return $query->result_array();
               
    }

}
