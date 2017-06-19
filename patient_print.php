<!DOCTYPE html>
<html>

<?php

    session_start();
    if($_SESSION['id'] == "")
    {
        header( "location:login.php");
        exit();
    }
    $user = $_SESSION['id'];
    include 'dbname.php';
    $connect = mysql_connect($servername, $username, $password) or die(mysql_error());
    mysql_select_db($dbname) or die(mysql_error());
    mysql_query("set character set utf8");

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_query($conn, "SET NAMES UTF8");

    $patient_hn = $_GET['hn'];
    include "patient_viewdata_db.php";
    include 'meaning_patient.php';
?>

    <head>
        <?php include "head.html"; ?>
    </head>

    <body>
      <div class="mdl-grid mdl-typography--subhead">
          <div><img class="logo-report" src="img/logo-report.jpg"><br>FAM-MED</div>
          <div>
              แบบบันทึกสุขภาพผู้ป่วยและครอบครัว
              <br> ภาควิชาเวชศาสตร์ครอบครัว คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี<br>
              Faculty of Medicine Ramathibodi Hospital, Mahidol University
          </div>
      </div>
        <?php include 'patient_viewdata.php' ?>

        <!-- <main class="mdl-layout__content mdl-color--white">
            <div class="mdl-grid demo-content">
                <div class="demo-updates mdl-card mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__supporting-text mdl-color-text--grey-900 mdl-cell--12-col">
                        <div class="mdl-grid mdl-typography--subhead">
                            <div><img class="logo-report" src="img/logo-report.jpg">
                                <p class="mdl-typography--body-2">FAM-MED</p>
                            </div>

                            <div>
                                แบบบันทึกสุขภาพผู้ป่วยและครอบครัว
                                <br> ภาควิชาเวชศาสตร์ครอบครัว คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี
                                <p class="mdl-typography--title">Department of Family Medicine</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main> -->
    </body>
    <!-- <script>
        window.print();
    </script> -->
</html>
