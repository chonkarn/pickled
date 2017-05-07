<!DOCTYPE html>
<html>
<?php
	session_start();
	if($_SESSION['id'] == "")
	{
		header( "location:login.php");
		exit();
	}
    ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

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

                <ul class="uk-breadcrumb">
                    <li><a href="summary.html">สรุปเยี่ยมบ้าน</a></li>
                    <li><span href=""></span>เพิ่มสรุปเยี่ยมบ้าน</li>
                </ul>

                <!--stepper-nonlinear-->
                <ul class="mdl-stepper mdl-stepper--horizontal" id="demo-stepper-nonlinear">

                    <!--step1-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openSumStep(1)">
                            <span class="mdl-step__title"><span class="mdl-step__title-text">ข้อมูลทั่วไป</span></span>
                        </span>
                        <div class="mdl-step__content">

                        </div>
                        <div class="mdl-step__actions">
                            <div class="mdl-layout-spacer"></div>
                            <button class="mdl-button mdl-js-button mdl-button--primary">
                                ถัดไป
                            </button>
                        </div>
                    </li>

                    <!--step2-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openSumStep(2)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">รายละเอียดปัญหา</span>
                        </span>
                        </span>
                        <div class="mdl-step__content">

                        </div>
                        <div class="mdl-step__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                ย้อนกลับ
                            </button>
                            <div class="mdl-layout-spacer"></div>
                            <button class="mdl-button mdl-js-button mdl-button--primary">
                                ถัดไป
                            </button>
                        </div>
                    </li>

                    <!--step3-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openSumStep(3)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">สรุปข้อมูลปัญหา</span>
                        </span>
                        </span>
                        <div class="mdl-step__content">

                        </div>
                        <div class="mdl-step__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                ย้อนกลับ
                            </button>
                            <div class="mdl-layout-spacer"></div>
                            <button class="mdl-button mdl-js-button mdl-button--primary">
                                ถัดไป
                            </button>
                        </div>
                    </li>

                    <!--step4-->
                    <li class="mdl-step is-active">
                        <span class="mdl-step__label" onclick="openSumStep(4)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">สรุปหลังประชุม</span>
                        </span>
                        </span>
                        <div class="mdl-step__content">
                            <form class="uk-form-horizontal uk-margin-large">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">สรุปคำแนะนำ</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea uk-width-1-2" rows="3" placeholder="สรุปคำแนะนำ..."></textarea>
                                    </div>
                                </div>
                                <hr>
                                <h5>วางแผนครั้งต่อไป</h5>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">
                                        <input class="uk-radio" type="radio" name="next-planning" checked> เยี่ยมบ้านต่อ
                                    </label>
                                    <div class="uk-form-controls">
                                        <label class="uk-margin-right">
                                            วันที่เยี่ยม
                                        </label>
                                        <input class="uk-input uk-form-small uk-width-small" type="date">
                                        <br>
                                        <label class="uk-margin-right">
                                            ช่วงเวลา
                                        </label>
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="time" checked> เช้า <small>(9.00 - 12.00)</small>
                                        </label>
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="time"> บ่าย <small>(13.00 - 16.00)</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">
                                        <input class="uk-radio" type="radio" name="next-planning"> ปิดเยี่ยมบ้าน
                                    </label>
                                    <div class="uk-form-controls">
                                        <label class="uk-margin-right">
                                            เหตุผล
                                        </label>
                                        <select class="uk-select uk-form-small uk-width-1-3">
                                            <option>เลือกเหตุผล</option>
                                            <option>ติดต่อผู้ป่วยไม่ได้</option>
                                            <option>2 สัปดาห์</option>
                                            <option>3 สัปดาห์</option>
                                            <option>1 เดือน</option>
                                            <option>2 เดือน</option>
                                            <option>3 เดือน</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mdl-step__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" onclick="openSumStep(3)">
                                ย้อนกลับ
                            </button>
                            <div class="mdl-layout-spacer"></div>
                            <form action="patient_profile.php">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary mdl-color-text--white">
                                บันทึก
                            </button>
                                </form>
                        </div>
                    </li>
                </ul>
                <!--/.stepper-nonlinear-->
            </div>
            <!--/.demo-content-->
        </main>
    </div>

    <!--jquery-->
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