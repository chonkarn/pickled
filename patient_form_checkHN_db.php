<?php 
$dbhost="localhost";
$dbname="homevisit";
$dbuser="root";
$dbpass="";

mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
$hn = $_POST["hn"];
$type = $_POST["type"];
mysql_connect($dbhost,$dbuser,$dbpass) or die("ติดต่อฐานข้อมูลไม่ได้");
$db_found = mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

if ($db_found) {
    
    $condtition = "SELECT * FROM patientinfo WHERE patient_hn = '".mysql_real_escape_string($_POST['hn'])."' ";
    $condition_query = mysql_db_query($dbname,$condtition) or die (mysql_error());
    $conditiion_value = mysql_fetch_array($condition_query);
    if ($conditiion_value["patient_hn"]==$hn){
//        include 'patient_add_existhn.php';

    }
    else {
        $add_hn="INSERT INTO patientinfo SET ";
        $add_hn=$add_hn."patient_hn='$hn',patient_visit_type='$type'";
        mysql_db_query($dbname,$add_hn) or die (mysql_error());
        mysql_close();
        header( "location: patient_step1.php?hn=".$hn."&type=".$type );
    }
    
}
?>