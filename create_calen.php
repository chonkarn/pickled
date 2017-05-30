<?php

function create_calen($monday){
    
    $val = $monday;
    $monday = $monday + 5;
    // tag for string
    $same2 = "</li>";
    $pt2 = "id=";
    $col = "\"";
    $pt3 = ">";
    $pt4 = "</div>";
    $first = "<ul class=\"day\">";
    $last = "</ul>";
    // month
    $currentmonth = date("m");
    $currentmonthNo = date("n");
    //string format
    $checkapp = "2017-".$currentmonth."-";
    //query
    $select_calendarintfo = "SELECT * FROM calendar_info ";
    $link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");
    $query_calendarinfo = mysqli_query($link, $select_calendarintfo);
      
    // condition for day in month
    $dayinmonth = 31;
        if ($currentmonthNo == 1 || $currentmonthNo == 3 || $currentmonthNo == 5 || $currentmonthNo == 7 || $currentmonthNo == 8 || $currentmonthNo == 10 || $currentmonthNo == 12)
            $dayinmonth = $dayinmonth;
        else if ($currentmonthNo == 4 || $currentmonthNo == 6 || $currentmonthNo == 9 || $currentmonthNo == 11)
            $dayinmonth = 30;
        else {
            if (date("L") == 1) $dayommonth = 29;
            else $dayinmonth = 28;
        }
     
                while ($val < $monday && $val <= $dayinmonth){
           
                if ($val == date("d")) 
                    $pt = "<div class=\"date today\" name=";
                else 
                    $pt = "<div class=\"date\" name=";
            if ($val < 10) {$checkapp = "2017-".$currentmonth."-0";}    
            $d = "d"+$val;
            $checkapp = $checkapp.$val;
            $same = "<li id=\"test\" class=\"day\" onclick=\"location.href='calendar_add.php?date=";
            $same = $same.$checkapp."';\" >";
            
            
            echo $same;
            echo $pt.$col.$d.$col.$pt2.$col.$d.$col.$pt3.$val.$pt4;
                    $twoline = 1;
                while ($row = mysqli_fetch_assoc($query_calendarinfo) )
                {
                    if ($twoline <3){
                      if ($checkapp === $row['dmy']){
                        include 'date_event.html';
                        $twoline++;
                    }  
                    }
                    
                }
                    if ($twoline >= 3  ){
                        echo $twoline;
//                        $twoline = $twoline-2;
                        include 'calendar_more_appointment.php';
                        $tagforviewmore = "show-more".$row['Id_app'];
                        $atagbegin = "<a href=\"#".$tagforviewmore."\" class=\"event-more\" uk-toggle><small>";
                        $ataglast = "</small></a>";    
                        echo $atagbegin."+".$twoline."นัดหมาย".$ataglast;  
                        
                    }
                    
                /* seek to row no. 0 */
                mysqli_data_seek($query_calendarinfo, 0);
                $twoline = 0;
                
            echo $same2;
            $checkapp = "2017-".$currentmonth."-";
            $val++;
            
        }
                
            
    
}

?>