<?php
class Calendar {  
     
    /**
     * Constructor
     */
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
     
    /********************* PROPERTY ********************/  
     
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
    public function show() {
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
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
         
        $content=$this->_createNavi();
        return $content;   
    }
    
    private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
          
        
        $thaiyear = $this->currentYear+543;
        switch($this->currentMonth){
            case 01 : $thaimonth = "มกราคม"; break;    
            case 02 : $thaimonth = "กุมภาพันธ์"; break;    
            case 03 : $thaimonth = "มีนาคม"; break;    
            case 04 : $thaimonth = "เมษายน"; break;    
            case 05 : $thaimonth = "พฤษภาคม"; break;
            case 06 : $thaimonth = "มิถุนายน"; break;
            case 07 : $thaimonth = "กรกฎาคม"; break;
            case 08 : $thaimonth = "สิงหาคม"; break;
            case 09 : $thaimonth = "กันยายน"; break;
            case 10 : $thaimonth = "ตุลาคม"; break;
            case 11 : $thaimonth = "พฤศจิกายน"; break;
            case 12 : $thaimonth = "ธันวาคม"; break;
        }
//        $thaimonth = 
//        date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1'))
                        
        return
            '<h4 class="uk-text-center">'.
                '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'" uk-slidenav-previous></a>'.
                    '<span class="title">'.$thaimonth." ".$thaiyear.'</span>'.
                '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'" uk-slidenav-next></a>'.
            '</h4>';
    }
    



//other cases that aren't Monday
function return_date ($val){
    switch ($val){
       case "Mon": return 0; break;
    case "Tue": return 1; break;
    case "Wed": return 2; break;
    case "Thu": return 3; break;
    case "Fri": return 4; break;     
    }

}

function month ($onlyme){
    $id_onlyme = $_SESSION['id'];
    if ($onlyme === $_SESSION['id']) $onlyme = " where Id_own_calen =".$id_onlyme;
    else $onlyme = "";
   $select_calendarintfo = "SELECT * FROM calendar_info ".$onlyme;
    $link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");
    $query_calendarinfo = mysqli_query($link, $select_calendarintfo);    

//save workdays in an array
$workdays = array();
$type = CAL_GREGORIAN;
$month = $this->currentMonth; //date('n') 
$year = $this->currentYear; 
$day_count = cal_days_in_month($type, $month, $year); // Get the amount of days
for ($i = 1; $i <= $day_count; $i++) {
        $date = $year.'/'.$month.'/'.$i; //format date
        $get_name = date('l', strtotime($date)); //get week day
        $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
        //if not a weekend add day to array
        if($day_name != 'Sun' && $day_name != 'Sat'){
            $workdays[] = $i;
        }
}
        //date labels
        echo '<div id="calendar-wrap"><div id="calendar">';
        $dayLabels = array("จันทร์","อังคาร","พุธ","พฤหัส","ศุกร์",);
        echo '<ul class="weekdays">';
        foreach($dayLabels as $label){
                echo '<li>'.$label.'</li>';
            }
        echo '</ul>';
    
            //count 5 for workdays
            $count = 0;
            $todaytag = "date today";
            $longtag = 'onclick="location.href=calendar_add.php?date=';
            $m =  $month;
            foreach ($workdays as $weekday){
                if ($weekday<10) $checktoday = "0".$weekday;
                else $checktoday = $weekday;
                $temp = $checktoday;
                $checktoday = $year."-".$month."-".$temp;
                if ($checktoday == date("Y-m-d")) $gentag = $todaytag;
                else $gentag = "date";
                $checktoday = "";
                // check start date of the month
                $startDay = $year.'-'.$month."-01"; 
                $timeDate = strtotime($startDay);
                $showday = date("D",$timeDate);
//                echo $showday;
                $val = $this->return_date($showday);
                if ($count == 0) echo '<ul class="days">';
                if ($weekday < 10) $datechecklink = $year."-".$m."-"."0".$weekday;
                else $datechecklink = $year."-".$m."-".$weekday;
                if ($weekday === 1) {
                    for ($i =0 ; $i < $val ; $i++) {
                        echo '<li id="test" class="day" onclick =location.href=\'calendar_add.php?date="'
                            .$datechecklink.';"\'><div class="'.$gentag .'"></div>';
                        $count = $val;
                    }
                }
                $count ++;
                echo  '<li id="test" class="day" onclick =location.href=\'calendar_add.php?date='
                    .$datechecklink.'\'><div class="'.$gentag .'">'.$weekday.'</div>';
                //>>>>>>>>>>>
                 $twoline = 0;
                    $i = 0;
                while ($row = mysqli_fetch_assoc($query_calendarinfo) )
                {
//                    if ($twoline <3)
                      if ($datechecklink === $row['dmy']){
                          if ($twoline < 2) {
                              
                            include 'date_event.php';      
                          }
                        
                        $twoline++;
                    }  
                    
                    
                }
                    if ($twoline >= 3  ){
//                        echo $datechecklink.$twoline;
                        $twoline = $twoline-2;
                        $tagforviewmore = "show-more".$datechecklink;
                        include 'calendar_more_appointment.php';
                        $atagbegin = '<a href="#'.$tagforviewmore.'" class=\"event-more\" uk-toggle><small>';
                        $ataglast = "</small></a>";    
                        echo $atagbegin."+".$twoline."นัดหมาย".$ataglast;  
                        
                    }
                    
                /* seek to row no. 0 */
                mysqli_data_seek($query_calendarinfo, 0);
                //>>>>>>>>>>>>>>>>>>>>>>>>>>>>
                $datechecklink = 'onclick="location.href=calendar_add.php?date=';
                if ($count == 5 ) {
                    echo '</ul>';
                    $count = 0;
                }
        }
    echo '</li>';
echo '</div>';
echo '</div>';
}
}


?>
