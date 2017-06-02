<?php

# Patient HN
$patient_hn = $_GET['hn'];
$patientSQL = "SELECT * FROM patientinfo WHERE patientinfo.patient_hn LIKE '$patient_hn'";
$patientQuery = mysql_db_query($dbname, $patientSQL) or die (mysql_error());
$row = mysql_fetch_array($patientQuery);

$patient_visit_status = $row['patient_visit_status'];
$patient_visit_type = $row['patient_visit_type'];

# Patient name
$patient_pname = $row['patient_p_name'];
$patient_fname = $row['patient_name'];
$patient_lname = $row['patient_surname'];
$patient_name = $patient_pname." ".$patient_fname." ".$patient_lname;

$patient_id = $row['patient_id'];
$patient_gender = $row['patient_gender'];
$patient_status = $row['patient_status'];
$patient_religion = $row['patient_religion'];
$patient_occupation = $row['patient_occupation'];
$patient_education = $row['patient_education'];

# Date
date_default_timezone_set("Asia/Bangkok");
$patient_bday = $row['patient_bday'];
$patient_bmonth = $row['patient_bmonth'];
$patient_byear = $row['patient_byear'];
$patient_birthday = $patient_bday." ".$patient_bmonth." ".$patient_byear;

# Age
$age_year = date("Y") - ($patient_byear - 543) -1;

if($patient_bmonth < date("m")){$age_month = $patient_bmonth;}
else if($patient_bmonth > date("m")){$age_month = 12 - date("m");}
else {$age_month = $patient_bmonth - 1;}

if($patient_birthday < date("d")){$age_day = $patient_birthday;}
else if($patient_birthday > date("d")){$age_day = date("d");}
else {$patient_birthday = 0;}

# Healthinsure
$insure_id = $row['healthinsure'];
$insureSQL = "SELECT * FROM healthinsure WHERE insure_id = '$insure_id'";
$insureQuery = mysql_db_query($dbname, $insureSQL) or die (mysql_error());
$insureData = mysql_fetch_array($insureQuery);
$healthinsure = $insureData['insure_name'];

# Address
$patient_addr = $row['patient_add_no'];
$add_no = $row['patient_add_no'];
$add_mhoo = $row['patient_add_mhoo'];
$add_village = $row['patient_add_village'];
$add_soi = $row['patient_add_soi'];
$add_road = $row['patient_add_road'];
$add_subdis = $row['patient_add_subdis'];
$add_dis = $row['patient_add_dis'];
$add_province = $row['patient_add_province'];
$add_zip = $row['patient_add_zip'];

# Tel
$patient_tel_home = $row['patient_tel_home'];
$patient_tel_mobile = $row['patient_tel_mobile'];
$patient_tel_work = $row['patient_tel_work'];

# Doctor
$doctor_owner_id = $row['patient_doctor_owner'];
$doctorSQL = "SELECT * FROM tbuser WHERE user = '$doctor_owner_id'";
$doctorQuery = mysql_db_query($dbname, $doctorSQL) or die (mysql_error());
$doctorData = mysql_fetch_array($doctorQuery);
$doctor_owner = $doctorData['f_user']." ".$doctorData['l_user']." <small>(".$doctorData['user'].")</small>";

# Health
$surgery = $row['surgery'];
$surgery_input = $row['surgery_input'];
$allergic = $row['allergic'];
$allergic_input = $row['allergic_input'];
$alternative = $row['alternative'];
$alternative_input = $row['alternative_input'];
$alcohol = $row['alcohol'];
$alcohol_problem = $row['alcohol_problem'];
$cigarette = $row['cigarette'];
$cigarette_amount = $row['cigarette_amount'];
$cigarette_period = $row['cigarette_period'];

$money_problem = $row['money_problem'];
$hypertansion = $row['hypertansion'];
$diabetes_mellitus = $row['diabetes_mellitus'];
$dyslipidemia = $row['dyslipidemia'];
$stroke = $row['stroke'];
$cad = $row['cad'];
$cancer = $row['cancer'];
$other = $row['other'];

$main = $row['main'];
$problem = $row['problem'];

# visit date
$num_visit = $row['num_visit'];

$last_visit_date = $row['last_visit_date'];
$last_visit = date("d/m/Y", strtotime($last_visit_date));

$next_visit_date = $row['next_visit_date'];
if($next_visit_date == NULL){
    $next_visit = "-";
}else {
    $next_visit = date("d/m/Y", strtotime($next_visit_date));
}

# relating person
$relate_name = $row['relate_name'];
$relate_tel = $row['relate_tel'];
$relate_def = $row['relate_def'];

include 'meaning_patient.php';

?>