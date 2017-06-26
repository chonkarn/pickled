<!DOCTYPE html>
<html>

<?php
    session_start();
	if($_SESSION['id'] == "") {
		header( "location:login.php");
		exit();
	}
    include 'dbname.php';
    mysql_connect($servername, $username, $password) or die(mysql_error());
    mysql_select_db($dbname) or die(mysql_error());
    mysql_query("set character set utf8");

    $patient_hn = $_GET['hn'];
    $calendar_id = $_GET['calendar_id'];

    include "summary_view_db.php";
    include "meaning_summary.php";
?>

<head>
    <?php
        include "head.html";
    ?>
    <link rel="stylesheet" href="css/stepper.css">
</head>

<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

        <?php include "header.html"?>

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">

                <ul class="uk-breadcrumb breadcrumb">
                    <li><a href="summary.php" class="uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i> สรุปเยี่ยมบ้าน</a></li>
                    <li>ดูสรุปเยี่ยมบ้าน</li>
                </ul>

                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__menu">
                        <a href="<?php echo "summary_print.php?hn=".$patient_hn."&calendar_id=".$_GET['calendar_id']; ?>" target="_blank" class="mdl-button mdl-button--icon mdl-button--colored" title="พิมพ์สรุปเยี่ยมบ้านนี้" uk-tooltip>
                            <i class="material-icons">print</i>
                        </a>
                        <a href="<?php echo "summary_form.php?hn=".$patient_hn."&calendar_id=".$_GET['calendar_id']; ?>" class="mdl-button mdl-button--icon mdl-button--colored" title="แก้ไขสรุปเยี่ยมบ้านนี้" uk-tooltip>
                            <i class="material-icons">edit</i>
                        </a>
                    </div>

                    <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-color-text--black">
                        <?php include "summary_viewdata.php"; ?>
                    </div>
                  </div>
                </div>
        </main>
    </div>
</body>
<script src="js/radio.js"></script>
<script src="js/checkbox.js"></script>

</html>
