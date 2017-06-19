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
if($patient_id == NULL) { $patient_id = "-"; }

$patient_gender = $row['patient_gender'];
if($patient_gender == NULL) { $patient_gender = "-"; }

# Date
date_default_timezone_set("Asia/Bangkok");
$patient_bday = $row['patient_bday'];
$patient_bmonth = $row['patient_bmonth'];
$patient_byear = $row['patient_byear'];
# A.D.
$patient_byear_ad = $patient_byear - 543;
$patient_birthday = $patient_bday."-".$patient_bmonth."-".$patient_byear_ad;
# Age
if ($patient_bday != 0 && $patient_bmonth != 0 && $patient_byear != 0){
  $bday = new DateTime($patient_birthday);
  $today = new DateTime('00:00:00'); // use this for the current date
  $diff = $today->diff($bday);
  $patient_age = $diff->y." ปี ".$diff->m." เดือน ".$diff->d." วัน";
}
else {
  $patient_age = "-";
  $patient_birthday = "-";
}

$patient_status = $row['patient_status'];
if($patient_status == NULL) { $patient_status = "-"; }

$patient_religion = $row['patient_religion'];
if($patient_religion == NULL) { $patient_religion = "-"; }

$patient_occupation = $row['patient_occupation'];
if($patient_occupation == NULL) { $patient_occupation = "-"; }

$patient_education = $row['patient_education'];
if($patient_education == NULL) { $patient_education = "-"; }

# Healthinsure
$insure_id = $row['healthinsure'];
$insureSQL = "SELECT * FROM healthinsure WHERE healthinsure.insure_id LIKE '$insure_id'";
$insureQuery = mysql_db_query($dbname, $insureSQL) or die (mysql_error());
$insureData = mysql_fetch_array($insureQuery);
$insure = $insureData['insure_name']." (".$insureData['insure_id'].")";
if($insure == NULL) { $insure = "-"; }


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
if($add_zip == 0){ $add_zip = ""; }

# Genogram
$genogram = $row['genogram'];

# Tel
$patient_tel_home = $row['patient_tel_home'];
$patient_tel_mobile = $row['patient_tel_mobile'];
$patient_tel_work = $row['patient_tel_work'];

# Doctor
$doctor_owner_id = $row['patient_doctor_owner'];
$doctorSQL = "SELECT * FROM tbuser WHERE user = '$doctor_owner_id'";
$doctorQuery = mysql_db_query($dbname, $doctorSQL) or die (mysql_error());
$doctorData = mysql_fetch_array($doctorQuery);
$patient_doctor_owner = $doctorData['f_user']." ".$doctorData['l_user']." <small>(".$doctorData['user'].")</small>";

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
$cancer_input = $row['cancer_input'];
$other = $row['other'];
$other_input = $row['other_input'];

$main = $row['main'];
$problem = $row['problem'];

# visit date
$num_visit = $row['num_visit'];

$last_visit_date = $row['last_visit_date'];
if($last_visit_date == NULL){
    $last_visit = "-";
}else {
    $last_visit = date("d/m/Y", strtotime($last_visit_date));
}

$next_visit_date = $row['next_visit_date'];
if($next_visit_date == NULL){
    $next_visit = "-";
}else {
    $next_visit = date("d/m/Y", strtotime($next_visit_date));
}

# relating person
$relate_name = $row['relate_name'];
if($relate_name == NULL) { $relate_name = "-"; }
$relate_tel = $row['relate_tel'];
if($relate_tel == NULL) { $relate_tel = "-"; }
$relate_def = $row['relate_def'];
if($relate_def == NULL) { $relate_def = "-"; }

?>
