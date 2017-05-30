<?php
    //check appointment time and summary status
    if ($row['time_calen'] === "0"){
        if ($row['sum_chk'] === "0") //ยังไม่สรุป
            $time = "event morning";
        else 
            $time = "event morning past";
    }
    else {
        if ($row['sum_chk'] === "0") //ยังไม่สรุป
            $time = "event afternoon";
        else 
            $time = "event afternoon past";
    }

    
    
    //check appointment status
    if ($row['app_status'] === "0"){
        $status = "icon: commenting; ratio: 0.8";
    }
    else if ($row['app_status'] === "1"){
        $status = "icon: comments; ratio: 0.8";
    }
    else if ($row['app_status'] === ""){
        $status = "icon: users; ratio: 0.8";
    }
    else {
        $status = "icon: check";
    }
    
    //patient management
    $hn = $row['patient_hn'];
    $qq = "SELECT patient_p_name,patient_name,patient_surname,patient_visit_status,patient_visit_type,patient_doctor_owner,problem from patientinfo WHERE patient_hn ='$hn' ";
    mysqli_query($link,"SET NAMES UTF8");
    mysqli_query($link,"SET character_set_results=utf8");
    mysqli_query($link,"SET character_set_client=utf8");
    mysqli_query($link,"SET character_set_connection=utf8");
    $show = mysqli_query($link,$qq);
    $print = mysqli_fetch_array($show);
    //check wheter user have any rights in an appontment
    $checkpermission = "";
    $tagformodal = "show-hn".$row['Id_app'];
    
    
?> <a href="#<?php echo $tagformodal;?>" uk-toggle>
    <div class="<?php echo $time;?>">
        
            <div class="event-desc">
                <div class="ul-text-truncate"> <span uk-icon="<?php echo $status;?>"></span> <b><?php echo $print['patient_p_name'].$print['patient_name']." ".$print['patient_surname'];?> <small>(<?php echo $hn;?>)</small></b> </div>
                <div class="uk-text-truncate">
                            <!--  row >> calendar info-->
                    <?php
                    //med own
                    $med_own = $print['patient_doctor_owner'];
                    $get_med_own = "SELECT f_user,l_user,user FROM tbuser WHERE user = '$med_own'";
                    mysqli_query($link,"SET NAMES UTF8");
                    mysqli_query($link,"SET character_set_results=utf8");
                    mysqli_query($link,"SET character_set_client=utf8");
                    mysqli_query($link,"SET character_set_connection=utf8");
                    $get_med = mysqli_query($link,$get_med_own);
                    $get_med_final = mysqli_fetch_array($get_med);
                    echo $get_med_final['f_user']." ".$get_med_final['l_user']."(".$get_med_final['user'].")";
                ?> 
                </div>
            </div>
        
    </div>
    </a>
    <?php include 'calendar_more_appointment_modal.php';?>