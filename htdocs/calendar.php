<!DOCTYPE html>
<html>
<?php
    // create calendar
    include 'create_calen.php';
    
	session_start();
	if($_SESSION['id'] == "")
	{
		header( "location:login.php");
		exit();
	}
    mysql_connect("localhost", "hvmsdb","1234") or die(mysql_error());
    mysql_select_db("homevisit") or die(mysql_error());
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>

    <!--mdl-->
    <link rel="stylesheet" href="lib/mdl/material.min.css">
    <link rel="stylesheet" href="lib/mdl-template-dashboard/styles.css">

    <!--uikit-->
    <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">

    <!--icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--custom css-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/calendar.css">
    
    
</head>

<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <?php include "header.html"; ?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">

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
                                    <input list="doctor" class="uk-input uk-width-medium uk-form-small" placeholder="ค้นหาจากรหัส / ชื่อ-นามสกุล">
                                    <?php
                                        

                                        $query = "SELECT user,f_user,l_user FROM tbuser ORDER BY user DESC";
                                        $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                        ?>
                                    <datalist id="doctor" name="doctor">
                                         <?php 
                                        while ($ro = mysql_fetch_array($result))
                                        {
                                            $line = $ro['user']." ".$ro['f_user']." ".$ro['l_user'];
                                             echo "<option value='".$line."'></option>";
                                        }
                                    ?>   
                                    </datalist>
                                    <button> ค้นหา </button>
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
                                    <a href="calendar_notify.php" class=" mdl-badge mdl-badge--overlap" data-badge="2" title="แจ้งเตือน" uk-tooltip>
                                        <i class="material-icons">notifications</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#print-calendar" title="พิมพ์สรุปก่อนประชุม" uk-tooltip uk-toggle>
                                        <i class="material-icons">print</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="calendar_add.php" title="เพิ่มนัดหมาย" uk-tooltip>
                                        <i class="material-icons">add</i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!--PRINT MODAL-->
                        <div id="print-calendar" uk-modal="center: true">

                            <div class="uk-modal-dialog ">
                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                <div class="uk-modal-body">
                                    <h4 class="uk-heading-divider">พิมพ์สรุปผลเยี่ยมบ้านล่าสุดของผู้ป่วย ในเดือนมีนาคม 2560</h4>
                                    <form class="uk-form">
                                        <div class="uk-margin-small">
                                            <label>
                                            <input class="uk-radio" type="radio" name="print-week" > ทั้งหมด
                                        </label>
                                        </div>
                                        <div class="uk-margin-small">
                                            <label>
                                            <input class="uk-radio" type="radio" name="print-week"> 27 กุมภาพันธ์ - 3 มีนาคม
                                        </label>
                                        </div>
                                        <div class="uk-margin-small">
                                            <label>
                                        <input class="uk-radio " type="radio" name="print-week"> 6 มีนาคม - 10 มีนาคม
                                            </label>
                                        </div>
                                        <div class="uk-margin-small">
                                            <label>
                                        <input class="uk-radio " type="radio" name="print-week"> 13 มีนาคม - 17 มีนาคม 
                                            </label>
                                        </div>
                                        <div class="uk-margin-small">
                                            <label>
                                        <input class="uk-radio " type="radio" name="print-week" checked> 20 มีนาคม - 24 มีนาคม <small>(สัปดาห์หน้า)</small>
                                            </label>
                                        </div>
                                        <div class="uk-margin-small">
                                            <label>
                                        <input class="uk-radio " type="radio" name="print-week"> 27 มีนาคม - 31 มีนาคม
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <!--/.uk-modal-body-->
                                <div class="uk-modal-footer">
                                    <div class="uk-align-right ">
                                        <a href="#week-appointment" class="uk-button uk-button-default uk-button-small button-green" uk-toggle>เลือก</a>
                                    </div>
                                </div>
                                <!--/.uk-modal-footer-->
                            </div>
                        </div>
                        <!--/.uk-modal-->

                        <!--show list Modal-->
                        <div id="week-appointment" uk-modal="center: true">
                            <div class="uk-modal-dialog">
                                <div class=" uk-modal-body">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <h4 class="uk-heading-divider">รายชื่อผู้ป่วยของวันที่ 20 - 24 มีนาคม</h4>
                                    <ul uk-accordion="multiple: true">
                                        <li class="uk-open">
                                            <h5 class="uk-accordion-title uk-heading-bullet">วันพุธที่ 22 มีนาคม</h5>
                                            <div class="uk-accordion-content">
                                                <div class="uk-grid-small uk-flex-middle am-past" uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: check"></span>
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <b>นาง มาณี ประชาไท <small>(HN 4683265)</small></b>
                                                        <p class="uk-text-meta uk-margin-remove-top">
                                                            นพ.ประสงค์ ทรงธรรม <small>(013655)</small>
                                                        </p>
                                                    </div>
                                                    <div class="uk-float-right">
                                                        9.00 - 12.00 น (เช้า)
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li class="uk-open">
                                            <h3 class="uk-accordion-title uk-heading-bullet">วันศุกร์ที่ 24 มีนาคม</h3>
                                            <div class="uk-accordion-content">
                                                <div class="uk-grid-small uk-flex-middle pm-past" uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: check"></span>
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <b>นาง ชญานิศ พลฑา <small>(HN 6118489)</small></b>
                                                        <p class="uk-text-meta uk-margin-remove-top">
                                                            นพ.ประสงค์ ทรงธรรม <small>(013655)</small>
                                                        </p>
                                                    </div>
                                                    <div class="uk-float-right">
                                                        13.00 - 16.00 น (บ่าย)
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <!--/.uk-accordion-content-->
                                        </li>
                                    </ul>
                                </div>
                                <div class="uk-modal-footer">
                                    <div class="uk-align-right ">
                                        <a href="#week-appointment" class="uk-button uk-button-default uk-button-small button-green" uk-toggle>พิมพ์สรุป</a>
                                    </div>
                                </div>
                                <!--/.uk-modal-footer-->
                            </div>
                        </div>
                        <!--/.uk-modal-->

                        <h4 class="uk-text-center">
                            <a href="#" uk-slidenav-previous></a> เมษายน 2560
                            <a href="#" uk-slidenav-next></a>
                        </h4>

                        <!--calendar-wrap-->
                        <div id="calendar-wrap">
                            <div id="calendar">
                                <ul class="weekdays">
                                    <li>จันทร์</li>
                                    <li>อังคาร</li>
                                    <li>พุธ</li>
                                    <li>พฤหัสบดี</li>
                                    <li>ศุกร์</li>
                                </ul>

                              <!-- Days in current month -->
                    
                                
                                
                                <!-- Row #1 -->
                                <ul class="days">
                                <?php create_calen(3); ?>
                                </ul>             
                                <!-- Row #2 -->
                                <ul class="days">
                                <?php create_calen(10); ?>
                                </ul>

                                <!-- Row #3 -->
                                <ul class="days">
                                <?php create_calen(17); ?>
                                </ul>

                                <!-- Row #4 -->
                                <ul class="days">
                                <?php create_calen(24); ?>
                                </ul>

                            </div>
                            <!-- /. calendar -->
                        </div>
                        <!--/#calendar-wrap-->
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
    
    
</body>

</html>