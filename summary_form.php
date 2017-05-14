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
    $hnSQL = "SELECT * FROM patientinfo 
    INNER JOIN summary ON summary.patient_hn = patientinfo.patient_hn
    INNER JOIN tbuser ON patientinfo.patient_doctor_owner = tbuser.user
    WHERE patientinfo.patient_hn LIKE '$patient_hn'";

    $result = mysql_db_query($dbname, $hnSQL) or die (mysql_error());
    $row = mysql_fetch_array($result); 
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
                        <li>เพิ่มสรุปเยี่ยมบ้าน</li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                        
                        <form action="<?php echo "summary_save.php?hn=".$patient_hn; ?>" method="post">
                            <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                                <ul class="uk-subnav uk-subnav-pill stepper" uk-switcher>
                                    <li id="step0" class="step active"><a href="#" title="สรุปเยี่ยมบ้าน" uk-tooltip><i class="material-icons">assignment</i></a></li>
                                    <li id="step1" class="step"><a href="#" title="ข้อมูลทั่วไป" uk-tooltip>1</a></li>
                                    <li id="step2" class="step uncomplete "><a href="#" title="รายละเอียดของปัญหา" uk-tooltip>2</a></li>
                                    <li id="step3 " class="step"><a href="#" title="สรุปข้อมูลปัญหา" uk-tooltip>3</a></li>
                                    <li id="step4" class="step"><a href="#" title="สรุปหลังประชุม" uk-tooltip>4</a></li>
                                </ul>
                                <ul class="uk-switcher">
                                    <li>
                                        <?php include 'summary_step0.php' ?>
                                        <div class="uk-align-right">
                                            <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next">ถัดไป <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-alert-success" uk-alert>
                                            <a class="uk-alert-close" uk-close></a>
                                            <p>กรอกข้อมูลครบถ้วน</p>
                                        </div>
                                        <?php include 'summary_step1.php' ?>
                                        <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                        <div class="uk-align-right">
                                            <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next">ถัดไป <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-alert-danger" uk-alert>
                                            <a class="uk-alert-close" uk-close></a>
                                            <p>กรอกข้อมูลไม่ครบถ้วน</p>
                                        </div>
                                        <?php include 'summary_step2.php' ?>
                                        <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                        <div class="uk-align-right">
                                            <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next">ถัดไป <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <?php include 'summary_step3.php' ?>
                                        <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                        <div class="uk-align-right">
                                            <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next">ถัดไป <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <?php include 'summary_step4.php' ?>
                                        <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
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
