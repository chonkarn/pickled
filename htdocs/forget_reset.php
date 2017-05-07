<?php
include "db_head.php";
$username = $_GET['username'];
$dbquery = "SELECT * FROM tbuser WHERE user=".$username.";";
$objQuery = mysql_query($dbquery);
$objResult = mysql_fetch_array($objQuery);
$answer = $objResult["answer"];
$user = $objResult["user"];
$question = $objResult["question"];
//echo $answer."♥";
if ($_POST['answer'] === $answer){
    header("location:forget_pwd_step3_reset.php?username=".$user);
}
else {
    header("location:forget_pwd_step2_question_wrong.php?username=".$user."&question=".$question);
}

?>