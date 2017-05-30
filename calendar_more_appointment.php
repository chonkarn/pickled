<?php 

$date = explode("-",$datechecklink);
$date[0] = $date[0]+543;
 switch ($date[1]){

    case 1: $date[1] = "มกราคม"; break;
    case 2: $date[1] = "กุมภาพันธ์"; break;
    case 3: $date[1] = "มีนาคม"; break;
    case 4: $date[1] = "เมษายน"; break;
    case 5: $date[1] = "พฤษภาคม"; break;
    case 6: $date[1] = "มิถุนายน"; break;
    case 7: $date[1] = "กรกฎาคม"; break;
    case 8: $date[1] = "สิงหาคม"; break;
    case 9: $date[1] = "กันยายน"; break;
    case 10: $date[1] = "ตุลาคม"; break;
    case 11: $date[1] = "พฤศจิกายน"; break;
    case 12: $date[1] = "ธันวาคม"; break;
}
    $select_calendarintfo_modal = "SELECT * FROM calendar_info ";
    $query_calendarinfo_modal = mysqli_query($link, $select_calendarintfo);
?>
    <div id="<?php echo $tagforviewmore;?>"uk-modal="center: true">
        <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <h4 class="uk-heading-divider">นัดหมายวันที่ <?php echo $date[2]." ".$date[1].$date[0];?></h4>
            <?php 
            while ($newrow = mysqli_fetch_assoc($query_calendarinfo_modal) )
                {
                    
                      if ($datechecklink === $newrow['dmy']){
//                        $select_med_own = "SELECT  FROM patientinfo WHERE patient_hn = ".$newrow['patient_hn'];
//                        $query_med_own =   mysqli_query($link, $select_med_own);
                        //patient management
                        $select_patient_info = "SELECT patient_doctor_owner,patient_p_name,patient_name,patient_surname,patient_visit_status,patient_visit_type,patient_doctor_owner,problem from patientinfo WHERE patient_hn =".$newrow['patient_hn'];
                        mysqli_query($link,"SET NAMES UTF8");
                        mysqli_query($link,"SET character_set_results=utf8");
                        mysqli_query($link,"SET character_set_client=utf8");
                        mysqli_query($link,"SET character_set_connection=utf8");
                        $query_patient = mysqli_query($link,$select_patient_info);
                        $fetchquery_patient = mysqli_fetch_array($query_patient);
                        
                    //med own
                    $med_own = $fetchquery_patient['patient_doctor_owner'];
                    $get_med_own = "SELECT f_user,l_user,user FROM tbuser WHERE user = '$med_own'";
                    mysqli_query($link,"SET NAMES UTF8");
                    mysqli_query($link,"SET character_set_results=utf8");
                    mysqli_query($link,"SET character_set_client=utf8");
                    mysqli_query($link,"SET character_set_connection=utf8");
                    $get_med = mysqli_query($link,$get_med_own);
                    $get_med_final = mysqli_fetch_array($get_med);
                    
                          
               
                          
                          // check if newrow is am
                          #strcmp return 0 for equality
                          if (strcmp($newrow['time_calen'],"1")) {
                              include "calendar_more_appointment_am.html";
                              
                          }
                          else {
                              include "calendar_more_appointment_pm.html";
                          }
                          
                      }  
                    
                    
                }
            ?>
        </div>
    </div>
