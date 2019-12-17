<?php


class Kalendar extends CI_Controller {

    private $dayLabels = array("Pon","Uto","Sre","Čet","Pet","Sub","Ned");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function show($usluga, $naziv) {
        $year  = null;
         
        $month = null;
        
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         
         if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
      
//        $param = $this->input->get('param');
//        if($param !== null){
//            $res = $this->promeniMesec($param);
////            var_dump($res);
//        }
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
        
       
         
        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</div>';
        
//        if($this->input->get('year')!== null || $this->input->get('month')!== null){
//            return $content;
//        }else{
        if($this->session->userdata('user')['tip'] == "k"){
        $data['middle'] = "middle/kalendar";
        $data['middle_data'] = ["kalendar" => $content,
                                "usluga" => $usluga,
                                "naziv" => $naziv];
        $this->load->view('viewTemplate', $data);
//        return $content;   
//        }
        }else if($this->session->userdata('user')['tip'] == "a"){
            $data['middle'] = 'middle/admin';
            $data['middle_data'] = ['kalendar' => $content];
            $this->load->view('viewTemplate', $data);
        }
    }
     
    /********************* PRIVATE **********************/ 
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
        
        
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;
                  
            $this->currentDay++;   
            
             
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }
             
         
        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').($this->currentDate == date('Y-m-d')?'danas':''). '" onclick="prikaziDan(\''.$this->currentDate.'\')">'.$cellContent.'</li>';
    }
     
    /**
    * create navigation
    */
    private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
        

//        return
//        
//            '<div class="header">'.
//                '<a class="prev" href="#" onclick="promeni(\'pret\')">Prethodni</a>'.
//                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
//                '<a class="next" href="#" onclick="promeni(\'sled\')">Sledeći</a>'.
//            '</div>';
        
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
    
    public function promeniMesec(){
//        
//        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
////        $nextMonthTrue = sprintf("%02d", $nextMonth);
//         
//        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
//         
//        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
////        $preMonthTrue = sprintf('%02d',$preMonth);
//         
//        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
//        
//        var_dump($nextMonth);
//        var_dump($preMonth);
        
//        $param = $this->input->get('param');
//        
//        if($param == "pret"){
//            $res = array ($preMonth, $preYear);
//            var_dump($res);
            
//            redirect("Kalendar/show?month=$preMonthTrue&year=$preYear");
//            redirect("Kalendar/show")."?month=".$preMonthTrue;
//        }else if($param == "sled"){
//            return array($nextMonth, $nextYear);
//            redirect("Kalendar/show?month=$nextMonthTrue&year=$nextYear");
//        }
           
         
//        return
//            '<div class="header">'.
//                '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prethodni</a>'.
//                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
//                '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Sledeći</a>'.
//            '</div>';
    }
            
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
 
        }
         
        return $content;
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
        
}

