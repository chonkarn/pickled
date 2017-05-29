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
    
    $patient_hn = $_GET['hn'];
    $calendar_id = $_GET['calendar_id'];
    
    //INNER JOIN summary ON summary.calendar_id = calendar_info.Id_app
    //INNER JOIN patientinfo ON patientinfo.patient_hn = calendar_info.patient_hn
    
    #calendar_info
    $calendarSQL = "SELECT * FROM calendar_info
        WHERE calendar_info.Id_app LIKE '$calendar_id'";
    $calendarQuery = mysql_db_query($dbname, $calendarSQL) or die (mysql_error());
    $calendarData = mysql_fetch_array($calendarQuery);
    $date_visit = $calendarData['dmy'];
    $time_visit_id = $calendarData['time_calen'];
    $num_visit = $calendarData['num_visit'];
    $visit_status_id = $calendarData['patient_visit_status'];
    $visit_type_id = $calendarData['patient_visit_type'];
    $doctor_owner_id = $calendarData['patient_doctor_owner'];
    
    #patientinfo
    $patientSQL = "SELECT * FROM patientinfo
        WHERE patient_hn = '$patient_hn'";
    $patientQuery = mysql_db_query($dbname, $patientSQL) or die (mysql_error());
    $patientData = mysql_fetch_array($patientQuery);
    $patient_name = $patientData["patient_p_name"]." ".$patientData["patient_name"]." ".$patientData["patient_surname"];
    
    #tbuser
    $doctor_owner_id = $calendarData['patient_doctor_owner'];
    $doctorSQL = "SELECT * FROM tbuser
        WHERE tbuser.user LIKE '$doctor_owner_id'";
    $doctorQuery = mysql_db_query($dbname, $doctorSQL) or die (mysql_error());
    $doctorData = mysql_fetch_array($doctorQuery);
    $doctor_owner = $doctorData['f_user']." ".$doctorData['l_user'];

    # meaning
    $meaningSQL = "SELECT * FROM tbmeaning
        WHERE name = 'visit_status' OR name = 'visit_type' OR name='time'";
    $meaningQuery = mysql_db_query($dbname, $meaningSQL) or die (mysql_error());
    while ($meaningData = mysql_fetch_assoc($meaningQuery)){
        switch($meaningData['name']){
            case 'visit_status': $visit_status = $meaningData['meaning']; break;
            case 'visit_type':$visit_type = $meaningData['meaning']; break;
            case 'time': $time_visit = $meaningData['meaning']; break;
        }
    }
    
?>

    <head>
        <?php include "head.html"?>
        <link rel="stylesheet" href="css/stepper.css">
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html"?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="summary.php" class="uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i> สรุปเยี่ยมบ้าน</a></li>
                        <li>แก้ไขสรุปเยี่ยมบ้าน</li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">

                        <form action="<?php echo " summary_save.php?hn=".$hn." &calendar_id=".$calendar_id; ?>" method="post">
                            <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                                <ul class="uk-subnav uk-subnav-pill stepper" uk-switcher>
                                    <li id="step0" class="step active"><a href="#" title="สรุปเยี่ยมบ้าน" uk-tooltip><i class="material-icons stepper-icons">assignment</i></a></li>
                                    <li id="step1" class="step"><a href="#" title="ข้อมูลทั่วไป" uk-tooltip>1</a></li>
                                    <li id="step2" class="step "><a href="#" title="รายละเอียดของปัญหา" uk-tooltip>2</a></li>
                                    <li id="step3" class="step"><a href="#" title="สรุปข้อมูลปัญหา" uk-tooltip>3</a></li>
                                    <li id="step4" class="step"><a href="#" title="สรุปหลังประชุม" uk-tooltip>4</a></li>
                                </ul>
                                <ul class="uk-switcher">
                                    <li>
                                        <?php include 'summary_step0.php' ?>
                                        <div class="uk-align-right">
                                            <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next" id="next-btn0">ถัดไป <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-alert-success" uk-alert>
                                            <a class="uk-alert-close" uk-close></a>
                                            <p>กรอกข้อมูลครบถ้วน</p>
                                        </div>
                                        <?php include 'summary_step1.php' ?>
                                        <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous" id="prev-btn1"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                        <div class="uk-align-right">
                                            <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next" id="next-btn1">ถัดไป <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-alert-danger" uk-alert>
                                            <a class="uk-alert-close" uk-close></a>
                                            <p>กรอกข้อมูลไม่ครบถ้วน</p>
                                        </div>
                                        <?php include 'summary_step2.php' ?>
                                        <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous" id="prev-btn2"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                        <div class="uk-align-right">
                                            <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next" id="next-btn2">ถัดไป <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <?php include 'summary_step3.php' ?>
                                        <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous" id="prev-btn3"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                        <div class="uk-align-right">
                                            <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next" id="next-btn3">ถัดไป <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <?php include 'summary_step4.php' ?>
                                        <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous" id="prev-btn4"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                        <div class="uk-align-right">
                                            <input type="submit" class="uk-button uk-button-default button-green">
                                        </div>
                                        <!--
                                        <div class="uk-align-right">
                                            <input type="submit" class="uk-button uk-button-default button-green">บันทึก
                                        </div>
-->
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.demo-content-->
            </main>
        </div>

        <!--custom js-->
        <script src="js/select.js"></script>
        <script src="js/stepper.js"></script>

    </body>

</html>
