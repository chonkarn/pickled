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

    <!--icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="lib/font-awesome-4.6.3/css/font-awesome.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
</head>

<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <?php include "header.html"; ?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">

                <ul class="uk-breadcrumb">
                    <li><a href="summary.php">ผู้ป่วยเยี่ยมบ้าน</a></li>
                    <li><a href="patient_profile.php">นาง เพียรจิต จงใจรักษ์</a></li>
                    <li><span href="patient_view.php"></span>ดูข้อมูลผู้ป่วย</li>
                </ul>

                <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__menu">
                        <button id="menu-function" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-function">
                            <li class="mdl-menu__item"><a href="patient_edit_5987452.html"><i class="material-icons">edit</i> แก้ไข</a></li>
                            <li class="mdl-menu__item"><a href="patient_print.html" target="_blank"><i class="material-icons">print</i> พิมพ์</a></li>
                            <li class="mdl-menu__item"><a id="dialog-delete"><i class="material-icons">delete</i> ลบ</a></li>
                        </ul>

                        <dialog class="mdl-dialog">
                            <h4 class="mdl-dialog__title">ต้องการลบหรือไม่?</h4>
                            <div class="mdl-dialog__content">
                                <p>
                                    นาง มาลิณี เกียรติขจร
                                    <br>HN 5987452
                                </p>
                            </div>
                            <div class="mdl-dialog__actions">
                                <a href="patient.html">
                                    <button type="button" class="mdl-button">ลบ</button>
                                </a>
                                <button type="button" class="mdl-button close">ยกเลิก</button>
                            </div>
                        </dialog>
                    </div>
                    <div class="mdl-card__supporting-text mdl-color-text--grey-900 mdl-cell--12-col">
                        <div class="mdl-grid mdl-typography--subhead">
                            <div><img class="logo-report" src="img/logo-report.jpg">
                                <p class="mdl-typography--body-2">FAM-MED</p>
                            </div>

                            <div>
                                แบบบันทึกสุขภาพผู้ป่วยและครอบครัว
                                <br> ภาควิชาเวชศาสตร์ครอบครัว คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี
                                <p class="mdl-typography--title">Department of Family Medicine</p>
                            </div>
                        </div>

                        <div class="uk-form-horizontal ">
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    รหัสโรงพยาบาล
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    HN 9785356
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    สถานะการเยี่ยมบ้าน
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    เยี่ยมต่อ
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    ประเภทการเยี่ยมบ้าน
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    Home visit case
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    แพทย์เจ้าของไข้
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    นพ.ประสงค์ ทรงธรรม <small>(013651)</small>
                                </div>
                            </div>
                            <hr>
                            <h4 class="uk-margin-top uk-text-green">ส่วนที่ 1 ข้อมูลทั่วไป</h4>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    เลขบัตรประชาชน
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    3 6442 33000 27 8
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    ชื่อ-นามสกุล
                                </label>
                                <div class="uk-form-controls">
                                    นาง เพียรจิต จงใจรักษ์
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">เพศ</label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    หญิง
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    วันเกิด
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    1 มกราคม พ.ศ.2500
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    อายุ
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    60 ปี 1 เดือน 2 วัน
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    สถานภาพ
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    สมรส
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    ศาสนา
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    พุทธ
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    ระดับการศึกษา
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    ...
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    อาชีพ
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    ...
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    สิทธิการรักษา
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    เบิกได้
                                </div>
                            </div>
                            <h5>ข้อมูลการติดต่อ</h5>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    ที่อยู่
                                </label>
                                <div class="uk-form-controls">
                                    <label class="uk-margin-right">
                                        บ้านเลขที่ 270/2
                                    </label>
                                    <label class="uk-margin-right">
                                        หมู่ที่ 1
                                    </label>
                                    <label class="uk-margin-right">
                                        อาคาร/หมู่บ้าน สุขนคร
                                    </label>
                                    <label class="uk-margin-right">
                                        ซอย สามัคคี
                                    </label>
                                    <label class="uk-margin-right">
                                        ถนน พระรามหก
                                    </label>
                                    <label class="uk-margin-right">
                                        แขวง/ตำบล ทุ่งพญาไท
                                    </label>
                                    <label class="uk-margin-right">
                                        เขต/อำเภอ ราชเวที
                                    </label>
                                    <label class="uk-margin-right">
                                        จังหวัด กรุงเทพมหานคร
                                    </label>
                                    <label class="uk-margin-right">
                                        รหัสไปรษณีย์ 10400
                                    </label>


                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    เบอร์โทรศัพท์
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    096 452 1596
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    ข้อมูลญาติ
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <label class="uk-margin-right">นาง กนกวรรณ เกียรติขจร</label>
                                    <label class="uk-margin-right">เบอร์โทร 095 965 4523</label>
                                    <label class="uk-margin-right">
                                        เกี่ยวข้องเป็น ลูกสาว</label>
                                </div>
                            </div>
                            <hr>
                            <h4 class="uk-text-green">ส่วนที่ 2 ข้อมูลสุขภาพ</h4>
                            <h5 class="uk-margin-top">ประวัติการรักษา</h5>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    การผ่าตัด
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    เคยผ่าตัด ไส้ติ่ง
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    การแพ้ยา/แพ้อาหาร
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    ไม่มี
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    แพทย์ทางเลือก
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    ไม่มี
                                </div>
                            </div>
                            <h5>พฤติกรรมเสี่ยงในปัจจุบัน</h5>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    สุรา
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    เลิกดื่มแล้ว และมีปัญหาเกี่ยวกับการดื่ม

                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    บุหรี่
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <label class="uk-margin-right">สูบอยู่</label>

                                    <label class="uk-margin-right"> จำนวน ... มวน / วัน</label>

                                    <label class="uk-margin-right"> ระยะเวลาการสูบ ... ปี</label>

                                </div>
                            </div>
                            <h5>ประวัติครอบครัว</h5>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    สถานะทางการเงิน
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    ไม่มีปัญหา
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">
                                    ประวัติโรคในครอบครัว
                                </label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> Hypertension</label>
                                    <br>
                                    <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> Diabetes mellitus</label>
                                    <br>
                                    <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> Dyslipidemia</label>
                                    <br>
                                    <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> Stroke</label>
                                    <br>
                                    <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> CAD</label>
                                    <br>
                                    <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> Cancer:</label>
                                    <input class="uk-input uk-form-width-medium uk-form-small" type="text" placeholder="ระบุ">
                                    <br>
                                    <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> อื่นๆ: </label>
                                    <input class="uk-input uk-form-width-medium uk-form-small" type="text" placeholder="ระบุ">
                                </div>
                            </div>
                            <hr>
                            <h4 class="uk-margin-top uk-text-green">ส่วนที่ 3 สรุปปัญหา</h4>
                            <h5 class="uk-margin-top">รหัสการวินิจฉัยปัญหาผู้ป่วย</h5>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-horizontal-text">วินิจฉัยหลัก</label>
                                <div class="uk-form-controls">
                                    ...
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-horizontal-text">ปัญหา</label>
                                <div class="uk-form-controls">
                                    <ul>
                                        <li>...</li>
                                        <li>...</li>
                                        <li>...</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/.uk-form-->
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

    <!--custom js-->
    <script src="js/dialog.js"></script>
    <script src="js/openwindow.js"></script>
</body>

</html>