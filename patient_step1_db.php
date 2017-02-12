<?php  
session_start();
//tab 1
    $hn = $_POST['hn'];
    $type = $_POST['type'];
    $id = $_POST['id-number'];
    $p_name = $_POST['pname'] ;
    $fname = $_POST['fname'] ;
    $lname = $_POST['lname'] ;
    $bday = $_POST['bday'] ;
    $bmonth = $_POST['bmonth'] ;
    $byear = $_POST['byear'] ;
    $status = $_POST['status'];
    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
        if ($gender ==1) $gender = "male";
        else $gender = "female";
    }
    $religion = $_POST['religion'];
    if ($religion == "else"){
        $religion = $_POST['religion_input'];
    }
    $education = $_POST['education'];
    if ($education == "else"){
        $education = $_POST['education_input'];
    }
    $occupation = $_POST['occupation'];
    if ($occupation == "else"){
        $occupation = $_POST['occupation_input'];
    }
    $insure = $_POST['insure'];
    $add_no = $_POST['add_no'];
    $add_mhoo = $_POST['add_mhoo'];
    $add_building_village = $_POST['add_building_village'];
    $add_soi = $_POST['add_soi'];
    $add_road = $_POST['add_road'];
    $add_subdis = $_POST['add_subdis'];
    $add_dis = $_POST['add_dis'];
    $add_province = $_POST['add_province'];
    $add_zip = $_POST['add_zip'];
    $add_hno = $_POST['add_hno'];
    $relate_flname = $_POST['relate_flname'];
    $relate_des = $_POST['relate_des'];
    $relate_tel = $_POST['relate_tel'];
    $input = $_POST['med_own']; //แพทย์เจ้าของไข้
    $input3 = $_POST['input3']; //แพทย์เยี่ยมบ้าน


$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'homevisit';
mysql_connect($dbhost,$dbuser,$dbpass) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");



//insure
$insureid = "SELECT insure_id FROM healthinsure where insure_name ='$insure'";
$q=mysql_query($insureid);   
$r=mysql_fetch_array($q);
$ins = $r['insure_id'];
//end insure

$sql20="UPDATE patientinfo SET ";
$sql20=$sql20."patient_id='$id',patient_p_name='$p_name',patient_name='$fname',patient_surname='$lname',patient_gender='$gender',patient_dateofbirth='$bday',patient_monthofbirth='$bmonth',patient_yearofbirth='$byear',patient_status='$status',patient_religion='$religion',patient_occupation='$occupation',patient_education='$education'";
$long=",patient_add_no='$add_no',patient_add_mhoo='$add_mhoo',patient_add_village='$add_building_village',patient_add_soi='$add_soi',patient_add_road='$add_road',patient_add_subdis='$add_subdis',patient_add_dis='$add_dis',patient_add_province='$add_province',patient_add_zip='$add_zip',patient_no_home='$add_hno'";
$med = ",patient_doctor_owner='$input',patient_doctor_visit='$input3'";
$relate = ",relate_name='$relate_flname',relate_def='$relate_des',relate_tel='$relate_tel',insure='$ins'";
$sql20=$sql20.$long.$med.$relate." WHERE patient_hn = '$hn' ";
mysql_db_query($dbname,$sql20) or die (mysql_error());
//session_unset();
//session_destroy(); 
mysql_close();

 header( "location: patient_step2.php?hn=".$hn."&type=".$type);
 exit(0);
?>