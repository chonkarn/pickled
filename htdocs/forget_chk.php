<?php
include "db_head.php";

$dbquery = "SELECT * FROM tbuser WHERE user='".mysql_real_escape_string($_POST['username'])."'";

$objQuery = mysql_query($dbquery);
$objResult = mysql_fetch_array($objQuery);
$question = $objResult["question"];
$username = $objResult["user"];
if(!$objResult)
	{
	    header("location:forget_pwd_step1_usr_notfound.html");
	}
	else {
//        patient_show.php?hn=".$hn
        header("location:forget_pwd_step2_question.php?question=".$question."&username=".$username);
    }
	mysql_close(); 



?>

