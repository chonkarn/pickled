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
    
    # GET
    $patient_hn = $_GET['hn'];
    $calendar_id = $_GET['calendar_id'];
    
    # POST
    if(isset($_POST['summary_status'])){
        $summary_status = $_POST['summary_status'];
    }
    $reason_cancel = $_POST['reason_cancel'];
    $reason_visit = $_POST['reason_visit'];
    // med
    $basic_act = $_POST['basic_act'];
    $basic_act_dress = $_POST['basic_act_dress'];
    $basic_act_eat = $_POST['basic_act_eat'];
    $basic_act_ambu = $_POST['basic_act_ambu'];
    $basic_act_toilet = $_POST['basic_act_toilet'];
    $basic_act_hygine = $_POST['basic_act_hygine'];
    $instru_act = $_POST['instru_act'];
    $instru_act_shop = $_POST['instru_act_shop'];
    $instru_act_house = $_POST['instru_act_house'];
    $instru_act_med = $_POST['instru_act_med'];
    $instru_act_fin = $_POST['instru_act_fin'];
    $instru_act_tech = $_POST['instru_act_tech'];
    $nutrition_status = $_POST['nutrition_status'];
    $home_risk = $_POST['home_risk'];
    $home_place = $_POST['home_place'];
    $caregiver_burden = $_POST['caregiver_burden'];
    $main_caregiver = $_POST['main_caregiver'];
    $healthinsure = $_POST['healthinsure'];
    
    #update data
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sumSQL = "UPDATE summary SET summary_edit_status = '2',
        summary_status = '$summary_status',
        reason_cancel = '$reason_cancel',
        reason_visit = '$reason_visit',
        basic_act_problem = '$basic_act_problem',
        instru_act = '$instru_act',
        instru_act_problem = '$instru_act_problem'
        nutrition_status = '$nutrition_status',
        home_risk = '$home_risk',
        home_place = '$home_place',
        caregiver_burden = '$caregiver_burden',
        main_caregiver = '$main_caregiver',
        healthinsure = '$healthinsure'
        WHERE calendar_id = '$calendar_id'";
    $conn->query($sumSQL);
    mysql_db_query($dbname, $sumSQL) or die (mysql_error());
    mysql_close();
    
    header("location: summary.php");
?>

    <head>
        <?php include "head.html"?>
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
                                <p>กำลังบันทึกสรุปเยี่ยมบ้านครั้งที่
                                    <?php echo $num_visit; ?> วันที่
                                    <?php echo $visit_date; ?>
                                </p>
                                ของ <span class="text-green"><?php echo $patient_name." (HN ".$patient_hn.")"; ?></span>
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
