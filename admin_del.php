<?php 
$id = $_GET['myuser'];
    $link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");
    mysqli_query($link,"SET NAMES UTF8");
    mysqli_query($link,"SET character_set_results=utf8");
    mysqli_query($link,"SET character_set_client=utf8");
    mysqli_query($link,"SET character_set_connection=utf8");
    
$del = "DELETE from tbuser WHERE user= '$id'";
$show = mysqli_query($link,$del) or die;
header("location:admin.php");
?>