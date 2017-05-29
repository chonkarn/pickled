<?php

    #calendar_info
    $calendarSQL = "SELECT * FROM calendar_info
        WHERE calendar_info.Id_app LIKE '$calendar_id'";
    $calendarQuery = mysql_db_query($dbname, $calendarSQL) or die (mysql_error());
    $calendarData = mysql_fetch_array($calendarQuery);
    $date_visit = $calendarData['dmy'];
    $time_visit = $calendarData['time_calen'];
    $num_visit = $calendarData['num_visit'];
    $visit_status = $calendarData['patient_visit_status'];
    $visit_type = $calendarData['patient_visit_type'];
    $doctor_owner_id = $calendarData['patient_doctor_owner'];
    
    #patientinfo
    $patientSQL = "SELECT * FROM patientinfo
        WHERE patient_hn = '$patient_hn'";
    $patientQuery = mysql_db_query($dbname, $patientSQL) or die (mysql_error());
    $patientData = mysql_fetch_array($patientQuery);
    $patient_name = $patientData["patient_pname"]." ".$patientData["patient_fname"]." ".$patientData["patient_lname"];
    
    #tbuser
    $doctor_owner_id = $calendarData['patient_doctor_owner'];
    $doctorSQL = "SELECT * FROM tbuser
        WHERE tbuser.user LIKE '$doctor_owner_id'";
    $doctorQuery = mysql_db_query($dbname, $doctorSQL) or die (mysql_error());
    $doctorData = mysql_fetch_array($doctorQuery);
    $doctor_owner = $doctorData['f_user']." ".$doctorData['l_user'];



#meaning
switch($visit_status){
    case 1: $visit_status = 'ใหม่'; break;
    case 2: $visit_status = 'เยี่ยมต่อ'; break;
    case 3: $visit_status = 'ปิดเยี่ยมบ้าน'; break;
}

switch($visit_type){
    case 1: $visit_type = 'Home visit care'; break;
    case 2: $visit_type = 'Geriatric case'; break;
    case 3: $visit_type = 'Palliative case'; break;
}
switch($time_visit){
    case 1: $time_visit = 'ภาคเช้า (9.00-12.00 น)'; break;
    case 2: $time_visit = 'ภาคบ่าย (13.00-16.00 น)'; break; 
}
?>