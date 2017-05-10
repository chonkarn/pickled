<?php
session_start();
include "db_head.php";

$pwd = $_POST["pwd"];
$md = md5($pwd);

$strSQL = "SELECT * FROM tbuser WHERE user = '".mysql_real_escape_string($_POST['username'])."' and passwd = '$md'";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$_SESSION["id"] = $objResult["user"];
$_SESSION["name"] = $objResult["f_user"];
$_SESSION["surname"] = $objResult["l_user"];
$_SESSION["position"] = $objResult["id_position"];

if(!$objResult)
{
    header("location:login_false.php");
}
else {
    if($_SESSION["position"] == 0) {
        header("location:admin.php");
    }
    else {
        header("location:index.php");
    }   
}
mysql_close(); 
?>