<!DOCTYPE html>
<html>
<?php
	session_start();
	if($_SESSION['id'] == "")
	{
		header( "location:login.php");
		exit();
	}
    $user = $_SESSION['id'];
    include 'dbname.php';
    $connect = mysql_connect($servername, $username, $password);
    if (!$connect) {
        die(mysql_error());
    }
    mysql_select_db("homevisit");
    mysql_query("set character set utf8");  
    
    $patient_hn = $_GET['hn'];
    $hnSQL = "SELECT * FROM patientinfo 
    INNER JOIN summary ON summary.patient_hn = patientinfo.patient_hn
    INNER JOIN tbuser ON patientinfo.patient_doctor_owner = tbuser.user
    WHERE patientinfo.patient_hn LIKE '$patient_hn'";

    $result = mysql_db_query($dbname, $hnSQL) or die (mysql_error());
    $row = mysql_fetch_array($result); 
    
    $patient_name = $row["patient_p_name"]." ".$row["patient_name"]." ".$row["patient_surname"];
    $num_visit = $row["num_visit"];
    $visit_date = $row["last_visit"];
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

        <!--uikit-->
        <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">
        <script src="lib/uikit/js/uikit.min.js"></script>
        <script src="lib/uikit/js/uikit-icons.min.js"></script>

        <!--icon-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!--custom css-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font.css">
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            
            <?php include"header.html"; ?>
            
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="summary.php" class="uk-button-text"><i class="material-icons breadcrumb-icons">assignment</i> สรุปเยี่ยมบ้าน</a></li>
                        <li>
                            <a href="<?php echo "patient_show.php?hn=".$patient_hn ?>" class="uk-button-text">
                                <?php echo $patient_name ?>
                            </a>
                        </li>
                        <li>ดูสรุปเยี่ยมบ้านครั้งที่ 
                            <?php echo $num_visit ?>
                        </li>
                    </ul>

                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
<!--
                        <div class="mdl-card__menu">
                            <button id="menu-function" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-function">
                                <li class="mdl-menu__item"><a href="patient_edit_5987452.html"><i class="material-icons">edit</i> แก้ไข</a></li>
                                <li class="mdl-menu__item"><a href="patient_print_5987452.html" target="_blank"><i class="material-icons">print</i> พิมพ์</a></li>
                            </ul>
                        </div>
-->
                        
                        <!--CARD-MENU-->
                        <div class="mdl-card__menu">
                            <a href="sumary_print.php" class="mdl-button mdl-button--icon mdl-color-text--green">
                                <i class="material-icons">print</i>
                            </a>
                            <a href="summary_form.php" class="mdl-button mdl-button--icon mdl-color-text--green">
                                <i class="material-icons">edit</i>
                            </a>
                            
                        </div>
                        
                        <!--CARD-SUPPORTING-TEXT-->
                        <div class="mdl-card__supporting-text mdl-color-text--grey-900 mdl-cell--12-col">
                            <div class="mdl-grid mdl-typography--subhead">
                                <div><img class="logo-report" src="img/logo-report.jpg">
                                    <p class="mdl-typography--body-2">FAM-MED</p>
                                </div>

                                <div>
                                    แบบบันทึกการเยี่ยมบ้าน
                                    <br> ภาควิชาเวชศาสตร์ครอบครัว คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี
                                    <p class="mdl-typography--title">Department of Family Medicine</p>
                                </div>
                            </div>

                            <div class="uk-form-horizontal">
                                <h4 class="uk-margin-top uk-text-green">ส่วนที่ 1 ข้อมูลทั่วไป</h4>
                                <div class="uk-margin">
                                    <label class="uk-form-label">
                                  ชื่อผู้ป่วย
                                </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <?php echo $patient_name ?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">
                                   รหัสโรงพยาบาล
                                </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                    HN <?php echo $patient_hn ?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">
                                   แพทย์เจ้าของไข้
                                </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        นพ.ประสงค์ ทรงธรรม
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">
                                    วันเวลาเยี่ยมบ้าน
                                </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <span class="uk-margin-right">20 มิถุนายน พ.ศ. 2559</span>
                                        เวลาเช้า (9.00-12.00 น)
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">
                                    จำนวนครั้งเยี่ยมบ้าน
                                </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        ครั้งที่ <?php echo $num_visit ?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">เหตุผลการเยี่ยมบ้าน</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="reason" checked> Assessment</label>
                                        <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="reason"> Illness management</label>
                                        <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="reason"> Palliative</label>
                                        <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="reason"> Post hospitalized</label>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">ทีมแพทย์เยี่ยมบ้าน</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <ol>
                                            <li>นพ.นพกุล ทองทา</li>
                                            <li>นพ.ประสงค์ ทรงธรรม</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">ยาที่ใช้ปัจจุบันและยาที่ซื้อกินเอง</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-auto">
                                                <label class="uk-margin-right uk-text-bold">ชื่อยา</label> ยาลดไข้
                                            </div>
                                            <div>
                                                <label class="uk-margin-right uk-text-bold">ลักษณะ</label>
                                                <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="unit"> ยาเม็ด
                                            </label>
                                                <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="unit"> ยาน้ำ
                                            </label>
                                            </div>
                                            <div>
                                                <label class="uk-margin-right uk-text-bold">โดส</label> 1 เม็ด
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-auto">
                                                <label class="uk-margin-right uk-text-bold">วิธีใช้ยา</label>
                                                <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="method" disabled> ก่อนอาหาร</label>
                                                <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="method" checked> หลังอาหาร</label>
                                            </div>
                                            <div>
                                                <label class="uk-margin-right uk-text-bold">ช่วงเวลา</label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox" checked> เช้า
                                            </label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox" checked> กลางวัน
                                            </label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox" checked> เย็น
                                            </label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox"> ก่อนนอน
                                            </label>
                                            </div>
                                        </div>
                                        <hr>

                                    </div>

                                </div>

                                <div class="uk-margin">
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-auto">
                                                <label class="uk-margin-right uk-text-bold">ชื่อยา</label> ยาลดน้ำมูก
                                            </div>
                                            <div>
                                                <label class="uk-margin-right uk-text-bold">ลักษณะ</label>
                                                <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="unit"> ยาเม็ด
                                            </label>
                                                <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="unit"> ยาน้ำ
                                            </label>
                                            </div>
                                            <div>
                                                <label class="uk-margin-right uk-text-bold">โดส</label> 1 เม็ด
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-auto">
                                                <label class="uk-margin-right uk-text-bold">วิธีใช้ยา</label>
                                                <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="method" disabled> ก่อนอาหาร</label>
                                                <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="method" checked> หลังอาหาร</label>
                                            </div>
                                            <div>
                                                <label class="uk-margin-right uk-text-bold">ช่วงเวลา</label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox" checked> เช้า
                                            </label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox" checked> กลางวัน
                                            </label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox" checked> เย็น
                                            </label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox"> ก่อนนอน
                                            </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Impairment / Immobility</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Basic activities of daily living</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                        <input class="uk-radio " type="radio" name="basic" checked> Yes
                                    </label>
                                        <label>
                                        <input class="uk-radio" type="radio" name="basic"> No
                                    </label>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <label class="uk-margin-right"><b>Problem</b></label>
                                        <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> Dressing
                                    </label>
                                        <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> Eating
                                    </label>
                                        <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> Ambulating
                                    </label>
                                        <label class="uk-margin-right">
                                        <input class="uk-checkbox" type="checkbox"> Toileting
                                    </label>
                                        <input class="uk-checkbox" type="checkbox"> Hygine
                                        <hr>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Instrumental activities of daily living</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <label class="uk-margin-right">
                                                <input class="uk-radio " type="radio" name="instrument" checked> Yes
                                            </label>
                                                <label>
                                                <input class="uk-radio" type="radio" name="instrument"> No
                                            </label>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-width-1-1">
                                                <label class="uk-margin-right"><b>Problem</b></label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox"> Shopping</label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox"> Houskeeping
                                            </label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox"> Medication
                                            </label>
                                                <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox"> Financial
                                            </label>
                                                <input class="uk-checkbox" type="checkbox"> Transpoting / Technology
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Nutrition</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Nutritional status</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="nutrition" checked> Healthy
                                    </label>
                                        <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="nutrition"> Obesity
                                    </label>
                                        <input class="uk-radio" type="radio" name="nutrition"> Malnutrition
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Home environment / Safety</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Risk</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                        <input class="uk-radio " type="radio" name="risk" checked> Yes
                                    </label>
                                        <label>
                                        <input class="uk-radio" type="radio" name="risk"> No
                                    </label>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Place at risk</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        ห้องน้ำ
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Social support</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Caregiver burden</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                        <input class="uk-radio" type="radio" name="caregiver" checked> Yes
                                    </label>
                                        <label>
                                        <input class="uk-radio" type="radio" name="caregiver"> No
                                    </label>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Main caregiver</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        sldkflsfkopk
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">สิทธิ์การรักษา</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        เบิกได้ (เอกชน)
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Medication</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Prescription drug</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-5@s">
                                                <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="prescription" checked> Yes
                                            </label>
                                                <label>
                                                <input class="uk-radio" type="radio" name="prescription"> No
                                            </label>
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Nonprescription drug</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-5@s">
                                                <label class="uk-margin-right">
                                                <input class="uk-radio " type="radio" name="nonprescription" checked> Yes
                                            </label>
                                                <label>
                                                <input class="uk-radio" type="radio" name="nonprescription"> No
                                            </label>
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Dietary supplement</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-5@s">
                                                <label class="uk-margin-right">
                                                <input class="uk-radio " type="radio" name="supplement" checked> Yes
                                            </label>
                                                <label>
                                                <input class="uk-radio" type="radio" name="supplement"> No
                                            </label>
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Medication compliance</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-5@s">
                                                <label class="uk-margin-right">
                                                <input class="uk-radio " type="radio" name="compliance" checked> Yes
                                            </label>
                                                <label>
                                                <input class="uk-radio" type="radio" name="compliance"> No
                                            </label>
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Management</p>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Assessment
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Pain & Symptom management
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid uk-grid-small">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox" checked> Medication management
                                            </div>
                                            <div class="uk-width-1-2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Procedure
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox" checked> Family meeting
                                            </div>
                                            <div class="uk-width-1-2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Social support & Health insurance
                                            </div>
                                            <div class="uk-width-1-2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Psychological care
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Rehabilitation
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text"></label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Advance direction choice
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text"></label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Dying
                                                <span class="uk-text-meta text-small">Funeral plan / Grief bereavement care</span>
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text"></label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Other specify
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!--step2-->
                                <h4 class="uk-margin-top uk-text-green">ส่วนที่ 2 </h4>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Biological problem</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        Duis accumsan, quam nec faucibus consequat, lectus tellus pellentesque orci, eget sodales ex nunc a tellus. Praesent convallis, lacus vitae luctus iaculis, velit est venenatis est, eget convallis nisl urna sed nunc. Cras tempus et dui ac facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Physical examination</p>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Vital sign</label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3@s">
                                                BP
                                                <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""> mmHg
                                            </div>
                                            <div class="uk-width-1-3@s">
                                                HR
                                                <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""> /min
                                            </div>
                                            <div class="uk-width-1-3@s">
                                                RR
                                                <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""> /min
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-width-1-2@s">
                                            Oxygen saturation
                                            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""> %
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">HEENT</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox" checked> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Heart</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox" checked> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Lungs</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox" checked> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Abdomen</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox"> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Extremities</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox"> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Neuro</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox" checked> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Score assessment</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">PPS</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Geriatric depression scale</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Mini mental state examination</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Orientation to time</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Orientation to place</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Registration</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">
                                    Attention / Calculation <span class="uk-text-warning">*</span>
                                </label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">

                                        <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Recall</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Naming</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Repetition</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Verbal command</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Written command
                                    <span class="uk-text-warning">*</span>
                                </label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">

                                        <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Writing
                                    <span class="uk-text-warning">*</span>
                                </label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">

                                        <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Visuoconstruction</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text"> Psychological and Social peroblem</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        Fusce et ipsum sollicitudin, aliquam neque ut, pulvinar nisi. Morbi ut lectus tempus, imperdiet mi sit amet, malesuada purus. Nam ut lectus non nisl sodales efficitur sit amet venenatis nisl.
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Other problem</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        Vivamus quis diam pretium, pellentesque libero in, consectetur magna. Vestibulum non pulvinar nisi. Ut eu iaculis dolor. Duis lorem metus, sagittis a varius non, viverra non mi. Ut nisi nisl, ullamcorper vel fringilla id, mattis eget ante. Ut id dolor a est sollicitudin vestibulum porttitor ut nibh.
                                    </div>
                                </div>
                                <p class="mdl-typography--title">Summarized</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Assessment and Plan</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        Ut condimentum arcu tortor. Pellentesque quis elit sed risus imperdiet eleifend eu eget metus. Maecenas tincidunt sollicitudin mattis. Cras hendrerit varius suscipit. Sed pretium dictum efficitur.
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Goal</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vestibulum erat at sapien blandit, id vehicula neque auctor. Aliquam porttitor euismod consectetur.
                                    </div>
                                </div>
                                <hr>
                                <!--step3-->
                                <h4 class="uk-margin-top uk-text-green">ส่วนที่ 3 สรุปข้อมูลปัญหา</h4>
                                <h5 class="uk-margin-top">รหัสการวินิจฉัยปัญหาผู้ป่วย</h5>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">วินิจฉัยหลัก</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">ปัญหา</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <ol>
                                            <li>Sed suscipit nibh a nisi feugiat, id vehicula nulla auctor.</li>
                                            <li>Nam sit amet tellus sit amet sem mollis blandit ut porta tortor.</li>
                                            <li>Vestibulum vitae ex fringilla, ultricies quam at, pretium libero.</li>
                                        </ol>
                                    </div>
                                </div>
                                <hr>
                                <!--step4-->
                                <h4 class="uk-margin-top uk-text-green">ส่วนที่ 4 สรุปหลังการประชุม</h4>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">สรุปคำแนะนำ</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet gravida neque, a consectetur eros. Proin facilisis posuere nisl ac feugiat.
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">วางแผนครั้งต่อไป</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        เยี่ยมบ้านต่อ ระยะเวลา 1 เดือน
                                    </div>
                                </div>
                            </div>
                            <!--/.uk-form-->

                        </div>
                    </div>
                    <!--/#summary-panel-->

                </div>
                <!--/.mdl-card-->

            </main>
        </div>

        <!--custom js-->
        <script src="js/dialog.js"></script>
        <script src="js/openwindow.js"></script>

    </body>

</html>
