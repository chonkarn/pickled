<?php
$hn = $_GET['hn'];
$type = $_GET['type'];
//tab3
//main
$main = $_POST['main'];

// problem
    $count = 2;
    $problembase = "problem";
    $problemplus = $_POST[$problembase];
    $problem = explode (" ", $problemplus);
    $a = "problem".$count ;
    $b = $_POST[$a];
    while (!empty($b)){
        
        
        $d = explode (" ", $b);
        if ($count==2){
        $test = $problem[0].",".$d[0];
        }
        else {
            $test = $test.",".$d[0];
        }
        $count = $count+1 ;
        $a = "problem".$count ;
        $b = $_POST[$a];
    }

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

$sql20="UPDATE patientinfo SET ";

$tab3 = "main='$main',problem='$test'";

$sql20=$sql20.$tab3." WHERE patient_hn = '$hn' ";
mysql_db_query($dbname,$sql20) or die (mysql_error());
//session_unset();
//session_destroy(); 
mysql_close();

 header( "location: patient_show.php?hn=".$hn."&type=".$type);
 exit(0);

?>