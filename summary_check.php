<!DOCTYPE html>
<html>

<?php
	session_start();
	if($_SESSION['id'] == "")
	{
		header( "location:login.php");
		exit();
	}
    include 'dbname.php';
    mysql_connect($servername, $username, $password) or die(mysql_error());
    mysql_select_db($dbname) or die(mysql_error());
    mysql_query("set character set utf8");  
    
    $hn = $_GET["hn"];
    $hnSQL = "SELECT * FROM patientinfo 
    INNER JOIN summary ON summary.patient_hn = patientinfo.patient_hn
    INNER JOIN tbuser ON patientinfo.patient_doctor_owner = tbuser.user
    WHERE patientinfo.patient_hn LIKE '$hn'";

    $result = mysql_db_query($dbname, $hnSQL) or die (mysql_error());
    $row = mysql_fetch_array($result); 
    
    $patient_name = $row["patient_p_name"]." ".$row["patient_name"]." ".$row["patient_surname"];
    $visit_status = $row["patient_visit_status"];
    $visit_type = $row["patient_visit_type"];
    $date = $row["visit_date"];
    $doctor_owner_fname = $row["f_user"];
    $doctor_owner_lname = $row["l_user"];
    $doctor_owner_id = $row["patient_doctor_owner"];
    
    #cannot select each doctor
    $doctor_visit_id = $row["doctor_team"];
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>

        <!--jQuery-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!--mdl-->
        <link rel="stylesheet" href="lib/mdl/material.min.css">
        <link rel="stylesheet" href="lib/mdl-template-dashboard/styles.css">
        <script src="lib/mdl/material.min.js"></script>

        <!--semantic-ui-->
        <link rel="stylesheet" href="lib/semantic-ui/dist/semantic.min.css">
        <script src="lib/semantic-ui/dist/semantic.min.js"></script>

        <!--uikit-->
        <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">
        <script src="lib/uikit/js/uikit.min.js"></script>
        <script src="lib/uikit/js/uikit-icons.min.js"></script>

        <!--icon-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!--custom css-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font.css">
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html"; ?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="summary.php"><i class="material-icons breadcrumb-icons">assignments</i>สรุปเยี่ยมบ้าน</a></li>
                        <li><span href="#"></span>เพิ่มสรุปเยี่ยมบ้าน</li>
                    </ul>

                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <h4 class="uk-heading-divider">สรุปข้อมูลเยี่ยมบ้าน</h4>
                            <form action="<?php echo "summary_form.php?hn=".$hn; ?>" method="post" class="uk-form-horizontal">
                                <div class="uk-margin">
                                    <label class="uk-form-label">เลขที่โรงพยาบาล</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        HN
                                        <?php echo $hn ?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">ชื่อ-นามสกุลผู้ป่วย
                                        </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <?php echo $patient_name ?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">สถานะเยี่ยมบ้าน
                                        </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <?php echo $visit_status ?>
                                        <!--ใหม่-->
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">ประเภทการเยี่ยมบ้าน
                                        </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <?php echo $visit_type ?>
                                        <!--Home visit care-->
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">วันเวลาที่เยี่ยม
                                        </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <?php echo $date ?>
                                        <!--2/2/2560 <small>(เช้า)</small>-->
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">แพทย์เจ้าของไข้
                                        </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <!--นพ.ประสงค์ ทรงธรรม <small>(001525)</small>-->
                                        <?php echo $doctor_owner_fname." ".$doctor_owner_lname ?>
                                        <small>(<?php echo $doctor_owner_id ?>)</small>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">ทีมแพทย์เยี่ยมบ้าน
                                        </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <ol>
                                            <li>
                                                <?php echo $doctor_visit_id ?>
                                            </li>
                                        </ol>
                                        <!--
                                            <ol>
                                                <li> นพ.นพดล นพกุล <small>(011106)</small></li>
                                                <li> นพ.นพดล นพกุล <small>(011106)</small></li>
                                            </ol>
                                        -->
                                    </div>
                                </div>
                                <hr>
                                <div class="uk-margin">
                                    <?php
                                        $sumSQL = "UPDATE summary SET summary.visit = '1' 
                                        WHERE patientinfo.patient_hn LIKE '$hn' ";
                                    ?>
                                    
                                    <label class="uk-form-label">สรุปผลเยี่ยมบ้าน</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="visit_status" value="1" checked> ได้เยี่ยมบ้าน
                                        </label>
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="visit_status" value="2"> ยกเลิกเยี่ยมบ้าน
                                        </label>
                                        <label class="uk-margin-right">
                                             <input class="uk-radio" type="radio" name="visit_status" value="3"> ปิดเยี่ยมบ้าน
                                        </label>
                                        <br>
                                        <br>
                                        
                                        ถ้าไม่ได้เยี่ยมบ้าน โปรดระบุเหตุผล:
                                        <select class="ui search dropdown" id="select-cancel-reason">
                                            <?php 
                                                #display reason cancel or close visiting in dropdown selection
                                                $reason_cancel_file = file_get_contents("txt/reason_cancel.txt");
                                                $rows = explode("\n", $reason_cancel_file);
                                                array_shift($rows);
                                                foreach($rows as $row => $data) {
                                                    $row_data = explode("\t", $data);
                                                    $info[$row]['value'] = $row_data[0];
                                                    $info[$row]['name'] = $row_data[1];
                                            ?>
                                            <option value="">เลือกเหตุผล</option>
                                            <option value="<?php echo $info[$row]['value']; ?>">
                                                <?php echo $info[$row]['name']; ?>
                                            </option>
                                            <?php } ?>
                                         </select>
                                    </div>
                                </div>
                                <div class="uk-text-right">
                                    <input class="uk-button uk-button-default button-green" type="submit">เริ่มกรอกข้อมูล
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/.mdl-card-->
                </div>
            </main>
        </div>

        <!--custom js-->
        <script src="js/select.js"></script>
    </body>

</html>