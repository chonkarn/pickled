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
    
    $hn = $_GET["hn"];
    $type = $_GET["type"];
?>

    <head>
        <?php include "head.html"; ?>
        <link rel="stylesheet" href="css/stepper.css">
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html" ?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">
                    
                    <div id="demo"></div>

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="summary.php" class="uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i> สรุปเยี่ยมบ้าน</a></li>
                        <li>เพิ่มสรุปเยี่ยมบ้าน</li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">

                        <form action="<?php echo "patient_save.php?hn=".$hn; ?>" method="post">
                            <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                                <ul class="uk-subnav uk-subnav-pill stepper" uk-switcher>
                                    <li id="step1" class="step three active"><a href="#" title="ข้อมูลทั่วไป" uk-tooltip>1</a></li>
                                    <li id="step2" class="step three"><a href="#" title="รายละเอียดของปัญหา" uk-tooltip>2</a></li>
                                    <li id="step3" class="step three"><a href="#" title="สรุปข้อมูลปัญหา" uk-tooltip>3</a></li>
                                </ul>
                                <ul class="uk-switcher">
                                    <li>
                                        <div class="uk-alert-success" uk-alert>
                                            <a class="uk-alert-close" uk-close></a>
                                            <p>กรอกข้อมูลครบถ้วน</p>
                                        </div>
                                        <?php include 'patient_step1.php' ?>
                                        <div class="uk-align-right">
                                            <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next" id="next-btn1">ถัดไป <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-alert-danger" uk-alert>
                                            <a class="uk-alert-close" uk-close></a>
                                            <p>กรอกข้อมูลไม่ครบถ้วน</p>
                                        </div>
                                        <?php include 'patient_step2.php' ?>
                                        <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous" id="prev-btn2"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                        <div class="uk-align-right">
                                            <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next" id="next-btn2">ถัดไป <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <?php include 'patient_step3.php' ?>
                                        <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous" id="prev-btn3"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                        <div class="uk-align-right">
                                            <button type="submit" class="uk-button uk-button-default button-green">บันทึก</button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.demo-content-->
            </main>
        </div>

        <!--custom js-->
        <script src="js/dropdown.js"></script>
        <script src="js/stepper.js"></script>

    </body>

</html>
