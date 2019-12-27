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
    
    public function dodajRadjeno($idTer, $idKor, $idUsl){
        $data = [
            "idTer" => $idTer,
            "idKor" => $idKor,
            "idUsl" => $idUsl
        ];
        
        $this->db->insert("radjeno", $data);
    }

        public function otkazi($idTer){
        $this->db->set('stanje', 'o');
        $this->db->where('idTer', $idTer);
        $this->db->update('termin');
    }
    
    public function pretraga($korisnicko, $ime, $prezime, $email, $telefon, $rodjen){
        $this->db->select('korisnik.*');
        $this->db->from('korisnik');
        if(!empty($korisnicko)){
             $this->db->like('korisnicko', $korisnicko);
        }
        if(!empty($ime)){
            $this->db->like('ime', $ime);
        }
        if(!empty($prezime)){
            $this->db->like('prezime', $prezime);
        }
        if(!empty($email)){
            $this->db->like('email', $email);
        }
        if(!empty($telefon)){
            $this->db->like('telefon', $telefon);
        }
        if(!empty($rodjen)){
            $this->db->like('rodjen', $rodjen);
        }
        $query=$this->db->get();
        return $query->result_array ();
    }
    
}
