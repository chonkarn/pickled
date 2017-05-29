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
    $calendar_id = $_GET['calendar_id'];
    
    //INNER JOIN summary ON summary.calendar_id = calendar_info.Id_app
    //INNER JOIN patientinfo ON patientinfo.patient_hn = calendar_info.patient_hn
    
    #calendar_info
    $calendarSQL = "SELECT * FROM calendar_info
        WHERE calendar_info.Id_app LIKE '$calendar_id'";
    $calendarQuery = mysql_db_query($dbname, $calendarSQL) or die (mysql_error());
    $calendarData = mysql_fetch_array($calendarQuery);
    $date_visit = $calendarData['dmy'];
    $time_visit_id = $calendarData['time_calen'];
    $num_visit = $calendarData['num_visit'];
    $visit_status_id = $calendarData['patient_visit_status'];
    $visit_type_id = $calendarData['patient_visit_type'];
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

    # meaning
    $meaningSQL = "SELECT * FROM tbmeaning
        WHERE name = 'visit_status' OR name = 'visit_type' OR name='time'";
    $meaningQuery = mysql_db_query($dbname, $meaningSQL) or die (mysql_error());
    while ($meaningData = mysql_fetch_assoc($meaningQuery)){
        switch($meaningData['name']){
            case 'visit_status': $visit_status = $meaningData['meaning']; break;
            case 'visit_type':$visit_type = $meaningData['meaning']; break;
            case 'time': $time_visit = $meaningData['meaning']; break;
        }
    }
    
?>