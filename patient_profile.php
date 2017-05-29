<!DOCTYPE html>
<html>

<?php
    include 'patient_show.php';
    include 'summary_show_latest.php';
    include 'meaning.php';
?>

    <head>
        <?php include "head.html"; ?>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <?php include "header.html"; ?>
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content ">

                    <!--BREADCRUMB-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="patient.php" class="uk-button-text text-green"><i class="material-icons breadcrumb-icons">folder_shared</i> ผู้ป่วยเยี่ยมบ้าน</a></li>
                        <li><a class="#">HN <?php echo $patient_hn ?></a></li>
                    </ul>

                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-color-text--black">
                            <h4 class="uk-heading-divider">HN
                                <?php echo $patient_hn ?>
                            </h4>
                            <div class="uk-grid uk-grid-collapse">
                                <!--
                                <div class="uk-width-1-6@m">
                                    <img class="padding-right-20" src="">
                                </div>
                            -->
                                <div class="uk-width-1-4@m">
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">ชื่อ-นามสกุล</small>
                                        <br>
                                        <?php echo $patient_pname." ".$patient_fname." ".$patient_lname ?>
                                    </div>
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">อายุ</small>
                                        <br>
                                        <?php echo $age_year." ปี ".$age_month." เดือน ".$age_day." วัน" ?>
                                        <!-- 60 ปี 1 เดือน 2 วัน-->
                                    </div>
                                    <small class="uk-text-muted">เพศ</small>
                                    <br>
                                    <?php echo $patient_gender ?>
                                </div>
                                <div class="uk-width-1-4@m">
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">แพทย์เจ้าของไข้</small>
                                        <br>
                                        <?php echo $doctor_owner ?>
                                    </div>
                                    <small class="uk-text-muted">ประเภทการเยี่ยมบ้าน</small>
                                    <br>
                                    <label>
                                    <input class="uk-radio" type="radio" name="visit-category" checked> Home visit case
                                </label>
                                    <br>
                                    <label class="uk-text-muted">
                                    <input class="uk-radio" type="radio" name="visit-category" disabled> Geriatric case
                                </label>
                                    <br>
                                    <label class="uk-text-muted">
                                    <input class="uk-radio" type="radio" name="visit-category" disabled> Palliative case
                                </label>
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
                                        <?php echo $last_visit ?>
                                        <!--20/6/2559 <small>(บ่าย)</small>-->
                                    </div>
                                    <div class="uk-margin-bottom"> <small class="uk-text-muted">
                                  เยี่ยมบ้านครั้งต่อไป
                                    </small>
                                        <br>
                                        <?php echo $next_visit ?>
                                        <!--4/7/2559 <small>(เช้า)</small>-->
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
                                    <a href="#summary-panel" class="mdl-tabs__tab is-active">สรุปเยี่ยมบ้าน</a>
                                    <a href="#profile-panel" class="mdl-tabs__tab">ข้อมูลผู้ป่วย</a>
                                </div>
                                <!--/.mdl-tabs__tab-bar-->
                                <div class="mdl-tabs__panel is-active" id="summary-panel">
                                    <div class="uk-margin uk-margin-top">
                                        <div class="uk-text-left uk-float-left uk-width-1-2 ui small form">
                                            <div id="multi-summary" class="ui compact selection dropdown">
                                                <input type="hidden" name="summary-view">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">ดูสรุปเยี่ยมบ้านครั้งที่ 5 (15 พฤษภาคม 2560)</div>
                                                <div class="menu">
                                                    <div class="item" data-value="male" data-text="Male">
                                                        สรุปเยี่ยมบ้านครั้งที่ 5 (15 พฤษภาคม 2560)
                                                    </div>
                                                    <div class="item" data-value="female" data-text="สรุปเยี่ยมบ้านครั้งที่ 4 (1 พฤษภาคม 2560)">
                                                        สรุปเยี่ยมบ้านครั้งที่ 4 (1 พฤษภาคม 2560)
                                                    </div>
                                                    <div class="item" data-value="female" data-text="Female">
                                                        สรุปเยี่ยมบ้านครั้งที่ 3 (1 พฤษภาคม 2560)
                                                    </div>
                                                    <div class="item" data-value="female" data-text="Female">
                                                        สรุปเยี่ยมบ้านครั้งที่ 2 (1 พฤษภาคม 2560)
                                                    </div>
                                                    <div class="item" data-value="female" data-text="Female">
                                                        สรุปเยี่ยมบ้านครั้งที่ 1 (1 พฤษภาคม 2560)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-text-right">
                                            <a href="summary_print.php" class="mdl-button mdl-button--icon mdl-button--colored" title="พิมพ์สรุปเยี่ยมบ้านนี้" uk-tooltip>
                                                <i class="material-icons">print</i>
                                            </a>
                                            <a href="summary_form.php" class="mdl-button mdl-button--icon mdl-button--colored" title="แก้ไขสรุปเยี่ยมบ้านนี้" uk-tooltip>
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="uk-margin-medium-top">
                                        <?php
                                        include 'summary_view.php'; 
                                    ?>
                                    </div>
                                </div>
                                <!--/#summary-panel-->
                                <div class="mdl-tabs__panel" id="profile-panel">
                                    <div class="uk-float-right">
                                        <a href="patient_print.php" class="mdl-button mdl-button--icon mdl-button--colored" title="พิมพ์ข้อมูลผู้ป่วย" uk-tooltip>
                                            <i class="material-icons">print</i>
                                        </a>
                                        <a href="patient_form.php" class="mdl-button mdl-button--icon mdl-button--colored" title="แก้ไขข้อมูลผู้ป่วย" uk-tooltip>
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </div>
                                    <div class="uk-margin-top">
                                        <?php include 'patient_view.php' ?>
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
    </body>

</html>
