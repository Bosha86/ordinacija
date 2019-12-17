<?php



class RezervacijaModel extends CI_Model {
   
    public function rezervacija($datum, $vreme, $idKor, $idDok, $idUsl){
        
        $data = array(
            'datum' => $datum,
            'vreme' => $vreme,
            'stanje' => 'z',
            'idKor' => $idKor,
            'idDok' => $idDok,
            'idUsl' => $idUsl);
        $this->db->insert('termin', $data);
                
                
    }
    
    public function dohvatiUsluge(){
        
        $query = $this->db->get('usluge');
        return $query->result_array();
                
    }
    
    public function proveraTermina($rezDatum, $rezVreme){
        
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
    
    public function zauzetiTermini($doktor, $datum){
        $this->db->select('vreme');
        $this->db->where('datum', $datum);
        $this->db->where('idDok', $doktor);
        $this->db->where('stanje', 'z');
        $this->db->from('termin');
        $query=$this->db->get();
        return $query->result_array();
        
    }
    
    public function sviZauzetiTermini($datum){
        $this->db->select('vreme, idDok, idUsl, idKor');
        $this->db->where('datum', $datum);
        $this->db->where('stanje', 'z');
        $this->db->from('termin');
        $query=$this->db->get();
        return $query->result_array();
    }

        public function dohvatiDoktore(){
        $query = $this->db->get('doktor');
        return $query->result_array();
    }
    
}
