<?php



class RezervacijaModel extends CI_Model {
   
    public function rezervacija($datum, $vreme, $idKor, $idDok, $idUsl, $kod){
        // UPISUJEMO DATUM, VREME, KORISNIKA, DOKTORA I USLUGU U TABELU TERMIN - OVO JE PRILIKOM REZERVACIJE TERMINA
        $data = array(
            'datum' => $datum,
            'vreme' => $vreme,
            'stanje' => 'z',
            'idKor' => $idKor,
            'idDok' => $idDok,
            'idUsl' => $idUsl,
            'kod' => $kod);
        $this->db->insert('termin', $data);
                
                
    }
    
    public function dohvatiUsluge(){
        //DOHVATAMO SVE USLUGE
        $query = $this->db->get('usluge');
        return $query->result_array();
                
    }
    
    public function proveraTermina($rezDatum, $rezVreme){
        //PROVERA DA LI JE TERMIN SLOBODAN
       $query = $this->db->select('datum, vreme')
                ->from('termin')
                ->where('datum', $rezDatum)
                ->where('vreme', $rezVreme)
                ->get();
        if($query->num_rows() >= 1){
            return false;
        } else {
            return true;
        }
    }
    // F-JA ZA VRACANJE SVIH ZAUZETIH TERMINA ZA ODREDJENI DATUM I DOKTORA
    public function zauzetiTermini($doktor, $datum){
        $this->db->select('vreme');
        $this->db->where('datum', $datum);
        $this->db->where('idDok', $doktor);
        $this->db->where('stanje', 'z');
        $this->db->from('termin');
        $query=$this->db->get();
        return $query->result_array();
        
    }
    // OVO JE U RADU, ZA ADMINA, NIJE JOS GOTOVO
    public function sviZauzetiTermini($datum){
        $this->db->select('vreme, idDok, idUsl, idKor');
        $this->db->where('datum', $datum);
        $this->db->where('stanje', 'z');
        $this->db->from('termin');
        $query=$this->db->get();
        return $query->result_array();
    }

    
    //DOHVATAM SVE DOKTORE
        public function dohvatiDoktore(){
        $query = $this->db->get('doktor');
        return $query->result_array();
    }
    
}
