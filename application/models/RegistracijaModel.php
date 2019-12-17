<?php


class RegistracijaModel extends CI_Model {
    // OVDE DODAJEMO NOVOG KORISNIKA U BAZU, NAJJEDNOSTAVNIJE
    public function dodajKorisnika($korisnicko, $lozinka, $ime, $prezime, $email, $telefon, $rodjen, $tip){
        
        $data = ['korisnicko' => $korisnicko, 'lozinka' => password_hash($lozinka, PASSWORD_DEFAULT), 
                 'ime' => $ime, 'prezime' => $prezime, 'email' => $email, 'rodjen' => $rodjen, 
                 'telefon' => $telefon, 'tip' => $tip, 'odobren' => 'ne'];

        $this->db->insert('korisnik', $data);
        
    }
    //OVDE MENJAMO LOZINKU, ISTO SKROZ JEDNOSTAVNO
    public function promeniLozinku($username, $newPass){
            $this->db->set('lozinka', password_hash($newPass, PASSWORD_DEFAULT));
            $this->db->where('korisnicko', $username);
            $this->db->update('korisnik');  
    }
}
