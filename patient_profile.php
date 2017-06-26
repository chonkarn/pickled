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
    
    include 'patient_viewdata_db.php';
    include 'meaning_patient.php';
    
    $test = "SELECT * FROM calendar_info WHERE patient_hn = '$patient_hn'  LIMIT 1";
    $test2 = mysqli_query($conn, $test);
    $val = mysqli_fetch_array($test2);
    $num_rows = mysqli_num_rows($test2);
    
    //wheter num_visit more than zero
    $t = "SELECT * FROM summary WHERE patient_hn = '$patient_hn'";
    $t2 = mysqli_query($conn, $t);
    $loop = mysqli_num_rows($t2);
//    echo $loop;
?>

    <head>
        <?php include "head.html"; ?>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <?php include "header.html"; ?>
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content ">

                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="patient.php" class="uk-button-text text-green"><i class="material-icons breadcrumb-icons">folder_shared</i> ผู้ป่วยเยี่ยมบ้าน</a></li>
                        <li><a class="#">HN <?php echo $patient_hn ?></a></li>
                    </ul>

                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-color-text--black">

                            <h4 class="uk-heading-divider">HN <?php echo $patient_hn ?></h4>
                            <div class="uk-grid uk-grid-collapse">
                                <div class="uk-width-1-4@m">
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">ชื่อ-นามสกุล</small>
                                        <br>
                                        <?php echo $patient_pname." ".$patient_fname." ".$patient_lname ?>
                                    </div>
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">อายุ</small>
                                        <br>
                                        <?php echo $patient_age ?>
                                    </div>
                                    <small class="uk-text-muted">เพศ</small>
                                    <br><?php echo $patient_gender; ?>
                                </div>
                                <div class="uk-width-1-4@m">
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">แพทย์เจ้าของไข้</small>
                                        <br>
                                        <?php echo $patient_doctor_owner ?>
                                    </div>
                                    <small class="uk-text-muted">ประเภทการเยี่ยมบ้าน</small>
                                    <br>
                                    <?php echo $patient_visit_type ?>
                                </div>
                                <div class="uk-width-1-6@m">
                                    <div class="uk-margin-bottom">
                                        <small class="uk-text-muted">สถานะการเยี่ยมบ้าน</small>
                                        <br>
                                        <?php echo $patient_visit_status ?>
                                    </div>
                                    <div class="uk-margin-bottom">
                                        <small class="uk-text-muted">จำนวนการเยี่ยมบ้าน</small>
                                        <br>
                                        <?php echo $num_visit ?> ครั้ง
                                    </div>
                                </div>
                                <div class="uk-width-1-6@m">
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">
                                   เยี่ยมบ้านครั้งล่าสุด
                                    </small>
                                        <br>
                                        <?php echo $val['dmy']; ?>
                                        <!--20/6/2559 <small>(บ่าย)</small>-->
                                    </div>
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">
                                  เยี่ยมบ้านครั้งต่อไป
                                    </small>
                                        <br>
                                        <?php if( $next_visit == NULL){ echo "-"; }else {echo $next_visit; } ?>
                                        <!--4/7/2559 <small>(เช้า)</small>-->
                                    </div>
                                </div>
                                <div class="uk-width-1-6@m">
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">
                                   โทรศัพท์บ้าน
                                    </small>
                                        <br><i class="material-icons">phone</i>
                                        <?php echo $patient_tel_home ?>
                                    </div>
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">
                                   โทรศัพท์มือถือ
                                    </small>
                                        <br><i class="material-icons">phone</i>
                                        <?php echo $patient_tel_mobile ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.mdl-card-->

                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                                <div class="mdl-tabs__tab-bar">
                                    <a href="#profile-panel" class="mdl-tabs__tab is-active">ข้อมูลผู้ป่วย</a>
                                    <?php if($loop>0) echo '<a href="#summary-panel-exist" class="mdl-tabs__tab ">สรุปเยี่ยมบ้าน</a>';
                                    else echo '<a href="#summary-panel-none" class="mdl-tabs__tab ">สรุปเยี่ยมบ้าน</a>'
                                             
                                    ?>
                                    
                                </div>
                                <!--/.mdl-tabs__tab-bar-->
                                <div class="mdl-tabs__panel" id="summary-panel-exist">
                                    <div class="uk-margin uk-margin-top">
                                        <div class="uk-text-left uk-float-left uk-width-1-2 ui small form">
                                            <div id="multi-summary" class="ui compact selection dropdown">
                                                <input type="hidden" name="summary-view">
                                                <i class="dropdown icon"></i>
<!--                                                <div class="default text">สรุปเยี่ยมบ้าน</div>-->
                                                <div class="menu">
                                                    <?php 
                                        
                                                        $run = 0;
                                                        $sum = "SELECT * FROM summary WHERE patient_hn = '$patient_hn'";
                                                        $sumq= mysqli_query($conn, $sum);
                                                        while ($sumreslut = mysqli_fetch_array($sumq)){
                                                            $Id_app = $sumreslut['calendar_id'];
                                                            $sum2cal = "SELECT dmy FROM calendar_info WHERE Id_app = '$Id_app'";
                                                            $sum2calq = mysqli_query($conn,$sum2cal);
                                                            $sum2calre = mysqli_fetch_array($sum2calq);
                                                            if ($run==0){
                                                                 echo '<div class="default text">สรุปเยี่ยมบ้านวันที่ '.$sum2calre['dmy'].'</div>'
                                                                     .'<div class="item" data-value="'.$sum2calre['dmy'].'" data-text="สรุปเยี่ยมบ้านวันที่ '.$sum2calre['dmy'].'">'.
                                                                    'สรุปเยี่ยมบ้านวันที่ '.$sum2calre['dmy'].' '.
                                                                '</div>'; 
                                                            }
                                                            else {
                                                                 echo '<div class="item" data-value="male" data-text="Male">'.
                                                                    'สรุปเยี่ยมบ้านวันที่ '.$sum2calre['dmy'].' '.
                                                                '</div>'; 
                                                            }
                                                            
                                                            $run++;
                                                        }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            <a type="submit" class="mdl-button mdl-button--icon mdl-button--colored"><i class="material-icons">search</i></a>
                                        </div>
                                        <div class="uk-text-right">
                                            <a href="<?php echo "summary_print.php?hn=".$patient_hn."$calendar_id=".$calendar_id ?>" class="mdl-button mdl-button--icon mdl-button--colored" target="_blank" title="พิมพ์สรุปเยี่ยมบ้านนี้" uk-tooltip>
                                                <i class="material-icons">print</i>
                                            </a>
                                            <a href="<?php echo "summary_form.php?hn=".$patient_hn."$calendar_id=".$calendar_id ?>" class="mdl-button mdl-button--icon mdl-button--colored" title="แก้ไขสรุปเยี่ยมบ้านนี้" uk-tooltip>
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="uk-margin-medium-top">
                                        <?php
                                          include 'summary_view_latest.php';
                                        ?>
                                    </div>
                                </div>
                                <!--/#summary-panel-->
                                <div class="mdl-tabs__panel" id="summary-panel-none">
                                "ไม่พบข้อมูลสรุปเยี่ยมบ้าน"
                                </div>
                                <div class="mdl-tabs__panel is-active" id="profile-panel">
                                    <div class="uk-float-right">
                                        <a href="<?php echo "patient_print.php?hn=".$patient_hn ?>" class="mdl-button mdl-button--icon mdl-button--colored" target="_blank" title="พิมพ์ข้อมูลผู้ป่วย" uk-tooltip>
                                            <i class="material-icons">print</i>
                                        </a>
                                        <a href="<?php echo "patient_form.php?hn=".$patient_hn ?>" class="mdl-button mdl-button--icon mdl-button--colored" title="แก้ไขข้อมูลผู้ป่วย" uk-tooltip>
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </div>
                                    <div class="uk-margin-top">
                                        <?php include 'patient_viewdata.php' ?>
                                    </div>
                                </div>
                                <!--/#profile-panel-->
                            </div>
                            <!--/.tabs-->
                        </div>
                    </div>
                    <!--/.mdl-card-->
                </div>
                <!--/.demo-content-->
            </main>
        </div>

        <!--custom js-->
        <script src="js/dropdown.js"></script>
        <script src="js/checkbox.js"></script>

    </body>

</html>
