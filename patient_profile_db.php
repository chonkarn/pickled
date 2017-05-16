<?php

session_start();
if($_SESSION['id'] == "")
{
    header( "location:login.php");
    exit();
}
$user = $_SESSION['id'];
include 'dbname.php';
$connect = mysql_connect($servername, $username, $password) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
mysql_query("set character set utf8");  

# Patientinfo
$patient_hn = $_GET['hn'];
$hnSQL = "SELECT * FROM patientinfo 
WHERE patientinfo.patient_hn LIKE '$patient_hn'";
$result = mysql_db_query($dbname, $hnSQL) or die (mysql_error());
$row = mysql_fetch_array($result);

$patient_visit_status;
$patient_visit_type;
$patient_name = $row['patient_p_name']." ".$row['patient_name']." ".$row['patient_surname'];
if($row['patient_gender'] == 'F'){ $patient_gender = 'หญิง'; }
else { $patient_gender = 'ชาย'; }

# Date
date_default_timezone_set("Asia/Bangkok");
$patient_birthday;
$patient_dateofbirth = $row['patient_dateofbirth'];
$patient_monthofbirth = $row['patient_monthofbirth'];
$patient_yearofbirth = $row['patient_yearofbirth'];
$age_year = date("Y") - ($patient_yearofbirth - 543) -1;

if($patient_monthofbirth < date("m")){$age_month = $patient_monthofbirth;}
else if($patient_monthofbirth > date("m")){$age_month = 12 - date("m");}
else {$age_month = $patient_monthofbirth - 1;}

if($patient_dateofbirth < date("d")){$age_day = $patient_dateofbirth;}
else if($patient_dateofbirth > date("d")){$age_day = date("d");}
else {$patient_dateofbirth = 0;}

#
$patient_status = $row['patient_status'];
$patient_religion = $row['patient_religion'];
$patient_occupation = $row['patient_occupation'];
$patient_education = $row['patient_education'];
$insure = $row['insure'];

# Address
$patient_addr = $row['patient_add_no'];
$patient_add_no;
$patient_add_mhoo;
$patient_add_village;
$patient_add_soi;
$patient_add_road;
$patient_add_subdis;
$patient_add_dis;
$patient_add_province;
$patient_add_zip;

$patient_no_home = $row['patient_no_home'];
$patient_no_mobile = $row['patient_no_mobile'];
$patient_no_work = $row['patient_no_work'];

$patient_doctor_owner = $row['patient_doctor_owner'];
$patient_doctor_visit = $row['patient_doctor_visit'];

$surgery = $row['surgery'];
$allergic = $row['allergic'];
$alternative = $row['alternative'];
$alcohol = $row['alcohol'];
$alcohol_input= $row['alcohol_input'];
$cigarette = $row['cigarette'];
$cigarette_amout = $row['cigarette_amout'];
$cigarette_period = $row['cigarette_period'];

$money = $row['money'];
$hypertansion = $row['hypertansion'];
$diabetes_mellitus = $row['diabetes_mellitus'];
$dyslipidemia = $row['dyslipidemia'];
$stroke = $row['stroke'];
$cad = $row['cad'];
$cancer = $row['cancer'];
$other = $row['other'];

$main = $row['main'];
$problem = $row['problem'];

$num_visit = $row['num_visit'];
$last_visit_date = $row['last_visit'];
$next_visit_date = $row['next_visit'];
$last_visit = date("d M", strtotime($last_visit_date));
$next_visit = date("d M", strtotime($next_visit_date));

$relate_name = $row['relate_name'];
$relate_tel = $row['relate_tel'];
$relate_def = $row['relate_def'];

?>
