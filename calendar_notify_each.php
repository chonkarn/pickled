<li>
    <div class="uk-grid-small uk-flex-middle" uk-grid>
        <div class="uk-width-auto"> <span uk-icon="icon: commenting"></span> </div>
        <div class="uk-width-expand">
            <?php 
                                                                $day = explode("-",$row['dmy']);
                                                                switch($day[1]){
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
                                                                $day[0] +=543;
                                                                //patient management
                                                                $select_patient_info = "SELECT patient_doctor_owner,patient_p_name,patient_name,patient_surname,patient_visit_status,patient_visit_type,patient_doctor_owner,problem FROM patientinfo WHERE patient_hn =".$row['patient_hn'];
                                                                mysqli_query($link,"SET NAMES UTF8");
                                                                mysqli_query($link,"SET character_set_results=utf8");
                                                                mysqli_query($link,"SET character_set_client=utf8");
                                                                mysqli_query($link,"SET character_set_connection=utf8");
                                                                $query_patient = mysqli_query($link,$select_patient_info);
                                                                $fetchquery_patient = mysqli_fetch_array($query_patient);
                                                                
                                                                ?>
                <h5 class="uk-margin-remove-bottom">นัดหมายวันที่ <?php echo $day[2]." ".$thaimonth." ".$day[0];?> 
                                                                    <b><?php echo $fetchquery_patient['patient_p_name'].$fetchquery_patient['patient_name']." ".$fetchquery_patient['patient_surname'];?> <small>(HN <?php echo $row['patient_hn'];?>)</small></b>
                                                                </h5> </div>
        <?php $tagformodal = "show-hn".$row['Id_app'];?>
        <div class="uk-float-right">
                                                                <a href="#<?php echo $tagformodal;?>"  class="uk-button uk-button-text" uk-toggle>รอการตอบรับ <span class="text-yellow">&#11044;</span></a>
                                                                <!--THIS IS A MODAL-->
                                                                <div id="<?php echo $tagformodal;?>" uk-modal="center: true">
                                                                    <div class="uk-modal-dialog">
                                                                        <button class="uk-modal-close-default" type="button" uk-close></button>

                                                                        <div class=" uk-modal-body">
                                                                            <h4><?php echo $fetchquery_patient['patient_p_name'].$fetchquery_patient['patient_name']." ".$fetchquery_patient['patient_surname'];?> <small>(HN <?php echo $row['patient_hn'];?>)</small></h4>

                                                                            <form class="uk-form-horizontal " action="calendar_notify_each_db.php" method="post">
                                                                                <div class=" uk-margin-small">
                                                                                    <label class="uk-form-label">สถานะเยี่ยมบ้าน</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        ใหม่
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">ประเภทการเยี่ยมบ้าน</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        Home visit care
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">วันเวลาที่เยี่ยม</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        <?php echo $row['dmy'];?> 
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">แพทย์เจ้าของไข้</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                         <?php
                    //med own
                    $med_own = $fetchquery_patient['patient_doctor_owner'];
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
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">ทีมแพทย์เยี่ยมบ้าน</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        <?php 

                              //doctor management
            $id_app = $row['Id_app'];
            $aa = "SELECT * FROM calendar_members_status WHERE Id_app=$id_app";
            $quedoc = mysqli_query($link,$aa);
            while ($sleep = mysqli_fetch_assoc($quedoc))
                {
                    
                    $tired = $sleep['Id_members'];
                    
                        if ($sleep['members_status']== 1) $s = "<br><span class=\"text-green\">&#11044;</span>";
                        else if ($sleep['members_status']== 0) $s = "<br><span class=\"text-yellow\">&#11044;</span>";
                        else $s = "<br><span class=\"text-red\">&#11044;</span>";
                    $getname = "SELECT f_user,l_user,user FROM tbuser WHERE user = '$tired'";
                    mysqli_query($link,"SET NAMES UTF8");
                    mysqli_query($link,"SET character_set_results=utf8");
                    mysqli_query($link,"SET character_set_client=utf8");
                    mysqli_query($link,"SET character_set_connection=utf8");
                    $getnameplz = mysqli_query($link,$getname);
                    $finally = mysqli_fetch_array($getnameplz);
                    if ($finally['user'] === $_SESSION['id']) {$checkpermission = "permit";}
                    echo $s.$finally['f_user']."  ".$finally['l_user']."<small>(".$finally['user'].")</small>";
                   
                }
                    echo "<br>";
                        ?>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">สรุปข้อมูลปัญหาผู้ป่วย</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        <ol>
                                                                                            <li> I10 <small>Essential (primary) hypertension</small></li>
                                                                                            <li> E117 <small>Non-insulin-dependent diabetes mellitus, with multiple complications</small></li>
                                                                                        </ol>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="uk-margin">
                                                                                    <label class="uk-form-label">เข้าร่วมทีมเยี่ยมบ้านหรือไม่?</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason" value="0"> อาจจะ</label>
                                                                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason" value="1"> เข้าร่วม</label>
                                                                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason" value="2"> ปฏิเสธ</label>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="uk-modal-footer">
                                                                            <div class="uk-align-right uk-margin-remove-vertical">
                                                                                <button class="uk-button uk-button-green uk-button-small" uk- type="button">บันทึก</button>
                                                                            </div>
                                                                        </div>
                                                                        <!--/.uk-modal-footer-->
                                                                    </div>
                                                                </div>
                                                                <!--/.uk-modal--></div>
</li>


