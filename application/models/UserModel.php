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
        $result = $query->row_array();

        if (!empty($result) && password_verify($password, $result['lozinka'])) {
            return $result;
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


        $this->db->where('korisnicko', $username);
        $this->db->from('korisnik');
        $query = $this->db->get();
        return $query->result_array();
    }

}
