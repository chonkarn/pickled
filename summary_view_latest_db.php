<?php
    $patient_hn = $_GET['hn'];
    $mySQL = "SELECT MAX(Id_app) AS x FROM calendar_info WHERE calendar_info.patient_hn LIKE '$patient_hn'";
    $myQuery = mysql_db_query($dbname, $mySQL) or die (mysql_error());
    $myrow = mysql_fetch_array($myQuery);
    $calendar_id = $myrow['x'];

    #calendar_info
    $calendarSQL = "SELECT * FROM calendar_info WHERE calendar_info.Id_app LIKE '$calendar_id'";
    $calendarQuery = mysql_db_query($dbname, $calendarSQL) or die (mysql_error());
    $calendarData = mysql_fetch_array($calendarQuery);
    
    $date_visit = $calendarData['dmy'];
    $date_visit_day = date_format(date_create($date_visit), "d");
    $date_visit_month = date_format(date_create($date_visit), "m");
    $date_visit_year = date_format(date_create($date_visit), "Y") + 543;
    include "meaning_summary.php";
    $date_visit = $date_visit_day." ".$date_visit_month." ".$date_visit_year;

    $time_visit = $calendarData['time_calen'];
    $num_visit = $calendarData['num_visit'];
    
    $visit_status = $calendarData['patient_visit_status'];
    $visit_type = $calendarData['patient_visit_type'];
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

# Basic activity
$basic_act = $sumData['basic_act'];
$basic_act_dress = $sumData['basic_act_dress'];
$basic_act_eat = $sumData['basic_act_eat'];
$basic_act_ambu = $sumData['basic_act_ambu'];
$basic_act_toilet = $sumData['basic_act_toilet'];
$basic_act_hygine = $sumData['basic_act_hygine'];

# Instrument activity
$instru_act = $sumData['instru_act'];
$instru_act_shop = $sumData['instru_act_shop'];
$instru_act_house = $sumData['instru_act_house'];
$instru_act_med = $sumData['instru_act_med'];
$instru_act_fin = $sumData['instru_act_fin'];
$instru_act_tech = $sumData['instru_act_tech'];

# Nutrition
$nutrition_status = $sumData['nutrition_status'];

# Home
$home_risk	 = $sumData['home_risk'];
$home_place = $sumData['home_place'];
$caregiver_burden = $sumData['caregiver_burden'];
$main_caregiver = $sumData['main_caregiver'];
$healthinsure = $sumData['healthinsure'];

# Medication
$pre_drug = $sumData['pre_drug'];
$pre_drug_text = $sumData['pre_drug_text'];
$non_drug = $sumData['non_drug'];
$non_drug_text = $sumData['non_drug_text'];
$diet_sup = $sumData['diet_sup'];
$diet_sup_text = $sumData['diet_sup_text'];
$med_com = $sumData['med_com'];
$med_com_text = $sumData['med_com_text'];

$bio_problem = $sumData['bio_problem'];
$bp1 = $sumData['bp1'];
$bp2 = $sumData['bp2'];
$hr = $sumData['hr'];
$rr = $sumData['rr'];
$oxygen = $sumData['oxygen'];

$heent= $sumData['heent'];
$heent_text = $sumData['heent_text'];
$heart = $sumData['heart'];
$heart_text = $sumData['heart_text'];
$lungs = $sumData['lungs'];
$lungs_text = $sumData['lungs_text'];
$abdomen = $sumData['abdomen'];
$abdomen_text = $sumData['abdomen_text'];
$extremities = $sumData['extremities'];
$extremities_text = $sumData['extremities_text'];
$neuro = $sumData['neuro'];
$neuro_text = $sumData['neuro_text'];

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

# Management
$manage_assess = $sumData['manage_assess'];
$manage_assess_text = $sumData['manage_assess_text'];
$manage_pain = $sumData['manage_pain'];
$manage_pain_text = $sumData['manage_pain_text'];
$manage_med = $sumData['manage_med'];
$manage_med_text = $sumData['manage_med_text'];
$manage_procedure = $sumData['manage_procedure'];
$manage_procedure_text = $sumData['manage_procedure_text'];
$manage_fammeet = $sumData['manage_fammeet'];
$manage_fammeet_text = $sumData['manage_fammeet_text'];
$manage_social = $sumData['manage_social'];
$manage_social_text = $sumData['manage_social_text'];
$manage_psycho = $sumData['manage_psycho'];
$manage_psycho_text = $sumData['manage_psycho_text'];
$manage_rehab = $sumData['manage_rehab'];
$manage_rehab_text = $sumData['manage_rehab_text'];
$manage_choice = $sumData['manage_choice'];
$manage_choice_text = $sumData['manage_choice_text'];
$manage_dying = $sumData['manage_dying'];
$manage_dying_text = $sumData['manage_dying_text'];
$manage_other = $sumData['manage_other'];
$manage_other_text = $sumData['manage_other_text'];

$suggestion = $sumData['suggestion'];

?>