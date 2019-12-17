<?php
// KONTROLER ZA PRAVLJENJE KALENDARA

class Kalendar extends CI_Controller {
//PRVO PROGLASAVAMO PROMENLJIVE, KOJE CEMO KORISTITI U RAZLICITIM METODAMA U OKVIRU OVOG KONTROLERA
    // OVO "PRIVATE" ZNACI DA OVIM STVARIMA MOZEMO DA PRISTUPIMO SAMO UNUTAR OVOG KONTROLERA
    //ZA RAZLIKU OD DONJE METODE, KOJA JE PUBLIC, I KOJOJ MOZEMO DA PRISTUPIMO SPOLJA (DA JE POZOVEMO)
    private $dayLabels = array("Pon","Uto","Sre","Čet","Pet","Sub","Ned");
    
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
     
    /********************* PUBLIC **********************/  
        
    // GLAVNA FUNKCIJA ZA ISCRTAVANJE KALENDARA
    //U ZAGRADI SU DVA PARAMETRA KOJE SMO PROSLEDILI KLIKOM NA LINK NA STRANICI ZA ODABIR USLUGE KOJU ZELIMO DA ZAKAZEMO
    //TE PROMENLJIVE NAM TREBAJU SAMO DA IH PROSLEDIMO DALJE, NECEMO IH KORISTITI UOPSTE U OVOJ FUNKCIJI
    public function show($usluga, $naziv) {
        //NA POCETKU KAZEMO DA SU GODINA I MESEC NULL
        $year  = null;
         
        $month = null;
        //PA KAZEMO, AKO JE GODINA NULL (A JESTE, JER SMO JE GORE TAKO PROGLASILI)
        // I AKO JE SETOVANO GET(YEAR) - DAKLE AKO SMO KLIKOM NA NEKO DUGME SETOVALI GODINU
        //ONA PROMENLJIVA YEAR PREUZIMA TU VREDNOST IZ GETA
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         //AKO NISMO SETOVALI NIKAKVU VREDNOST, TJ AKO JE YEAR SAMO NULL
            // ONDA YEAR PREUZIMA VREDNOST AKTUELNE GODINE U TRENUTKU KADA OTVARAMO KALENDAR
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         //ISTO TI RADIMO I SA MESECOM
        // AKO JE SETOVANO U GETU, ONDA UZIMAMO TU VREDNOST
        // AKO NIJE SETOVANO, ONDA UZIMAMO VREDNOST TRENUTNOG MESECA
         if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
      // SADA GLOBALNIM PROMENLJIVIMA, KOJE SMO PROGLASILI SKROOZ GORE NA VRHU, ZADAJEMO VREDNOSTI GODINE I MESECA KOJE SMO DOBILI GORE
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         //GLOBALNOJ PROMENLJIVOJ DANI U MESECU ZADAJEMO PREDNOST KOJU CEMO DOBITI FUNKCIJOM _  DAYSiNmONTH(PA U ZAGRADI PROSLEDNJUJEMO DOBIJENU GODINU I MESEC)
        //FUNKCIJA ZA DANE U MESECU JE DOLE, JOS NISMO DOSLI DO NJE
        //POZIVAMO JE SAD JER NAM JE NEOPHODNA ZA CRTANJE KALENDARA (DA BISMO ZNALI KOLIKO IMA DANA U MESECU ZA KOJI SE CRTA KALENDAR)
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
        
       // OVDE ISPISUJEMO SAM KALENDAR I SMESTAMO GA KOMPLETNO U PROMENLJIVU $CONTENT
         
        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().  //OVDE POZIVAMO FUNKCIJU _createNavi() KOJA SE NALAZI DOLE
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';   //OVDE POZIVAMO FUNKCIJU _createLabels() KOJA SE NALAZI DOLE
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year); //ISTO TAKO OVDE POZIVAMO FUNKCIJU ZA NEDELJE U MESECU
                                // NAPRAVILI SMO NEDELJE U MESECU
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //PRAVIMO DANE U SVAKOJ NEDELJI
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j); // I POZIVAMO FUNKCIJU ZA ISPISIVANJE DANA
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</div>';
        // SAD KAD NAM JE SVE SPAKOVANO U PROMENLJIVU $CONTENT, MOZEMO DA POSALJEMO KALENDAR NA ODGOVARAJUCU STRANICU
        // AKO JE KORISNIK TIP K, ONDA OTVARA STRANICU KALENDAR
        if($this->session->userdata('user')['tip'] == "k"){
        $data['middle'] = "middle/kalendar";
        $data['middle_data'] = ["kalendar" => $content,
                                "usluga" => $usluga,
                                "naziv" => $naziv];
        $this->load->view('viewTemplate', $data);

        //AKO JE KORISNIK TIP A, TJ ADMIN, ONDA OTVARA STRANICU ADMIN I TAKODJE SALJE KALENDAR
        }else if($this->session->userdata('user')['tip'] == "a"){
            $data['middle'] = 'middle/admin';
            $data['middle_data'] = ['kalendar' => $content];
            $this->load->view('viewTemplate', $data);
        }
    }
     
    /********************* OVE FUNKCIJE SU PROVATNE, ZNACI NJIMA MOZEMO DA PRISTUPIMO SAMO UNUTAR OVOG KONTROLERA **********************/ 
    /**
    * FUNKCIJA ZA ISPISIVANJE DANA U SVAKOJ CELIJI KALENDARA
    */
    //GORE SMO PROSLEDILI BROJ CELIJE (TO JE OVO U ZAHRADI)
    private function _showDay($cellNumber){
         //AKO JE PROMENLJIVA CURRENTDAY == 0 (A JESTE, JER SMO TO REKLI NA SAMOM STARTU OVOG KONTROLERA
        if($this->currentDay==0){
             //ONDA MI JE PRVI DAN NEDELJE ZAPRAVO PRVI DAN OVOJ MESECA I OVE GODINE
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
               //AKO MI JE BROJ CELIJE KOJI SAM GORE PROSLEDILA JEDNAK DANU   
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 // CURRENTDAY MI DOBIJA VREDNOST 1
                $this->currentDay=1;
                 
            }
        }
        
        
         // AKO JE PROMENLJIVA CURRENTAY RAZLICITA OD NULA I AKO JE MANJA OD BROJA DANA U MESECU
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             //TRENUTNI DATUM JE TRENUTNA GODINA - TRENUTNI MESEC- TRENUTNI DAN
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             // CELLCONTENT JE PROMENLJIVA KOJA SALJE BROJ ZA ISPISIVANJE U SVAKU CELIJU
            //BROJ DANA, ZNACI AKO JE 17. JANUAR, ONA SALJE BROJ 17
            //U NJOJ CUVAMO CURRENTDAY
            $cellContent = $this->currentDay;
                  //I NA KRAJU SVAKOG OBRTANJA OVE FUNKCIJE, DODAJEMO JEDAN NA TAJ BROJ
            //JER, JEL, POSLE 17. JANUARA, IDE 18, PA 19...
            $this->currentDay++;   
            
             
             
        }else{
            //U SUPROTNOM, DAKLE AKO JE CURRENTDAY VECI OD BROJA DANA U MESECU
            //ONDA KAZEMO DA JE DURRENTDATE NULL, KAO I CELLCONTENT
            //TO ZNACI DA NE VRACA NIKAKAV BROJ, PA ZATO IMAMO ONE PRAZNE CELIJE U KALENDARU ZA DANE KIJI NISU U TOM MESECU
            $this->currentDate =null;
 
            $cellContent=null;
        }
             
         //NA KRAJU MI CELA FUNCKIJA VRACA POJEDINACNU CELIJU SA RAZLICITIM KLASAMA (ZA CSS) I SA FUNKCIJOM ONCLICK
        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').($this->currentDate == date('Y-m-d')?'danas':''). '" onclick="prikaziDan(\''.$this->currentDate.'\')">'.$cellContent.'</li>';
    }
     
    /**
    * FUNCKIJA ZA PRAVLJENJE NAVIGACIJE
    */
    private function _createNavi(){
         //RAZUNAMO PROSLI ILI SLEDECI MESEC, TJ GODINU (OBICNIM SABIRANJEM I ODUZIMANJEM)
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
        
        //VRACAMO CITAV ONAJ DIV U KOM PICE U SREDINI GODINA I MESEC,A LEVO I DESMO IMAMO DA IDEMO NA PROSLI ILI SLEDECI MESEC
        //OVDE SE KLIKOM NA HREF U GET UGRADJUJE PROSLI ILI SLEDECI MESEC/GODINA
        //TO JE VREDNOST IZ GETA KOJU KORISTIMO U GORNJOJ SHOW FUNKCIJI ZA DOHVATANJE MESECA ILI GODINE
        //ZNACI AKO VREDNOST U GETU NE POSTOJI, TO ZNACI DA NIKO NIJE KLIKNUO NA SLEDECI ILI PROSLI MESEC
        //I ZATO NAM PRVA FUNKCIJA U TOM SLUCAJU PRIKAZUJE - AKTUELNI MESEC
        //TEK KAD KLIKNEMO NA SLEDECI ILI PROSLI, DODAJE SE OVA VREDNOST U GET NIZ (U URL)
        return
            '<div class="header">'.
                '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prethodni</a>'.
                    '<span class="title">'.date('F Y',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Sledeći</a>'.
            '</div>';
        
    }
         
    /**
    * create calendar week labels
    */
    
 

         // FUNKCIJA ZA PRAVLJENJE LABELA, TJ ONOG DELA GDE PISE PON, UTO, SRE...   
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
 
        }
         
        return $content;
    }
     
     
     
    /**
    * FUNKCIAJ ZA RACUNANJE BROJA NEDELJA U SVAKOM MESECU
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // PRONALAZIMO BROJ DANA U MESECU
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
        
        //POGLEDAJ
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         //VRACA BROJ NEDELJA U SVAKOM MESECU
        return $numOfweeks;
    }
 
    /**
    * FUNKCIJA ZA RACUNANJE BROJA DANA U MESECU
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
        
}

