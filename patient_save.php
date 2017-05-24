<!DOCTYPE html>
<html>

<?php
	session_start();
	if($_SESSION['id'] == "")
	{
		header( "location:login.php");
		exit();
	}
    include 'dbname.php';
    mysql_connect($servername, $username, $password) or die(mysql_error());
    mysql_select_db($dbname) or die(mysql_error());
    mysql_query("set character set utf8"); 
    
    $patient_hn = $_GET['hn'];
    $hnSQL = "SELECT * FROM patientinfo 
    INNER JOIN summary ON summary.patient_hn = patientinfo.patient_hn
    INNER JOIN tbuser ON patientinfo.patient_doctor_owner = tbuser.user
    WHERE patientinfo.patient_hn LIKE '$patient_hn'";

    $result = mysql_db_query($dbname, $hnSQL) or die (mysql_error());
    $row = mysql_fetch_array($result); 
    
    $patient_name = $row["patient_p_name"]." ".$row["patient_name"]." ".$row["patient_surname"];
    $num_visit = $row["num_visit"];
    $visit_date = $row["last_visit"];
    
    #update data
    $conn = new mysqli($servername, $username, $password, $dbname);
    $visit_status = $_POST['visit_status'];
    $sumSQL = "UPDATE summary SET visit_status = '$visit_status'
    WHERE patient_hn = '$patient_hn'";
    $conn->query($sumSQL);
    
    #header("location: patient.php");
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>

        <!--jQuery-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!--mdl-->
        <link rel="stylesheet" href="lib/mdl/material.min.css">
        <link rel="stylesheet" href="lib/mdl-template-dashboard/styles.css">
        <script src="lib/mdl/material.min.js"></script>

        <!--semantic-ui-->
        <link rel="stylesheet" href="lib/semantic-ui/dist/semantic.min.css">
        <script src="lib/semantic-ui/dist/semantic.min.js"></script>

        <!--uikit-->
        <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">
        <script src="lib/uikit/js/uikit.min.js"></script>
        <script src="lib/uikit/js/uikit-icons.min.js"></script>

        <!--icon-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!--custom css-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font.css">
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html"?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="summary.php" class="uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i> สรุปเยี่ยมบ้าน</a></li>
                        <li>เพิ่มสรุปเยี่ยมบ้าน</li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <div class="uk-text-center">
                                <h4>กรุณารอสักครู่</h4>
                                <div class="mdl-spinner mdl-js-spinner is-active"></div>
                                <p>กำลังบันทึกข้อมูลของ</p>
                                <span class="text-green"><?php echo $patient_name." (HN ".$patient_hn.")"; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.demo-content-->
            </main>
        </div>

        <!--custom js-->
        <script src="js/select.js"></script>
        <script src="js/stepper.js"></script>

    </body>

</html>