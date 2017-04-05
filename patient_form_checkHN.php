<!DOCTYPE html>
<html>
<?php
	session_start();
	if($_SESSION['id'] == "")
	{
		echo "Please Login!";
		exit();
	}
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>

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
    <link rel="stylesheet" href="css/font.css">
</head>

<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <?php include "header.html";?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">
                
                 <ul class="uk-breadcrumb breadcrumb">
                    <li><a href="patient.php" class="uk-button uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i> ผู้ป่วยเยี่ยมบ้าน</a></li>
                    <li><span href=""></span>เพิ่มผู้ป่วยเยี่ยมบ้าน</li>
                </ul>
                
                <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell--12-col mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                        <h4 class="uk-heading-divider">ตรวจสอบเลขที่โรงพยาบาล</h4>
                        <form class="uk-form-horizontal" action="patient_form_checkHN_db.php" method="POST">
                            <div class="uk-margin">
                                <label class="uk-form-label">เลขที่โรงพยาบาล</label>
                                <div class="uk-form-controls uk-form-controls-text">
                                  <input class="uk-input uk-width-medium uk-form-small" type="number" placeholder="กรอกตัวเลข 7 หลัก" name="hn">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">สถานะเยี่ยมบ้าน
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    ใหม่
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">ประเภทการเยี่ยมบ้าน
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="type" checked value="1"> Home visit care</label>
                                    <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="type" value="2"> Geriatric case</label>
                                    <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="type" value="3"> Palliative case</label>
                                </div>
                            </div>
                            <div class="uk-text-right">
                            <a class="uk-button uk-button-default button-green" href="patient_step1.php">เริ่มกรอกข้อมูล</a></div>
                        </form>
                    </div>
                   
                </div>
                <!--/.mdl-card-->
            </div>
        </main>
    </div><!--jquery-->
    <script src="js/jquery-3.1.1.min.js"></script>

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