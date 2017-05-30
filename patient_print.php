<!DOCTYPE html>
<html>
<?php
//	session_start();
//	if($_SESSION['id'] == "")
//	{
//		header( "location:login.php");
//		exit();
//	}
    
    $patient_hn = $_GET['hn'];
    
    include "patient_show.php";
?>

    <head>
        <?php include "head.html"; ?>
    </head>

    <body>
        <main class="mdl-layout__content mdl-color--white">
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
                        <?php include 'patient_view.php' ?>
                    </div>
                </div>
                <!--/.mdl-card-->
            </div>
        </main>
        <script>
            window.print();
        </script>
    </body>

</html>