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
if ($_POST['new_pwd'] === $_POST['new_pwd_re']){
    $new_pwd = md5($_POST['new_pwd']);


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "homevisit";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "UPDATE tbuser SET passwd = '$new_pwd' WHERE user = '$user'";
    if ($conn->query($sql) === TRUE) {
        header("location:login.php");;
    } else {
        echo "Error updating record: " . $conn->error;
    }
      
}
else {
//    echo "♥";
    header("location:forget_pwd_step2_question_wrong.php?username=".$user."&question=".$question);
}

?>