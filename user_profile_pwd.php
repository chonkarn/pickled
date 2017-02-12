<?php

session_start();
include "db_head.php";
$user = $_SESSION['id'];


    $newpwd = $_POST["newpwd"];
    $question = $_POST["question"];
    $answer = $_POST["answer"];


    if ($newpwd === $_POST["newpwd2"]){
      
    $servername = "localhost";
    $username = "hvmsdb";
    $password = "1234";
    $dbname = "homevisit";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $newpwd = md5($newpwd);
    $sql = "UPDATE tbuser SET  passwd = '$newpwd',question = '$question',answer = '$answer' WHERE user = '$user';";
    $conn->set_charset("utf8");   
    if ($conn->query($sql) === TRUE) {
        header("location:user_profile.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
    }
else {

    header("location:user_profile_false.php");
     }
    
      

?>