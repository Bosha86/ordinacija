<?php
/**
 * Description of RegistracijaModel
 *
 * @author gordan
 */

class RegistracijaModel extends CI_Model {
    
    public function dodajKorisnika($korisnicko, $lozinka, $ime, $prezime, $email, $telefon, $rodjen, $tip){
        
        $data = ['korisnicko' => $korisnicko, 'lozinka' => $lozinka, 'ime' => $ime,
                 'prezime' => $prezime, 'email' => $email, 'rodjen' => $rodjen, 
                 'telefon' => $telefon, 'tip' => $tip];

        $this->db->insert('korisnik', $data);
        
    }
}
