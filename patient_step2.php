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
                        <ul class="uk-breadcrumb">
                            <li><a href="patient.php">ผู้ป่วยเยี่ยมบ้าน</a></li>
                            <li><span href=""></span>เพิ่มผู้ป่วยเยี่ยมบ้าน</li>
                        </ul>
                        <!--stepper-nonlinear-->
                        <ul class="mdl-stepper mdl-stepper--horizontal" id="demo-stepper-nonlinear" style="height: 1300px;">
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
                            <li class="mdl-step is-active"> <span class="mdl-step__label" onclick="openPatientStep(2)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">ข้อมูลสุขภาพ</span> </span>
                                </span>
                                <div class="mdl-step__content">
                                    <?php $hn = $_GET["hn"];$type = $_GET["type"]?>
                                    <form class="uk-form-horizontal uk-margin-large" action="patient_step2_db.php?hn=<?php echo $hn;?>&type=<?php echo $type;?>" method="post">
                                        <h5>ประวัติการรักษา</h5>
                                      
                                         <div class="uk-margin">
                                            <label class="uk-form-label"> การผ่าตัด </label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <label class="uk-margin-right" for="surgery-1" onclick="surgery_check()">
                                                    <input type="radio" id="surgery-1" class="uk-radio" name="surgery" value="1" checked> <span class="uk-margin-right">ไม่มี</span> </label>
                                                <label class="uk-margin-right" for="surgery-2" onclick="surgery_check()">
                                                    <input type="radio" id="surgery-2" class="uk-radio" name="surgery" value="2"> <span class="mdl-radio__label">มี</span> </label>
                                            </div>
                                            <div class="uk-form-controls uk-form-controls-text" id="div_surgery" style="visibility:hidden;">
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text" name="surgery_input">
                                                    <label class="mdl-textfield__label" for="fname">ระบุ</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label"> การแพ้ยา / แพ้อาหาร </label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <label class="uk-margin-right" for="allgeric-1" onclick="allgeric_check()">
                                                    <input type="radio" id="allgeric-1" class="uk-radio" name="allgeric" value="1" checked> <span class="mdl-radio__label">ไม่มี</span> </label>
                                                <label class="uk-margin-right" for="allgeric-2" onclick="allgeric_check()">
                                                    <input type="radio" id="allgeric-2" class="uk-radio" name="allgeric" value="2"> <span class="mdl-radio__label">มี</span> </label>
                                            </div>
                                            <div class="uk-form-controls uk-form-controls-text" id="div_allgeric" style="visibility:hidden;">
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text" name="allgeric_input"> </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label"> แพทย์ทางเลือก </label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <label class="uk-margin-right" for="alternative-1" onclick="alternative_check()">
                                                    <input type="radio" id="alternative-1" class="uk-radio" name="alternative" value="1" checked> <span class="mdl-radio__label">ไม่มี</span> </label>
                                                <label class="uk-margin-right" for="alternative-2" onclick="alternative_check()">
                                                    <input type="radio" id="alternative-2" class="uk-radio" name="alternative" value="2"> <span class="mdl-radio__label">มี</span> </label>
                                            </div>
                                            <div class="uk-form-controls uk-form-controls-text" id="div_alternative" style="visibility:hidden;">
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text" name="alternative_input">
                                                    <label class="uk-margin-right" for="fname">ระบุ</label> <span class="mdl-textfield__error">กรอกเพียงตัวอักษร</span> </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>พฤติกรรมเสี่ยงในปัจจุบัน</h5>
                                        <div class="uk-margin">
                                            <label class="uk-form-label"> สุรา </label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <label class="uk-margin-right" for="alcohol-1" onclick="alcohol_check()">
                                                    <input type="radio" id="alcohol-1" class="uk-radio" name="alcohol" value="1" checked> <span class="mdl-radio__label"><u>ไม่</u>เคยดื่ม</span> </label>
                                                <label class="uk-margin-right" for="alcohol-2" onclick="alcohol_check()">
                                                    <input type="radio" id="alcohol-2" class="uk-radio" name="alcohol" value="2"> <span class="mdl-radio__label">ดื่มอยู่</span> </label>
                                                <label class="uk-margin-right" for="alcohol-3" onclick="alcohol_check()">
                                                    <input type="radio" id="alcohol-3" class="uk-radio" name="alcohol" value="3"> <span class="mdl-radio__label">เลิกดื่มแล้ว</span> </label>
                                            </div>
                                            <div name="div_alcohol" id="div_alcohol" class="uk-form-controls uk-form-controls-text" style="visibility:hidden;"> <small>ถ้าเคยดื่ม หรือ กำลังดื่มอยู่</small>
                                                <br>
                                                <label class="uk-margin-right" for="drink">
                                                    <input type="checkbox" id="drink" class="uk-checkbox" name="alcohol_input"> <span class="uk-margin-right">มีปัญหา เกี่ยวกับการดื่ม</span> </label>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label"> บุหรี่ </label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-1">
                                                    <input class="uk-radio" id="cigarette-1" type="radio" name="cigarette" value="1" checked> ไม่เคยสูบ</label>
                                                <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-2">
                                                    <input class="uk-radio" id="cigarette-2" type="radio" name="cigarette" value="2"> สูบอยู่</label>
                                                <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-3">
                                                    <input class="uk-radio" id="cigarette-3" type="radio" name="cigarette" value="3"> เลิกสูบแล้ว</label>
                                            </div>
                                            <div class="uk-form-controls uk-form-controls-text" id="div_cigarette" style="visibility:hidden;">
                                                <br> <small>ถ้าท่านกำลังสูบ หรือเลิกสูบแล้ว โปรดระบุปริมาณการสูบบุหรี่</small>
                                                <br>
                                                <label class="uk-margin-right"> จำนวนมวน
                                                    <input class="uk-input uk-form-width-xsmall uk-form-small" type="number" placeholder="" name="cigarette_amout"> / วัน</label>
                                                <label class="uk-margin-right"> ระยะเวลาการสูบ
                                                    <input class="uk-input uk-form-width-xsmall uk-form-small" type="number" placeholder="" name="cigarette_period"> / ปี</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>ประวัติครอบครัว</h5>
                                        <div class="uk-margin">
                                            <label class="uk-form-label"> สถานะทางการเงิน </label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <label>
                                                    <input class="uk-checkbox" type="checkbox" id="money" name="money"> มีปัญหา</label>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label"> ประวัติโรคในครอบครัว </label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox" id="hypertension" name="hypertension"> Hypertension</label>
                                                <br>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox" id="diabetes-mellitus" name="diabetes-mellitus"> Diabetes mellitus</label>
                                                <br>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox" id="dyslipidemia" name="dyslipidemia"> Dyslipidemia</label>
                                                <br>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox" id="stroke" name="stroke"> Stroke</label>
                                                <br>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox" id="cad" name="cad"> CAD</label>
                                                <br>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox" id="cancer" name="cancer"> Cancer:</label>
                                                <input class="uk-input uk-form-width-medium uk-form-small" type="text" placeholder="ระบุ" name="cancer_input"> 
                                                <br>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox" id="other" name="other"> อื่นๆ: </label>
                                                <input class="uk-input uk-form-width-medium uk-form-small" type="text" placeholder="ระบุ" name="other_input"> </div>
                                        </div>
                                        <div class="mdl-step__actions">
<!--                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect"> ย้อนกลับ </button>-->
                                    <div class="mdl-layout-spacer"></div>
                                    <button class="mdl-button mdl-js-button mdl-button--primary"> ถัดไป </button>
                                </div>
                                    </form>
                                </div>
                                
                            </li>
                            <!--step3-->
                            <li class="mdl-step"> <span class="mdl-step__label" onclick="openPatientStep(3)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">สรุปปัญหา</span> </span>
                                </span>
                                <div class="mdl-step__content"> </div>
                                <div class="mdl-step__actions">
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect"> ย้อนกลับ </button>
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