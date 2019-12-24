<?php


class AdminModel extends CI_Model{
    //OVO JOS NECU NISTA DA KOMENTARISEM, U RADU JE
    public function dohvatiKorisnike(){
        $query = $this->db->get('korisnik');
        return $query->result_array();
    }
    
    public function dohvatiTermine($datum){
        $this->db->select('termin.*, usluge.naziv, korisnik.ime as korisnikIme, korisnik.prezime as korisnikPre, doktor.ime, doktor.prezime');
        $this->db->from('termin');
        $this->db->join('usluge', 'termin.idUsl = usluge.idUsl');
        $this->db->join('korisnik', 'termin.idKor = korisnik.idKor');
        $this->db->join('doktor', 'termin.idDok = doktor.idDok');
        $this->db->where("stanje = 'z'");
        $this->db->where("datum", $datum);
        
        $query=$this->db->get();
        return $query->result_array ();

    }
    
    public function dovatiPodatke($idTer){
        $this->db->select('termin.*, usluge.naziv, korisnik.email, korisnik.ime as korisnikIme, korisnik.prezime as korisnikPre, doktor.ime, doktor.prezime');
        $this->db->from('termin');
        $this->db->join('usluge', 'termin.idUsl = usluge.idUsl');
        $this->db->join('korisnik', 'termin.idKor = korisnik.idKor');
        $this->db->join('doktor', 'termin.idDok = doktor.idDok');
        $this->db->where('idTer', $idTer);
        $query=$this->db->get();
        return $query->result_array ();
        
    }
    
    public function uradjeno($idTer){
        $this->db->set('stanje', 'u');
        $this->db->where('idTer', $idTer);
        $this->db->update('termin');
    }
    
    public function otkazi($idTer){
        $this->db->set('stanje', 'o');
        $this->db->where('idTer', $idTer);
        $this->db->update('termin');
    }
    
}
