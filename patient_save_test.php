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
    $type = $_GET['type'];
    $id = $_POST['id-card'];
    $p_name = $_POST['pname'] ;
    $fname = $_POST['fname'] ;
    $lname = $_POST['lname'] ;
    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
        if ($gender == 1) $gender = "Male";
        else $gender = "Female";
    }
    # birthday ...
    
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
    
    $relate_flname = $_POST['relate_flname'];
    $relate_des = $_POST['relate_des'];
    $relate_tel = $_POST['relate_tel'];
    
    # $input = $_POST['med_own']; //แพทย์เจ้าของไข้
    # $input3 = $_POST['input3']; //แพทย์เยี่ยมบ้าน
    
    # update data
     $conn = new mysqli($servername, $username, $password, $dbname);
     $visit_status = $_POST['visit_status'];
     $sumSQL = "UPDATE patientinfo SET patient_id = '$id',
     patient_p_name='$pname',
     patient_name='$fname',
     patient_surname='$lname',
     patient_gender='$gender',
     patient_add_no='$add_no',
     patient_add_mhoo='$add_mhoo',
     patient_add_village='$add_village',
     patient_add_soi='$add_soi',
     patient_add_road='$add_road',
     patient_add_subdis='$add_subdis',
     patient_add_dis='$add_dis',
     patient_add_province='$add_province',
     patient_add_zip='$add_zip'
     
     
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