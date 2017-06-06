<?php 
$link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");
    mysqli_query($link,"SET NAMES UTF8");
    mysqli_query($link,"SET character_set_results=utf8");
    mysqli_query($link,"SET character_set_client=utf8");
    mysqli_query($link,"SET character_set_connection=utf8");
$user = $_POST['user_id'];
$lname = $_POST["user_lname"];
$name =  $_POST["user_name"];
$position = $_POST["position_id"];

if (isset($_POST["chief"])){
    $chief = 1;
    $chief_month = $_POST["chief_month"];
    $chief_year =  $_POST["chief_year"];
}
else {$chief = 0;
     $chief_month = 0;
    $chief_year =  "0000";
     }
//echo $lname;
$sentence = "UPDATE tbuser SET";
$sentence = $sentence." f_user='$name' ,l_user='$lname' ,chief='$chief',chief_month='$chief_month',chief_year='$chief_year',id_position='$position'";
$sentence = $sentence." WHERE user='$user'";
$query = mysqli_query($link,$sentence) or die;
 header( "location: admin_edit.php?myuser=".$user);
//echo $name;
?>