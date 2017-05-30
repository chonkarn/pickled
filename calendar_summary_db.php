<?php
$goback = $_POST["previous"];
//echo $goback;
$answer = $_POST["sumreason"];
$sum_hn = $_POST["sum_hn"];
$sum_id = $_POST["sum_id"];
$sum_cancel = $_POST["reason_cancel"];
if ($sum_cancel == null) $sum_cancel = "";
$insert = "UPDATE calendar_info SET sum_chk ='$answer'";
$cancel = " ,comment='$sum_cancel'";
$whereclause = " WHERE Id_app='$sum_id'";
$link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit") or die("ติดต่อไม่ได้เว้ย");
 mysqli_query($link,"SET NAMES UTF8");
    mysqli_query($link,"SET character_set_results=utf8");
    mysqli_query($link,"SET character_set_client=utf8");
    mysqli_query($link,"SET character_set_connection=utf8");
if ($answer == 1) {
    $insert = $insert.$whereclause;
//    mysql_db_query($dbname,$sql20) or die (mysql_error());
    $r = mysqli_query($link,$insert) or die(mysqli_error()."[".$insert."]");
    header("location:".$goback."?Message=".$answer."&sum_id=".$sum_id."&sum_hn=".$sum_hn);
}
else {
    $insert = $insert.$cancel.$whereclause;
//    echo $insert;
    $r = mysqli_query($link,$insert) or die(mysqli_error()."[".$insert."]");
    header("location:calendar.php");
}
 
?>