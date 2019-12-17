<?php


class UserModel extends CI_Model {

    public function login($username, $password) {
        //LOGIN. PRVO PRVERAVAM DA LI POSTOJI KORISNIK SA UNETIM KORISNICKIM IMENOM
        $this->db->where('korisnicko', $username);
        $query = $this->db->get('korisnik');
        $korisnik = $query->row_array();
        //AKO POSTOJI I AKO SE LOZINKA KOJU JE UNEO POKLAPA SA HASHOVANOM LOZINKOM, VRACAMO U KONTROLER SVE PODATKE O KORISNIKU
        if (!empty($korisnik) && password_verify($password, $korisnik['lozinka'])) {
            return $korisnik;
            //AKO NE POSTOJI KORISNIK, U KONTROLER JEDNOSTAVNO VRACAMO FALSE
        } else {
            return false;
        }
    }

    public function hashstored($username, $password) {
        //F-JA SA PONOVNO HASHOVANJE LOZINKE (ZA SLUCAJ DA LOZINKA NIJE HASHOVANA, OVO SE IZVRSAVA PRILIKOM LOGINA)
        $data = ['lozinka' => password_hash($password, PASSWORD_DEFAULT)];
        $this->db->where('korisnicko', $username);
        $this->db->update('korisnik', $data);
    }

    public function dohvatiKorisnika($username) {
        //F-JA ZA DOHVATANJE SVIH PODATAKA O KORISNIKU KOJI SE UPRAVO ULOGOVAO
        //ZNACI GORE SMO PRVERILI DA LI POSTOJI KOR SA TIM IMENOM I PASSOM
        //A OVDE LEPO DOHVATAMO SVE O TOM KORISNIKU IZ BAZE
        // TO VRACAMO U KONTROLER, I ONDA UPISUJEMO U SESIJU
        $this->db->select('*');
        $this->db->where('korisnicko', $username);
        $this->db->from('korisnik');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function termini($idKor) {
        //DOHVATAMO SVE TERMINE ULOGOVANOG KORISNIKA
        $this->db->select('termin.datum, termin.vreme, termin.stanje, termin.idTer, usluge.naziv')
                ->from('termin')
                ->join('korisnik', 'korisnik.idKor = termin.idKor')
                ->join('usluge', 'usluge.idUsl = termin.idUsl')
                ->where('korisnik.idKor', $idKor)
                ->order_by('datum', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function usluge($idKor, $idTer) {
        // I DOHVATAMO SVE URADJENE USLUGE ZA ULOGOVANOG KORISNIKA
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
        //OTKAZUJEMO TERMIN
        $this->db->set('termin.stanje', 'o')
                ->from('termin')
                ->where('termin.idKor', $idKor)
                ->where('termin.idTer', $idTer);
        $this->db->update();
    }

}
