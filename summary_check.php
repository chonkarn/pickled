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
        <header class="demo-header mdl-layout__header mdl-color--primary mdl-color-text--white">
            <div class="mdl-layout__header-row">
                <img src="img/logo-rama.png" width="50px" style="margin-right: 20px;">
                <div class="mdl-layout-title" style="margin-top: 20px;">
                    <h6 class="mdl-typography--title mdl-color-text--white">
                        ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน
                        <p>ภาควิชาเวชศาสตร์ครอบครัว คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี มหาวิทยาลัยมหิดล</p>
                    </h6>
                </div>
            </div>
        </header>
        <div class="demo-drawer mdl-layout__drawer mdl-color--green">
            <header class="demo-drawer-header">
                <img src="img/user.jpg" class="demo-avatar">
                <div class="demo-avatar-dropdown">
                    <span class="mdl-color-text--white">
                        นพ.ประสงค์ ทรงธรรม<br>
                        <small>แพทย์ประจำบ้าน</small>
                    </span>
                    <div class="mdl-layout-spacer"></div>
                    <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons mdl-color-text--white">arrow_drop_down</i>
                    </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                        <li class="mdl-menu__item">แก้ไขข้อมูลส่วนตัว</li>
                        <li class="mdl-menu__item"><i class="material-icons">exit_to_app</i> ออกจากระบบ</li>
                    </ul>
                </div>
            </header>
            <nav class="demo-navigation mdl-navigation mdl-color--grey-200">
                <a class="mdl-navigation__link mdl-color-text--grey-900" href="index.html">
                    <i class="material-icons mdl-color-text--grey-900" role="presentation">home</i> หน้าหลัก
                </a>
                <a class="mdl-navigation__link mdl-color-text--grey-900" href="patient.html">
                    <i class="material-icons mdl-color-text--grey-900">folder_shared</i> ผู้ป่วยเยี่ยมบ้าน
                </a>
                <a class="mdl-navigation__link mdl-color-text--grey-900" href="summary.html">
                    <i class="material-icons mdl-color-text--grey-900">assignment</i> สรุปเยี่ยมบ้าน
                </a>
                <div class="mdl-layout-spacer"></div>
            </nav>
        </div>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">

                <ul class="uk-breadcrumb">
                    <li><a href="patient.html">สรุปเยี่ยมบ้าน</a></li>
                    <li><span href="#"></span>เพิ่มสรุปเยี่ยมบ้าน</li>
                </ul>

                <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell--12-col mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-color-text--grey-900">
                        <h4>สรุปข้อมูลเยี่ยมบ้าน</h4>
                        <form class="uk-form-horizontal">
                            <div class="uk-margin">
                                <label class="uk-form-label">เลขที่โรงพยาบาล</label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    HN 9785356
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">ชื่อ-นามสกุลผู้ป่วย
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    นาง เพียรจิต จงใจรักษ์
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
                                    Home visit care
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">วันเวลาที่เยี่ยม
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    2/2/2560 <small>(เช้า)</small>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">แพทย์เจ้าของไข้
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    นพ.ประสงค์ ทรงธรรม <small>(013655)</small>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">ทีมแพทย์เยี่ยมบ้าน
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <ol>
                                        <li> นพ.นพดล นพกุล <small>(011106)</small></li>
                                        <li> นพ.นพดล นพกุล <small>(011106)</small></li>
                                    </ol>
                                </div>
                            </div>
                            <hr>
                            <div class="uk-margin">
                                <label class="uk-form-label">สรุปผลเยี่ยมบ้าน
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="reason" checked> ได้เยี่ยมบ้าน
                                    </label>
                                    <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="reason"> ยกเลิกเยี่ยมบ้าน
                                    </label>
                                    <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="reason"> ปิดเยี่ยมบ้าน
                                    </label>
                                    <br>
                                    <br>
                                    <small>ถ้าไม่ได้เยี่ยมบ้าน โปรดระบุเหตุผล</small>
                                    <input class="uk-input uk-form-width-medium uk-form-small" type="text" placeholder="เลือกเหตุผล">
                                </div>
                            </div>
                            <div class="uk-text-right">
                                <button class="uk-button uk-button-green">
                                    <a href="summary_step1.php">เริ่มกรอกข้อมูล</a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.mdl-card-->
            </div>
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
Contact GitHub API Training Shop Blog About
© 2017 GitHub, Inc. Terms Privacy Security 