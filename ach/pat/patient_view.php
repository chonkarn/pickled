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
    
?>

    <head>
        <?php include "head.html"; ?>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html"; ?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--BREADCRUMB-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="patient.php" class="uk-button uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i>ผู้ป่วยเยี่ยมบ้าน</a></li>
                        <li><a href="#" class="uk-button uk-button-text">นาง เพียรจิต จงใจรักษ์</a></li>
                        <li>ดูข้อมูลผู้ป่วย</li>
                    </ul>

                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                        <div class="mdl-card__menu">
                            <button id="menu-function" class="mdl-button mdl-js-button mdl-button--icon">
                                    <i class="material-icons">more_vert</i>
                                </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-function">
                                <li class="mdl-menu__item"><a href="patient_edit_5987452.html"><i class="material-icons icon-small">edit</i> แก้ไข</a></li>
                                <li class="mdl-menu__item"><a href="patient_print.html" target="_blank"><i class="material-icons icon-small">print</i> พิมพ์</a></li>
                                <li class="mdl-menu__item"><a id="dialog-delete"><i class="material-icons icon-small">delete</i> ลบ</a></li>
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

                            <dl class="dl-horizontal mdl-typography--subhead">
                                <dt>รหัสโรงพยาบาล</dt>
                                <dd>HN 9785356</dd>

                                <dt>สถานะการเยี่ยมบ้าน</dt>
                                <dd>เยี่ยมต่อ</dd>

                                <dt>ประเภทการเยี่ยมบ้าน</dt>
                                <dd>Home visit care</dd>


                                <dt>แพทย์เจ้าของไข้</dt>
                                <dd>นพ.ประสงค์ ทรงธรรม (013651)</dd>

                                <hr>

                                <h1 class="mdl-typography--title mdl-color-text--green">ส่วนที่ 1 ข้อมูลทั่วไป</h1>

                                <dt>เลขที่บัตรประชาชน</dt>
                                <dd>3 6442 33000 27 8</dd>

                                <dt>ชื่อ-นามสกุล</dt>
                                <dd>นาง มาลิณี เกียรติขจร</dd>

                                <dt>ที่อยู่ปัจจุบัน</dt>
                                <dd>เลขที่ 270 หมู่ที่ 1 อาคาร/หมู่บ้าน สุขนคร ซอย สามัคคี ถนน พระรามหก แขวง/ตำบล ทุ่งพญาไท เขต/อำเภอ ราชเวที จังหวัด กรุงเทพมหานคร 10400</dd>

                                <dt>เพศ</dt>
                                <dd><i class="fa fa-venus"></i> หญิง</dd>

                                <dt>วัน เดือน ปีเกิด</dt>
                                <dd>13 มีนาคม พ.ศ.2498</dd>

                                <dt>อายุ</dt>
                                <dd>60 ปี 10 เดือน</dd>

                                <dt>โทรศัพท์มือถือ</dt>
                                <dd><i class="fa fa-phone"></i> 096 452 1596</dd>

                                <dt>โทรศัพท์ที่ทำงาน</dt>
                                <dd>-</dd>

                                <dt>โทรศัพท์ที่บ้าน</dt>
                                <dd><i class="fa fa-phone"></i> 02 644 9042</dd>

                                <dt>สถานภาพ</dt>
                                <dd>สมรส</dd>

                                <dt>ศาสนา</dt>
                                <dd>พุทธ</dd>

                                <dt>ระดับการศึกษา</dt>
                                <dd>มัธยมศึกษาตอนต้น</dd>

                                <dt>อาชีพ</dt>
                                <dd>แม่บ้าน/ว่างงาน</dd>

                                <dt>สิทธิการรักษา</dt>
                                <dd>เบิกได้</dd>

                                <hr>

                                <dt>ข้อมูลญาติที่ติดต่อได้</dt>
                                <dd>
                                    <b>ญาติคนที่ 1:</b>
                                    <br> ชื่อ-นามสกุล: นาง กนกวรรณ เกียรติขจร เกี่ยวข้องเป็น ลูกสาว
                                    <br> เบอร์ติดต่อ: <i class="fa fa-phone"></i> 095 965 4523
                                    <hr>
                                    <b>ญาติคนที่ 2:</b>
                                    <br> ชื่อ-นามสกุล: นาง ปราณี เกียรติขจร เกี่ยวข้องเป็น น้องสาว
                                    <br> เบอร์ติดต่อ: <i class="fa fa-phone"></i> 094 456 1234
                                </dd>

                                <hr>

                                <dt>แผนผังครอบครัว</dt>
                                <dd><img src="img/familytree.jpg" style="border: 1px solid #ccc;" width=""></dd>

                                <hr>

                                <dt>แผนที่บ้าน</dt>
                                <dd>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.202290236063!2d100.52447731529752!3d13.76667120065673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2994da99aa1fd%3A0xc4dd9b398f456bcf!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4Lij4Liy4Lih4Liy4LiY4Li04Lia4LiU4Li1!5e0!3m2!1sth!2sth!4v1455191320193" width="500" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </dd>

                                <hr>

                                <h1 class="mdl-typography--title mdl-color-text--green">ส่วนที่ 2 ข้อมูลสุขภาพ</h1>
                                <h3 class="mdl-typography--title">ประวัติการรักษา</h3>

                                <dt>การผ่าตัด</dt>
                                <dd>เคยผ่าตัด ไส้ติ่ง</dd>

                                <dt>การแพ้ยา/แพ้อาหาร</dt>
                                <dd>ไม่มี</dd>

                                <dt>แพทย์ทางเลือก</dt>
                                <dd>ไม่มี</dd>

                                <h3 class="mdl-typography--title">พฤติกรรมเสี่ยงในปัจจุบัน</h3>
                                <dt>สุรา</dt>
                                <dd>
                                    เลิกดื่มแล้ว และ ไม่มีปัญหาเกี่ยวกับการดื่ม
                                </dd>

                                <dt>บุหรี่</dt>
                                <dd>ไม่เคยสูบ</dd>

                                <h3 class="mdl-typography--title">ประวัติครอบครัว</h3>

                                <dt>สถานะทางการเงิน</dt>
                                <dd>ไม่มีปัญหา</dd>

                                <dt>ประวัติโรคในครอบครัว</dt>
                                <dd>
                                    <ul class="mdl-typography--subhead">
                                        <li>Hypertension</li>
                                        <li>Stroke</li>
                                    </ul>
                                </dd>

                                <hr>

                                <h1 class="mdl-typography--title mdl-color-text--green">ส่วนที่ 3 สรุปข้อมูลปัญหาผู้ป่วย</h1>

                                <dt>รหัสการวินิจฉัยปัญหา</dt>
                                <dd>
                                    <ul class="mdl-typography--subhead">
                                        <li>B07 Viral warts</li>
                                        <li>E117 Non-insulin-dependent diabetes mellitus ,with multiple complications
                                        </li>
                                    </ul>
                                </dd>

                                <hr>

                                <dt> ผู้บันทึกข้อมูล </dt>
                                <dd>
                                    นพ.ประสงค์ ทรงธรรม (013651) เมื่อวันที่ 24/09/2559
                                </dd>
                            </dl>
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
