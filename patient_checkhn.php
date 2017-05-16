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
?>

    <head>
        <?php include "head.html"; ?>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html" ?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="patient.php" class="uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i> ผู้ป่วยเยี่ยมบ้าน</a></li>
                        <li>เพิ่มผู้ป่วยใหม่</li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <form class="uk-form-horizontal" action="<?php echo " patient_form.php?hn=".$patient_hn; ?>" method="post">
                                <h4 class="uk-heading-divider">ตรวจสอบเลขที่โรงพยาบาล</h4>
                                <div class="uk-margin">
                                    <label class="uk-form-label">เลขที่โรงพยาบาล</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <input class="uk-input uk-width-medium uk-form-small" type="number" placeholder="กรอกตัวเลข 7 หลัก" name="hn">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">สถานะเยี่ยมบ้าน</label>
                                    <div class="uk-form-controls uk-form-controls-text">ใหม่</div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">ประเภทการเยี่ยมบ้าน
                                </label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="type" checked value="1"> Home visit care</label>
                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="type" value="2"> Geriatric case</label>
                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="type" value="3"> Palliative case</label>
                                    </div>
                                </div>
                                <div class="uk-text-right">
                                    <button type="submit" class="uk-button uk-button-default button-green">เริ่มกรอกข้อมูล</button>
                                </div>
                            </form>
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
