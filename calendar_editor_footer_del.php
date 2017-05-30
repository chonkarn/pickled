<?php 
$id_app = $_GET['id_app'];
$del = "DELETE FROM calendar_info WHERE Id_app=$id_app";
$del2 = "DELETE FROM calendar_members_status WHERE Id_app=$id_app";
$link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit") or die("ติดต่อไม่ได้");
mysqli_query($link,$del) or die(mysqli_error()."[".$del."]");
mysqli_query($link,$del2) or die(mysqli_error()."[".$del2."]");
header("location:calendar.php");
?>