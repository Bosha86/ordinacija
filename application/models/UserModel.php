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

    public function termini($idKor) {

        $this->db->select('termin.datum, termin.vreme, termin.stanje, termin.idTer, usluge.naziv')
                ->from('termin')
                ->join('korisnik', 'korisnik.idKor = termin.idKor')
                ->join('usluge', 'usluge.idUsl = termin.idUsl')
                ->where('korisnik.idKor', $idKor);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function usluge($idKor, $idTer) {

        $this->db->select('termin.datum, usluge.naziv, usluge.cena')
                ->from('radjeno')
                ->join('usluge', 'usluge.idUsl = radjeno.idUsl')
                ->join('korisnik', 'korisnik.idKor = radjeno.idKor')
                ->join('termin', 'radjeno.idTer = termin.idTer')
                ->where('korisnik.idKor', $idKor)
                ->where('termin.idTer', $idTer);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function otkazTermina($idKor, $idTer) {

        $this->db->set('termin.stanje', 'o')
                ->from('termin')
                ->where('termin.idKor', $idKor)
                ->where('termin.idTer', $idTer);
        $this->db->update();
    }

}
