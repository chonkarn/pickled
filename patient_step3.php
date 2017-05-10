<!DOCTYPE html>
<html>
<?php 
    include 'patient_step1_variable_manage.html';
	session_start();
	if($_SESSION['id'] == "")
	{
		echo "Please Login!";
		exit();
	}
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!--script autocomplete -->
        <?php   include 'patient_add_information_hiddeninput.php';
            include 'autocomplete_thai.php';
    ?>
            <!--mdl-->
            <link rel="stylesheet" href="lib/mdl/material.min.css">
            <link rel="stylesheet" href="lib/mdl-template-dashboard/styles.css">
            <!--uikit-->
            <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">
            <!--mdl-stepper-->
            <link rel="stylesheet" href="lib/mdl-stepper/stepper.min.css">
            <!--icon-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <!--custom css-->
            <link rel="stylesheet" href="css/main.css">
            <link rel="stylesheet" href="css/font.css"> </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <?php include "header.html";?>
                <main class="mdl-layout__content mdl-color--grey-100">
                    <div class="mdl-grid demo-content">
                        <ul class="uk-breadcrumb breadcrumb">
                    <li><a href="patient.php" class="uk-button uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i>ผู้ป่วยเยี่ยมบ้าน</a></li>
                    <li><a href="#">เพิ่มผู้ป่วยเยี่ยมบ้าน</a></li>
                </ul>
                        
                        <!--stepper-nonlinear-->
                        <ul class="mdl-stepper mdl-stepper--horizontal" id="demo-stepper-nonlinear">
                            <!--step1-->
                            <li class="mdl-step"> <span class="mdl-step__label" onclick="openPatientStep(1)">
                            <span class="mdl-step__title"><span class="mdl-step__title-text">ข้อมูลทั่วไป</span></span>
                                </span>
                                <div class="mdl-step__content "> </div>
                                <div class="mdl-step__actions">
                                    <div class="mdl-layout-spacer"></div>
                                    <button class="mdl-button mdl-js-button mdl-button--primary"> ถัดไป </button>
                                </div>
                            </li>
                            <!--step2-->
                            <li class="mdl-step"> <span class="mdl-step__label" onclick="openPatientStep(2)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">ข้อมูลสุขภาพ</span> </span>
                                </span>
                                <div class="mdl-step__content"> </div>
                                <div class="mdl-step__actions">
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect"> ย้อนกลับ </button>
                                    <div class="mdl-layout-spacer"></div>
                                    <button class="mdl-button mdl-js-button mdl-button--primary"> ถัดไป </button>
                                </div>
                            </li>
                            <!--step3-->
                            <li class="mdl-step is-active"> <span class="mdl-step__label" onclick="openPatientStep(3)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">สรุปปัญหา</span> </span>
                                </span>
                                <div class="mdl-step__content">
                                    <?php $hn = $_GET["hn"]; $type = $_GET["type"]; ?>
                                        <form class="uk-form-horizontal uk-margin-large" method="post" action="patient_step3_db.php?hn=<?php echo $hn;?>&type=<?php echo $type;?>">
                                            <h5 class="uk-text-green">รหัสการวินิจฉัยปัญหาผู้ป่วย</h5>
                                            <div class="uk-margin">
                                                <label class="uk-form-label" for="form-horizontal-text">วินิจฉัยหลัก</label>
                                                <div class="uk-form-controls uk-width-1-2">
                                                    <input id="main" name="main"> </div>
                                            </div>
                                            <hr>
                                            <div class="uk-margin" id="problems">
                                                <div class="uk-form-label" id="pp"> ปัญหาที่ <span>1</span> </div>
                                                <div class="uk-form-controls uk-width-1-2" id="p1">
                                                    <input type="text" id="problem" size="50" name="problem">
                                                    <input type="button" id="deleteDiv" value="X"> </div>
                                            </div>
                                            <div class="uk-margin">
                                                <div class="uk-form-label"> </div>
                                                <div class="uk-form-controls">
                                                    <input type="button" id="addProblems" class="uk-button uk-button-green uk-button-small" value="+ เพิ่มปัญหา"> </div>
                                                <br>
                                            </div>
                                            <div class="mdl-step__actions">
                                                <!--
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                ย้อนกลับ
                            </button>
-->
                                                <div class="mdl-layout-spacer"></div>
                                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary mdl-color-text--white"> บันทึก </button>
                                            </div>
                                        </form>
                                </div>
                        </ul>
                        <!--/.stepper-nonlinear-->
                    </div>
                    <!--/.demo-content-->
                </main>
        </div>
        <!--js-->
        <script src="lib/mdl/material.min.js"></script>
        <script src="lib/uikit/js/uikit.min.js"></script>
        <!--js stepper-->
        <script src="lib/mdl-stepper/stepper.min.js"></script>
        <script src="js/stepper-nonlinear.js"></script>
        <!--custom js-->
        <script src="js/openwindow.js"></script>
    </body>

</html>