<?php
$hn = $_GET['hn'];
$type = $_GET['type'];
//tab 2
    if(isset($_POST['surgery'])) $surgery = $_POST['surgery_input'];
        else $surgery =0;
    if(isset($_POST['allergic'])) $allergic =0;
        else $allergic = $_POST['allgeric_input'];
    if(isset($_POST['alternative'])) $alternative = $_POST['alternative_input'];
        else $alternative =0;
    if(isset($_POST['alcohol'])){
        $alcohol = $_POST['alcohol'];
        if ($alcohol ==1) {
            $alcohol = "NO";
            $alcoholproblem = 0;
        } 
        else if ($alcohol ==2) {
          $alcohol = "NOW";
          if (isset($_POST['alcohol_input'])) $alcoholproblem = 0;
            else $alcoholproblem = 1;
        } 
        else {
            $alcohol = "USED";
            if (isset($_POST['alcohol_input'])) $alcoholproblem = 0;
            else $alcoholproblem = 1;
        } 
    }
    if(isset($_POST['cigarette'])){
        $cigarette = $_POST['cigarette'];
        if ($cigarette ==1) {
            $cigarette = "NO";
            $cigarette_amout = 0;
            $cigarette_period = 0;
        } 
        else if ($cigarette ==2) {
            $cigarette = "NOW";
            $cigarette_amout = $_POST['cigarette_amout'];
            $cigarette_period = $_POST['cigarette_period'];
        }
        else{
            $cigarette = "USED";
            $cigarette_amout = $_POST['cigarette_amout'];
            $cigarette_period = $_POST['cigarette_period'];
        }
    }
    if(isset($_POST['money'])) $money_status = 1;
                                    else $money_status = 0;
    if(isset($_POST['hypertansion'])) $hypertansion = 1; 
                                    else $hypertansion =0;
    if(isset($_POST['diabetes_mellitus'])) $diabetes_mellitus = 1;
                                    else $diabetes_mellitus =0;
    if(isset($_POST['dyslipidemia'])) $dyslipidemia = 1; 
                                    else $dyslipidemia = 0;
    if(isset($_POST['stroke'])) $stroke = 1; 
                                    else $stroke =0;
    if(isset($_POST['cad'])) $cad = 1; 
                                    else $cad=0;
    if(isset($_POST['cancer'])) $cancer = $_POST['cancer_input']; 
                                    else $cancer=0;
    if(isset($_POST['other'])) $other = $_POST['other_input']; 
                                    else $cancer=0;
$dbhost = 'localhost';
$dbuser = 'hvmsdb';
$dbpass = '1234';
$dbname = 'homevisit';
mysql_connect($dbhost,$dbuser,$dbpass) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$sql20="UPDATE patientinfo SET ";
    
    
$tab2 = "surgery='$surgery',allergic='$allergic',alternative='$alternative',alcohol='$alcohol',alcohol_input='$alcohol_input',cigarette='$cigarette',cigarette_amout='$cigarette_amout',cigarette_period='$cigarette_period',money='$money',hypertansion='$hypertansion',diabetes_mellitus='$diabetes_mellitus',dyslipidemia='$dyslipidemia',stroke='$stroke',cad='$cad',cancer='$cancer',other='$other'";
$sql20=$sql20.$tab2." WHERE patient_hn = '$hn' ";
mysql_db_query($dbname,$sql20) or die (mysql_error());
//session_unset();
//session_destroy(); 
mysql_close();

 header( "location: patient_step3.php?hn=".$hn."&type=".$type);
 exit(0);

?>