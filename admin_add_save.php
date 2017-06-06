<?php

include 'dbname.php';
    mysql_connect($servername, $username, $password) or die(mysql_error());
    $db_found = mysql_select_db($dbname) or die(mysql_error());
    mysql_query("set character set utf8"); 

    $username = $_POST['user'];
$password = md5($username);
$f_user = $_POST['f_user'];
$l_user = $_POST['l_user'];
$id_position = $_POST['id_position'];
if (isset($_POST['chief'])) {
    $chief = 1;
    $chief_month = $_POST['chief_month'];
    $chief_year = $_POST['chief_year'];
}
else {
    $chief = 0;
    $chief_month = 0;
    $chief_year = "0000";
}
    



 # update data
     $conn = new mysqli($servername, $username, $password, $dbname);
    
     $sumSQL = "INSERT INTO tbuser SET user = '$username',
        f_user = '$f_user',
        l_user = '$l_user',
        passwd = '$password',
        id_position= '$id_position',
        chief = '$chief',
        chief_month = '$chief_month',
        chief_year = '$chief_year'";
    
     $conn->query($sumSQL);
    
    mysql_db_query($dbname, $sumSQL) or die (mysql_error());
    mysql_close();
    
    header("location: admin.php");

?>