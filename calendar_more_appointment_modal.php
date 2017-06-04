<!--THIS IS A MODAL-->
<?php $tagformodal = "show-hn".$row['Id_app'];?>
    <div id="<?php echo $tagformodal;?>" uk-modal="center: true; stack: true">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class=" uk-modal-body">
                <h4><?php echo $print['patient_p_name'].$print['patient_name']." ".$print['patient_surname'];?> (<?php echo $hn;?>)</h4>
                <div class=" uk-margin-small">
                    <label class="uk-form-label">สถานะเยี่ยมบ้าน  </label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <?php echo visit_status($print['patient_visit_status']);?>
                    </div>
                </div>
                <div class="uk-margin-small">
                    <label class="uk-form-label">ประเภทการเยี่ยมบ้าน </label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <?php echo visit_type($print['patient_visit_type']);?>
                    </div>
                </div>
                <div class="uk-margin-small">
                    <label class="uk-form-label">วันเวลาที่เยี่ยม </label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <?php echo $datechecklink;?> <small><?php echo time_cal($row['time_calen']); ?></small> </div>
                </div>
                <div class="uk-margin-small">
                    <label class="uk-form-label">แพทย์เจ้าของไข้ </label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <?php echo $get_med_final['f_user']." ".$get_med_final['l_user']."<small>(".$get_med_final['user'].")</small>"; ?> </div>
                </div>
                <div class="uk-margin-small">
                    <label class="uk-form-label">ทีมแพทย์เยี่ยมบ้าน </label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <?php 

                              //doctor management
            $id_app = $row['Id_app'];
            $aa = "SELECT * FROM calendar_members_status WHERE Id_app=$id_app";
            $quedoc = mysqli_query($link,$aa);
            while ($sleep = mysqli_fetch_assoc($quedoc))
                {
                    
                    $tired = $sleep['Id_members'];
                    if ($tired === $_SESSION['id']) $id_status = $sleep['members_status'];
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
                    <label class="uk-form-label">สรุปข้อมูลปัญหาผู้ป่วย </label>
                    <div class="uk-form-controls uk-form-controls-text">
                        
 
                        <ol>
                        <?php 
                        $problems = explode(",",$print["problem"]);
                        foreach ($problems as $icd10){
                        $qicd10 = "SELECT * FROM icd10 WHERE icd10_id='$icd10'";
                        $qicd10_val = mysqli_query($link,$qicd10);
                        $qicd10_test = mysqli_fetch_assoc($qicd10_val);
                        echo "<li> ".$icd10." <small>".$qicd10_test["icd10_name"]."</small></li>";

                        }
                        ?>
                            
                        </ol>
                    </div>
                </div>
                <hr>

                <?php 
                    $checkval = explode("-",$datechecklink); 
                    switch ($checkval[1]){
                        case "01": $checkmonth = 1; break;
                        case "02": $checkmonth = 2; break;
                        case "03": $checkmonth = 3; break;
                        case "04": $checkmonth = 4; break;
                        case "05": $checkmonth = 5; break;
                        case "06": $checkmonth = 6; break;
                        case "07": $checkmonth = 7; break; 
                        case "08": $checkmonth = 8; break; 
                        case "09": $checkmonth = 9; break;
                        case "10": $checkmonth = 10; break;
                        case "11": $checkmonth = 11; break;
                        case "12": $checkmonth = 12; break;
                            
                    }
                    if ($checkpermission === "permit"){
                        if (date("n") < $checkmonth) @include 'calendar_summit.html';
                        else if (date("n") == $checkmonth && date("d") < $checkval[2]) @include 'calendar_summit.html';  
                        else  @include 'calendar_summary.php';    
                    }
                    if ($row['Id_own_calen'] === $_SESSION['id']) {
//                        include 'calendar_more_appointment_modal.php';
//                        if ($id_status != 1) 
                            include 'calendar_editor_footer.html';
                          
                    }
                      
                    
                ?>
            </div>
        </div>
    </div>
    <!--/.uk-modal-->