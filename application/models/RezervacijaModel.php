<?php


/**
 * Description of RezervacijaModel
 *
 * @author gordan
 */

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
    
}
