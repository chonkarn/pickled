<?php 
$test = explode(" ",$_POST["search_patient"]);
//echo $test[0];
header("location:patient_profile.php?hn=".$test[0]);
?>