<!DOCTYPE html>
<html>
<?php

    if (isset($_GET['Message'])) {
//    include 'calendar_to_sum_yn.html';
        $sum_id = $_GET["sum_id"];
        $sum_hn = $_GET["sum_hn"];
    include 'calendar_to_sum.php';
}
    // create calendar
    include 'create_calen.php';

    //visit meaning
    include 'meaning_visit.php';

	session_start();
	if($_SESSION['id'] == "")
	{
//        $previous = "calendar.php";
//		header( "location:login.php?goback=".$previous);
		header( "location:login.php");
		exit();
	}


?>

<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>

    <link rel="stylesheet" href="lib/mdl/material.min.css">
    <link rel="stylesheet" href="lib/mdl-template-dashboard/styles.css">

    <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css"> -->
    <?php include 'head.html'; ?>
    <link rel="stylesheet" href="css/calendar.css">
</head>

<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

        <?php include "header.html"; ?>

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">

                <!-- BREADCRUMB -->
                <ul class="uk-breadcrumb breadcrumb">
                    <li><span href="#"></span><i class="material-icons breadcrumb-icons">date_range</i>ปฏิทินนัดหมาย</li>
                </ul>

                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__menu"></div>

                    <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                        <div class="uk-grid uk-grid-collapse">

                            <div class="uk-width-1-1">
                                <h4 class="uk-heading-divider">แสดงนัดหมาย</h4>
                                <form class="uk-form">
                                    <label>
                                            <input class="uk-radio" type="radio" name="radio1" checked> ทั้งหมด
                                        </label>

                                    <div class="uk-margin-small">
                                        <label>
                                        <input class="uk-radio" type="radio" name="radio1" > เฉพาะฉัน
                                    </label>
                                    </div>
                                    <label>
                                        <input class="uk-radio" type="radio" name="radio1"> แพทย์ที่ระบุ:
                                    </label>
                                    <input class="uk-input uk-width-medium uk-form-small" list="doctor" name="search_patient" placeholder="ค้นหาจากรหัสประจำ หรือ ชื่อ-นามสกุลของแพทย์">
                                    <!-- <input list="doctor" class="uk-input uk-width-medium uk-form-small" placeholder="ค้นหาจากรหัส / ชื่อ-นามสกุล"> -->

                                    <?php
                                        $query = "SELECT user,f_user,l_user FROM tbuser ORDER BY user DESC";
                                        $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                    ?>
                                    
                                    <datalist id="doctor" name="doctor">
                                         <?php
                                          while ($ro = mysql_fetch_array($result)) {
                                              $line = $ro['user']." ".$ro['f_user']." ".$ro['l_user'];
                                               echo "<option value='".$line."'></option>";
                                          }
                                        ?>
                                    </datalist>

                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">search</i></button>
                                    <!-- <button> ค้นหา </button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--/.mdl-card__supporting-text-->
                </div>
                <!--/.mdl-card-->

                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-color-text--black">
                        <div class="mdl-card__menu">
                            <ul class="uk-iconnav">
                                <li>
                                    <?php
                                    $noti = "SELECT Count(members_status) AS notify FROM calendar_members_status WHERE Id_members=".$_SESSION['id']." AND members_status=0";
                                    $noti_q = mysql_query($noti) or die(mysql_error()."[".$query."]");
                                    $noti_fetch = mysql_fetch_assoc($noti_q);
                                    ?>
                                    <a href="calendar_notify.php" class=" mdl-badge mdl-badge--overlap" data-badge="<?php echo $noti_fetch["notify"];?>" title="แจ้งเตือน" uk-tooltip>
                                        <i class="material-icons">notifications</i>
                                    </a>
                                </li>
<!--
                                <li>
                                    <a href="#print-calendar" title="พิมพ์สรุปก่อนประชุม" uk-tooltip uk-toggle>
                                        <i class="material-icons">print</i>
                                    </a>
                                </li>
-->
                                <li>
                                    <a href="calendar_add.php" title="เพิ่มนัดหมาย" uk-tooltip>
                                        <i class="material-icons">add</i>
                                    </a>
                                </li>
                            </ul>
                        </div>


                            <?php
                            include'calendar_month.php';
                            $calendar = new Calendar();
                            echo $calendar->show();
                            $month = "";
                             $calendar->month($month);
                            ?>
                    </div>
                </div>
                <!--/.mdl-card-->

                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--112-col-desktop">
                    <div class="mdl-card__menu"></div>

                    <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                        <div class="uk-grid">
                            <div class="uk-width-1-3@m">
                                <h5 class="uk-heading-divider">สีของนัดหมาย</h5>
                                <div class="uk-margin-small-bottom">สีจาง คือนัดหมายที่สรุปแล้ว
                                </div> <span>
                                    <img class="icon-desc morning past" src=""> เวลาเช้า <small>(9.00 - 12.00 น)</small>
                                </span>
                                <br>
                                <span>
                                    <img class="icon-desc afternoon past" src=""> เวลาบ่าย <small>(13.00-16.00 น)</small>
                                </span>
                                <div class="uk-margin-top uk-margin-small-bottom">สีเข้ม คือนัดหมายที่ยังไม่สรุป</div>

                                <span>
                                    <img class="icon-desc morning" src=""> เวลาเช้า <small>(9.00 - 12.00 น)</small>
                                </span>
                                <br>

                                <span>
                                    <img class="icon-desc afternoon" src=""> เวลาบ่าย <small>(13.00-16.00 น)</small>
                                </span>
                            </div>
                            <div class="uk-width-1-3@m">
                                <h5 class="uk-heading-divider">สัญลักษณ์ของนัดหมาย</h5>
                                <span uk-icon="icon: commenting" class="uk-margin-small-bottom"></span> รอตอบรับ <br>
                                <span uk-icon="icon: comments" class="uk-margin-small-bottom"></span> เข้าร่วมทุกคน <br>
                                <span uk-icon="icon: users" class="uk-margin-small-bottom"></span> ประชุม <br>
                                <span uk-icon="icon: check"></span> ครบกำหนดวัน <br>
                            </div>
                            <div class="uk-width-1-3@m">
                                <h5 class="uk-heading-divider">สัญลักษณ์ของแพทย์</h5>
                                <span class="text-green">&#11044;</span> เข้าร่วม
                                <div class="uk-margin-small">
                                    <span class="text-yellow">&#11044;</span> รอตอบรับ
                                </div>
                                <span class="text-red">&#11044;</span> ปฏิเสธ
                            </div>
                        </div>
                    </div>
                    <!--/.mdl-card__supporting-text-->
                </div>
                <!--/.mdl-card-->
            </div>
            <!--/.demo-content-->
        </main>
    </div>

    <!--jquery-->
    <!--<script src="js/jquery-3.1.1.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <!--js mdl-->
    <script src="lib/mdl/material.min.js"></script>
    <script src="lib/mdl-stepper/stepper.min.js"></script>


    <!--js uikit-->
    <script src="lib/uikit/js/uikit.min.js"></script>
    <script src="lib/uikit/js/uikit-icons.min.js"></script>

    <!--custom js-->
    <script src="js/stepper-nonlinear.js"></script>
    <script src="js/liblock.js"></script>





</body>

</html>
