<?php
session_start();
$goback = $_POST["previous"];
//echo $goback;
$answer = $_POST["reason"];
$cal_self = $_SESSION['id'];
$cal_id = $_POST["sum_id"];
$insert = "UPDATE calendar_members_status SET members_status ='$answer'";
$whereclause = " WHERE Id_app='$cal_id' AND Id_members ='$cal_self'";
$insert = $insert.$whereclause;
$link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit") or die("ติดต่อไม่ได้เว้ย");
 mysqli_query($link,"SET NAMES UTF8");
    mysqli_query($link,"SET character_set_results=utf8");
    mysqli_query($link,"SET character_set_client=utf8");
    mysqli_query($link,"SET character_set_connection=utf8");
    $r = mysqli_query($link,$insert) or die(mysqli_error()."[".$insert."]");
    header("location:calendar.php");
?>