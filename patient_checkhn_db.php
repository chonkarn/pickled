<?php 
    include 'dbname.php';
    mysql_connect($servername, $username, $password) or die(mysql_error());
    $db_found = mysql_select_db($dbname) or die(mysql_error());
    mysql_query("set character set utf8"); 

    $hn = $_POST["hn"];
    $type = $_POST["type"];

    if ($db_found) {
        $condtition = "SELECT * FROM patientinfo WHERE patient_hn = '".mysql_real_escape_string($_POST['hn'])."' ";
        $condition_query = mysql_db_query($dbname,$condtition) or die (mysql_error());
        $conditiion_value = mysql_fetch_array($condition_query);
        if ($conditiion_value["patient_hn"]==$hn){
            // include 'patient_add_existhn.php';
            header("location: patient_form.php?hn=".$hn."&type=".$type);
        }
        else {
            $add_hn="INSERT INTO patientinfo SET ";
            $add_hn=$add_hn."patient_hn='$hn',patient_visit_type='$type',patient_visit_status='1'";
            mysql_db_query($dbname,$add_hn) or die (mysql_error());
            mysql_close();
            header("location: patient_form.php?hn=".$hn);
        }
    }
?>
