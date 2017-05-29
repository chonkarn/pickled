<?php

include 'dbname.php';
    mysql_connect($servername, $username, $password) or die(mysql_error());
    $db_found = mysql_select_db($dbname) or die(mysql_error());
    mysql_query("set character set utf8"); 

    $username = $_POST['user'];
$password = $username;
$f_user = $_POST['f_user'];
$l_user = $_POST['l_user'];
$id_position = $_POST['id_position'];

    



 # update data
     $conn = new mysqli($servername, $username, $password, $dbname);
    
     $sumSQL = "INSERT INTO tbuser SET user = '$username',
        f_user = '$f_user',
        l_user = '$l_user',
        passwd = '$password',
        id_position= '$id_position'";
    
     $conn->query($sumSQL);
    
    mysql_db_query($dbname, $sumSQL) or die (mysql_error());
    mysql_close();
    
    header("location: admin.php");

?>