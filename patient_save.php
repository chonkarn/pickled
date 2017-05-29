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
    
    $patient_id = $_POST['patient_id'];
    $pname = $_POST['pname'] ;
    $fname = $_POST['fname'] ;
    $lname = $_POST['lname'] ;
    if(isset($_POST['gender'])){ $gender = $_POST['gender']; }
    
    # birthday
    $bday = $_POST['bday'];
    $bmonth = $_POST['bmonth'];
    $byear = $_POST['byear'];
    
    $status = $_POST['status'];
    $religion = $_POST['religion'];
    $occupation = $_POST['occupation'];
    $education = $_POST['education'];
    $insure = $_POST['insure'];
    
    # address
    $add_no = $_POST['add_no'];
    $add_mhoo = $_POST['add_mhoo'];
    $add_village = $_POST['add_village'];
    $add_soi = $_POST['add_soi'];
    $add_road = $_POST['add_road'];
    $add_subdis = $_POST['add_subdis'];
    $add_dis = $_POST['add_dis'];
    $add_province = $_POST['add_province'];
    $add_zip = $_POST['add_zip'];
    
    # telephone
    $tel_home = $_POST['tel_home'];
    $tel_mobile = $_POST['tel_mobile'];
    $tel_work = $_POST['tel_work'];
    
    # relation
    $relate_name = $_POST['relate_name'];
    $relate_tel = $_POST['relate_tel'];
    $relate_def = $_POST['relate_def'];
    
    $doctor_owner = $_POST['doctor-owner'];
    
    # health info
    $surgery = $_POST['surgery'];
    $surgery_input = $_POST['surgery_input'];
    $allergic = $_POST['allergic'];
    $allergic_input = $_POST['allergic_input'];
    $alternative = $_POST['alternative'];
    $alternative_input = $_POST['alternative_input'];
    $alcohol = $_POST['alcohol'];
    if(isset($_POST['alcohol_input'])) { $alcohol_input = 1; }
    else { $alcohol_input = 0; }
    $cigarette = $_POST['cigarette'];
    if(!isset($_POST['cigarette_amount'])) { $cigarette_amount = NULL; }
    if(!isset($_POST['cigarette_period'])) { $cigarette_period = NULL; }
    
    if(isset($_POST['money'])) { $money = 1; } else { $money = 0; }
    if(isset($_POST['hypertansion'])) { $hypertansion = 1; } else { $hypertansion = 0; }
    if(isset($_POST['diabetes_mellitus'])) { $diabetes_mellitus = 1; } else { $diabetes_mellitus = 0; }
    if(isset($_POST['dyslipidemia'])) { $dyslipidemia = 1; } else { $dyslipidemia = 0; }
    if(isset($_POST['stroke'])) { $stroke = 1; } else { $stroke = 0; }
    if(isset($_POST['cad'])) { $cad = 1; } else { $cad = 0; }
    
    if(isset($_POST['cancer'])) { $cancer = 1; } else { $cancer = 0; }
    if(!isset($_POST['cancer_input'])) { $cancer_input = NULL; }
    
    if(isset($_POST['other'])) { $other = 1; } else { $other = 0; }
    if(!isset($_POST['other_input'])) { $other_input = NULL; }

    //$main
    //$problem
    
    # update data
     $conn = new mysqli($servername, $username, $password, $dbname);
    
     $sumSQL = "UPDATE patientinfo SET patient_id = '$patient_id',
        patient_pname='$pname',
        patient_fname='$fname',
        patient_lname='$lname',
        patient_gender='$gender',
        patient_bday= '$bday',
        patient_bmonth = '$bmonth',
        patient_byear = '$byear',
        patient_status = '$status',
        patient_religion = '$religion',
        patient_occupation = '$occupation',
        patient_education = '$education',
        healthinsure = '$insure',
        patient_add_no = '$add_no',
        patient_add_mhoo='$add_mhoo',
        patient_add_village='$add_village',
        patient_add_soi='$add_soi',
        patient_add_road='$add_road',
        patient_add_subdis='$add_subdis',
        patient_add_dis='$add_dis',
        patient_add_province='$add_province',
        patient_add_zip='$add_zip',
        patient_tel_home = '$tel_home',
        patient_tel_mobile = '$tel_mobile',
        patient_tel_work = '$tel_work',
        patient_doctor_owner = '$doctor_owner',
        surgery = '$surgery',
        surgery_input = '$surgery_input',
        allergic = '$allergic',
        allergic_input = '$allergic_input',
        alternative = '$alternative',
        alternative_input = '$alternative_input',
        alcohol = '$alcohol',
        alcohol_input = '$alcohol_input',
        cigarette = '$cigarette',
        cigarette_amount = '$cigarette_amount',
        cigarette_period = '$cigarette_period',
        money = '$money',
        hypertansion = '$hypertansion',
        diabetes_mellitus = '$diabetes_mellitus',
        dyslipidemia = '$dyslipidemia',
        stroke = '$stroke',
        cad = '$cad',
        cancer = '$cancer',
        cancer_input = '$cancer_input',
        other = '$other',
        other_input = '$other_input'
        
        WHERE patient_hn = '$patient_hn'";
    
     $conn->query($sumSQL);
    
    mysql_db_query($dbname, $sumSQL) or die (mysql_error());
    mysql_close();
    
    header("location: patient.php");
?>

    <head>
        <?php include "head.html"?>
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
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <div class="uk-text-center">
                                <h4>กรุณารอสักครู่</h4>
                                <div class="mdl-spinner mdl-js-spinner is-active"></div>
                                <p>กำลังบันทึกข้อมูลของ</p>
                                <span class="text-green"><?php echo $patient_name." (HN ".$patient_hn.")"; ?></span>
                            </div>
                        </div>
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