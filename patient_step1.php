<!DOCTYPE html>
<html>

<?php 
    include 'patient_step1_variable_manage.html';
	session_start();
	if($_SESSION['id'] == "")
	{
		header( "location:login.php");
		exit();
	}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--script autocomplete -->
    <?php   
        include 'patient_add_information_hiddeninput.php';
        include 'autocomplete_thai.php';
    ?>

    <!--mdl-->
    <link rel="stylesheet" href="lib/mdl/material.min.css">
    <link rel="stylesheet" href="lib/mdl-template-dashboard/styles.css">
    <script src="lib/mdl/material.min.js"></script>

    <!--mdl-stepper-->
    <link rel="stylesheet" href="lib/mdl-stepper/stepper.min.css">
    <script src="lib/mdl-stepper/stepper.min.js"></script>
    <script src="js/stepper-nonlinear.js"></script>

    <!--uikit-->
    <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">
    <script src="lib/uikit/js/uikit.min.js"></script>
    <script src="lib/uikit/js/uikit-icons.js"></script>

    <!--icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--custom css-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">

    <!--custom js-->
    <script src="js/openwindow.js"></script>
</head>

<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <?php include "header.html"; ?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">

                <ul class="uk-breadcrumb breadcrumb">
                    <li><a href="patient.php" class="uk-button uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i>ผู้ป่วยเยี่ยมบ้าน</a></li>
                    <li><a href="#">เพิ่มผู้ป่วยเยี่ยมบ้าน</a></li>
                </ul>

                <!--stepper-nonlinear-->
                <ul class="mdl-stepper mdl-stepper--horizontal" id="demo-stepper-nonlinear" style="height: 1600px;">

                    <!--step1-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openPatientStep(1)">
                            <span class="mdl-step__title"><span class="mdl-step__title-text">ข้อมูลทั่วไป</span></span>
                        </span>
                        <div class="mdl-step__content ">
                            <form class="uk-form-horizontal uk-margin-large" action="patient_step1_db.php" method="post">
                                <div class="uk-margin">
                                    <label class="uk-form-label">
                                        รหัสโรงพยาบาล
                                    </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <input class="mdl-textfield__input" type="text" name="hn" style="visibility:hidden;" value="<?php echo $hn; ?>">
                                        <?php echo $hn; ?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">
                                        สถานะเยี่ยมบ้าน
                                    </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        ใหม่
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">
                                        ประเภทการเยี่ยมบ้าน
                                    </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <input class="uk-input uk-form-small" type="text" name="type" style="visibility:hidden;" value="<?php echo $type; ?>">

                                        <?php echo $type;?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">
                                        เลขบัตรประชาชน
                                    </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <input class="uk-input uk-form-width-small uk-form-medium" type="text" name="id-number" id="id-number">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">
                                        ชื่อ-นามสกุล
                                    </label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid uk-grid-small">
                                            <div class="uk-width-1-6">
                                                <label class="uk-form-label"><small> คำนำหน้า</small></label>
                                                <input class="uk-input uk-form-small" name="pname" id="pname" />
                                            </div>
                                            <div class="uk-width-1-4">
                                                <label class="uk-form-label"><small> ชื่อ</small></label>
                                                <input class="uk-input uk-form-small" type="text" placeholder="" name="fname">
                                            </div>
                                            <div class="uk-width-1-3">
                                                <label class="uk-form-label"><small> นามสกุล</small></label>
                                                <input class="uk-input uk-form-small" type="text" placeholder="" name="lname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">เพศ</label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="gender" value="1" checked> ชาย</label>
                                            <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="gender" value="2"> หญิง</label>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            วันเกิด
                                        </label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <select name="bday" class="uk-input uk-form-width-small uk-form-small">
                                                <?php droploop($day); ?>
                                            </select> /
                                            <select name="bmonth" class="uk-input uk-form-width-small uk-form-small">
                                                <?php droptext($month); ?>
                                            </select> /
                                            <select name="byear" class="uk-input uk-form-width-small uk-form-small">
                                                <?php droploop($year); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            สถานภาพ
                                        </label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <select name="status" class="uk-input uk-form-width-small uk-form-small">
                                        <?php droptext($status); ?>
                                    </select>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            ศาสนา
                                        </label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <select name="religion" id="religion" onchange="inputhidden(re)" class="uk-input uk-form-width-small uk-form-small">
                                                <?php droptext($religion); ?>
                                            </select>
                                            <input class="uk-input uk-form-width-small uk-form-small" type="text" name="religion_input" id="religion_input" style="visibility:hidden;" placeholder="เช่น เจได">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            ระดับการศึกษา
                                        </label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <select name="education" id="education" onchange="inputhidden(edu)" class="uk-input uk-form-width-small uk-form-small">
                                                <?php droptext($education); ?>
                                            </select>
                                            <input class="uk-input uk-form-width-small uk-form-small" type="text" id="education_input" name="education_input" style="visibility:hidden;" placeholder="เช่น สำนักสงฆ์">

                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            อาชีพ
                                        </label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <select name="occupation" id="occupation" onchange="inputhidden(occ)" class="uk-input uk-form-width-small uk-form-small">
                                                <?php droptext($occupation); ?>
                                            </select>
                                            <input class="uk-input uk-form-width-small uk-form-small" type="text" id="occupation_input" name="occupation_input" style="visibility:hidden;" placeholder="เช่น แอสซาซิน">

                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            สิทธิการรักษา
                                        </label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <!--                                            <input name="insure" id="insure" size="50" />-->
                                            <input name="insure" id="insure" class="uk-input uk-form-width-large uk-form-small" />
                                        </div>
                                    </div>
                                    <hr>
                                    <h5>ข้อมูลการติดต่อ</h5>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            ที่อยู่
                                        </label>
                                        <div class="uk-form-controls">
                                            <div class="uk-grid uk-grid-small">
                                                <div class="uk-width-1-6">
                                                    <label class="uk-form-label"><small> บ้านเลขที่</small></label>
                                                    <input class="uk-input uk-form-small" type="text" placeholder="" name="add_no">
                                                </div>
                                                <div class="uk-width-1-6">
                                                    <label class="uk-form-label"><small>หมู่ที่</small></label>
                                                    <input class="uk-input uk-form-width-small uk-form-small" type="number" name="add_mhoo" placeholder="">
                                                </div>
                                                <div class="uk-width-1-6">
                                                    <label class="uk-form-label"><small>อาคาร/หมู่บ้าน</small></label>
                                                    <input class="uk-input uk-form-small" type="text" name="add_building_village" placeholder="">
                                                </div>
                                                <div class="uk-width-1-5">
                                                    <label class="uk-form-label"><small>  ซอย</small></label>
                                                    <input class="uk-input uk-form-small" type="text" name="add_soi" placeholder="">
                                                </div>
                                                <div class="uk-width-1-4">
                                                    <label class="uk-form-label"><small>ถนน</small></label>
                                                    <input class="uk-input uk-form-small" type="text" placeholder="" name="add_road">
                                                </div>
                                                <div class="uk-width-1-5">
                                                    <label class="uk-form-label"><small>แขวง/ตำบล</small></label>
                                                    <input class="uk-input uk-form-small" type="text" placeholder="" name="add_subdis">
                                                </div>
                                                <div class="uk-width-1-5">
                                                    <label class="uk-form-label"><small> เขต/อำเภอ</small></label>
                                                    <input class="uk-input uk-form-small" type="text" placeholder="" name="add_dis">
                                                </div>
                                                <div class="uk-width-1-4">
                                                    <label class="uk-form-label"><small>จังหวัด</small></label>
                                                    <input class="uk-input uk-form-small" type="text" placeholder="" name="add_province">
                                                </div>
                                                <div class="uk-width-1-6">
                                                    <label class="uk-form-label"><small>รหัสไปรษณีย์</small></label>
                                                    <input class="uk-input uk-form-small" type="number" placeholder="" name="add_zip">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            เบอร์โทรศัพท์
                                        </label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input class="uk-input uk-form-width-medium uk-form-small" type="text" placeholder="" name="add_hno">
                                        </div>
                                    </div>
                                    <hr>
                                    <h5>ครอบครัว</h5>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            ข้อมูลญาติ
                                        </label>
                                        <div class="uk-form-control">
                                            <div class="uk-grid uk-grid-small">
                                                <div class="uk-width-1-3">
                                                    <label class="uk-form-label"><small>ชื่อ-นามสกุล</small></label>
                                                    <input class="uk-input uk-form-small" type="text" placeholder="" name="relate_flname">
                                                </div>
                                                <div class="uk-width-1-4">
                                                    <label class="uk-form-label"><small>เบอร์โทร</small></label>
                                                    <input class="uk-input uk-form-small" type="number" placeholder="" name="relate_tel">
                                                </div>
                                                <div class="uk-width-1-4">
                                                    <label class="uk-form-label"><small>เกี่ยวข้องเป็น</small></label>
                                                    <input class="uk-input uk-form-small" type="number" placeholder="" name="relate_des">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5>แพทย์ผู้ดูแล</h5>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            แพทย์เจ้าของไข้
                                        </label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input class="uk-input uk-form-width-large uk-form-small" type="text" placeholder="" name="med_own" id="med_own">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">
                                            แพทย์เยี่ยมบ้าน
                                        </label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input name="input3" id="input3" class="uk-input uk-form-width-large uk-form-small" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <!--                                            <a class="uk-button uk-button-green uk-button-small" >+ เพิ่มแพทย์</a>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="mdl-step__actions">
                                    <div class="mdl-layout-spacer"></div>
                                    <button class="mdl-button mdl-js-button mdl-button--primary">
                                ถัดไป
                            </button>
                                </div>
                            </form>
                        </div>
                    </li>
                    <!--/END step1-->

                    <!--step2-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openPatientStep(2)">
                            <span class="mdl-step__title">
                                <span class="mdl-step__title-text">ข้อมูลสุขภาพ</span>
                            </span>
                        </span>
                        <div class="mdl-step__content"></div>
                        <div class="mdl-step__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                ย้อนกลับ
                            </button>
                            <div class="mdl-layout-spacer"></div>
                            <button class="mdl-button mdl-js-button mdl-button--primary">
                                ถัดไป
                            </button>
                        </div>
                    </li><!--/END step2-->

                    <!--step3-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openPatientStep(3)">
                            <span class="mdl-step__title">
                                <span class="mdl-step__title-text">สรุปปัญหา</span>
                            </span>
                        </span>
                        <div class="mdl-step__content"></div>
                        <div class="mdl-step__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                ย้อนกลับ
                            </button>
                        </div>
                    </li><!--/END step3-->
                </ul>
                <!--/.stepper-nonlinear-->
            </div>
            <!--/.demo-content-->
        </main>
    </div>

</body>

</html>