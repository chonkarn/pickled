<?php 
$link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");
    mysqli_query($link,"SET NAMES UTF8");
    mysqli_query($link,"SET character_set_results=utf8");
    mysqli_query($link,"SET character_set_client=utf8");
    mysqli_query($link,"SET character_set_connection=utf8");
$user = $_POST['user_id'];
$newpwd = md5($_POST["newpwd"]);
$insert = "UPDATE tbuser SET passwd= '$newpwd' WHERE user = '$user'";
$query = mysqli_query($link,$insert) or die;
 header( "location: admin_edit.php?myuser=".$user);
?>