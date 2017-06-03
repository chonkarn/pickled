<?php
    $patient_hn = $_GET['hn'];
    $mySQL = "SELECT * FROM calendar_info WHERE calendar_info.patient_hn LIKE '$patient_hn'";
    $myQuery = mysql_db_query($dbname, $mySQL) or die (mysql_error());
    $myrow = mysql_fetch_array($myQuery);
    $calendar_id = $myrow['Id_app'];

    #calendar_info
    $calendarSQL = "SELECT * FROM calendar_info WHERE calendar_info.Id_app LIKE '$calendar_id'";
    $calendarQuery = mysql_db_query($dbname, $calendarSQL) or die (mysql_error());
    $calendarData = mysql_fetch_array($calendarQuery);
    
    $date_visit = $calendarData['dmy'];
    $time_visit = $calendarData['time_calen'];
    $num_visit = $calendarData['num_visit'];
    $visit_status_id = $calendarData['patient_visit_status'];
    $visit_type_id = $calendarData['patient_visit_type'];
    $doctor_owner_id = $calendarData['patient_doctor_owner'];
    
    #patientinfo
    $patientSQL = "SELECT * FROM patientinfo WHERE patient_hn = '$patient_hn'";
    $patientQuery = mysql_db_query($dbname, $patientSQL) or die (mysql_error());
    $patientData = mysql_fetch_array($patientQuery);
    
    $patient_name = $patientData["patient_p_name"]." ".$patientData["patient_name"]." ".$patientData["patient_surname"];
    
    #tbuser
    $doctor_owner_id = $calendarData['patient_doctor_owner'];

    $doctorSQL = "SELECT * FROM tbuser WHERE tbuser.user LIKE '$doctor_owner_id'";
    $doctorQuery = mysql_db_query($dbname, $doctorSQL) or die (mysql_error());
    $doctorData = mysql_fetch_array($doctorQuery);
    
    $doctor_owner = $doctorData['f_user']." ".$doctorData['l_user'];

    #summary
    $sumSQL = "SELECT * FROM summary WHERE patient_hn='$patient_hn' AND calendar_id='$calendar_id' ";
    $sumQuery = mysql_db_query($dbname, $sumSQL) or die (mysql_error());
    $sumData = mysql_fetch_array($sumQuery);

$visit_status = $sumData['visit_status'];
$visit_type = $sumData['visit_type'];
$summary_status = $sumData['summary_status'];
$summary_edit_status = $sumData['summary_edit_status'];
$reason_cancel = $sumData['reason_cancel'];
$reason_visit = $sumData['reason_visit'];
$med = $sumData['med'];
#
$basic_act_dress=$sumData['basic_act_dress'];


$home_risk	 = $sumData['home_risk'];
$home_place = $sumData['home_place'];
$caregiver_burden = $sumData['caregiver_burden'];
$main_caregiver = $sumData['main_caregiver'];
$healthinsure = $sumData['healthinsure'];
$pre_drug = $sumData['pre_drug'];
$pre_drug_text = $sumData['pre_drug_text'];
$non_drug = $sumData['non_drug'];
$non_drug_text = $sumData['non_drug_text'];
$diet_sup = $sumData['diet_sup'];
$diet_sup_text = $sumData['diet_sup_text'];
$med_com = $sumData['med_com'];
$med_com_text = $sumData['med_com_text'];
# manage
$bio_problem = $sumData['bio_problem'];
$bp = $sumData['bp'];
$hr = $sumData['hr'];
$rr = $sumData['rr'];
$oxygen = $sumData['oxygen'];
#
$heart_text = $sumData['heart_text'];
#
$pps = $sumData['pps'];
$gds = $sumData['gds'];
$mini_cog = $sumData['mini_cog'];
$mini_cube = $sumData['mini_cube'];
$mini_clock = $sumData['mini_clock'];
$mini_psycho = $sumData['mini_psycho'];
$mini_other = $sumData['mini_other'];
$summary_plan = $sumData['summary_plan'];
$summary_goal = $sumData['summary_goal'];
$icd10_main = $sumData['icd10_main'];
$icd10_problem = $sumData['icd10_problem'];
$suggestion = $sumData['suggestion'];

//include "meaning.php";

?>