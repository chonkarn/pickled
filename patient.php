<!DOCTYPE html>
<html>
<?php
	session_start();
	if($_SESSION['id'] == "")
	{
		header( "location:login.php");
		exit();
	}
?>

    <head>
         <?php include"head.html"; ?>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html"; ?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><i class="material-icons breadcrumb-icons">folder_shared</i> ผู้ป่วยเยี่ยมบ้าน</li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--112-col-desktop">
                        <div class="mdl-card__menu">
                            <a href="patient_checkhn.php">
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--green">
                                <i class="material-icons">add</i></button>
                            </a>
                        </div>
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <h4 class="uk-heading-divider">ค้นหาผู้ป่วยเยี่ยมบ้านทั้งหมด</h4>
                            <div class="mdl-grid">
                                <div class="mdl-layout-spacer"></div>
                                <div class="ui category search">
                                    <div class="ui icon input">
                                        <input class="prompt" type="text" placeholder="ค้นหารหัส หรือ ชื่อ-นามสกุล...">
                                        <i class="search icon"></i>
                                    </div>
                                    <div class="results"></div>
                                </div>
                                <div class="mdl-layout-spacer"></div>
                            </div>
                        </div>
                    </div>

                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell--12-col mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                                <div class="mdl-tabs__tab-bar">
                                    <a href="#visiting-panel" class="mdl-tabs__tab is-active">เยี่ยมต่อ</a>
                                    <a href="#closed-panel" class="mdl-tabs__tab">ปิดเยี่ยมบ้าน</a>
                                </div>
                                <!--#visiting-panel-->
                                <div class="mdl-tabs__panel is-active" id="visiting-panel">
                                    <h5 class="uk-margin-top uk-heading-bullet">ผู้ป่วยเยี่ยมบ้านต่อ</h5>
                                    <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                        <thead>
                                            <tr>
                                                <th>รูปภาพ</th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text text-green">HN <span uk-icon="icon: arrow-up"></span></a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ชื่อ-นามสกุล</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">สถานะ</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">เยี่ยมแล้ว (ครั้ง)</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">เยี่ยมครั้งสุดท้าย</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">เยี่ยมครั้งต่อไป</a></th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            $results = mysql_query("
                                                SELECT * FROM patientinfo 
                                                WHERE patient_doctor_owner = '$user' 
                                                AND (patient_visit_status = 1 OR patient_visit_status = 2) 
                                            ");
                                            
                                                while($row = mysql_fetch_array($results)) {
                                                    if ($row['patient_visit_status'] == 1)
                                                        $row['patient_visit_status'] = "ใหม่" ;
                                                    else $row['patient_visit_status'] = "เยี่ยมต่อ";
                                            ?>
                                                <tr>
                                                    <td>
                                                        <img class="uk-preserve-width uk-border-circle" src="img/avatar-patient.svg" width="40" alt="">
                                                    </td>
                                                    <td>
                                                        <span class="th-label">HN: </span>
                                                        <?php echo $row['patient_hn']; ?>
                                                    </td>
                                                    <td>
                                                        <span class="th-label">ชื่อ-นามสกุล: </span>
                                                        <a class="uk-button-text text-green" href="<?php echo " patient_profile.php?hn=".$row['patient_hn']; ?>">
                                                            <?php echo $row['patient_p_name']." ".$row['patient_name']." ".$row['patient_surname']?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <span class="th-label">สถานะ: </span>
                                                        <?php echo $row['patient_visit_status']?>
                                                    </td>
                                                    <td>
                                                        <span class="th-label">เยี่ยมครั้งที่: </span>
                                                        <?php echo $row['num_visit']?>
                                                    </td>
                                                    <td>
                                                        <span class="th-label">เยี่ยมครั้งสุดท้าย: </span>
                                                        <?php echo $row['last_visit']?>
                                                    </td>
                                                    <td>
                                                        <span class="th-label">เยี่ยมครั้งต่อไป: </span>
                                                        <?php echo $row['next_visit']?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="uk-button uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--/#visiting-panel-->
                                <div class="mdl-tabs__panel" id="closed-panel">
                                    <h5 class="uk-margin-top uk-heading-bullet">ผู้ป่วยปิดเยี่ยมบ้าน</h5>
                                    <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                        <thead>
                                            <tr>
                                                <th>รูปภาพ</th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text" onclick="sortTable(1,'patient_own_closed','sort2')" id="sort2">HN <span uk-icon="icon: arrow-up"></span></a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ชื่อ-นามสกุล</a></th>
                                                <th>สถานะ</th>
                                                <th>เยี่ยมแล้ว (ครั้ง)</th>
                                                <th>เยี่ยมครั้งสุดท้าย</th>
                                                <th>เยี่ยมครั้งต่อไป</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $results = mysql_query("
                                                SELECT * FROM patientinfo 
                                                WHERE patient_doctor_owner = '$user' 
                                                AND patient_visit_status = 0
                                            ");
                                            while($row = mysql_fetch_array($results)) {
                                                $row['patient_visit_status'] = "ปิดเยี่ยมบ้าน";
                                        ?>
                                            <tr>
                                                <td>
                                                    <img class="uk-preserve-width uk-border-circle" src="img/avatar-patient.svg" width="40" alt="">
                                                </td>
                                                <td>
                                                    <span class="th-label">HN: </span>
                                                    <?php echo $row['patient_hn']?>
                                                </td>
                                                <td>
                                                    <span class="th-label">ชื่อ-นามสกุล: </span>
                                                    <?php echo $row['patient_p_name']." ".$row['patient_name']." ".$row['patient_surname']?>
                                                </td>
                                                <td>
                                                    <span class="th-label">สถานะ: </span>
                                                    <?php echo $row['patient_visit_status']?>
                                                </td>
                                                <td>
                                                    <span class="th-label">เยี่ยมครั้งที่: </span>
                                                    <?php echo $row['num_visit']?>
                                                </td>
                                                <td>
                                                    <span class="th-label">เยี่ยมครั้งสุดท้าย: </span>
                                                    <?php echo $row['last_visit']?>
                                                </td>
                                                <td>
                                                    <span class="th-label">เยี่ยมครั้งต่อไป: </span>
                                                    <?php echo $row['next_visit']?>
                                                </td>
                                                <td>
                                                    <a href="#" class="uk-button uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                                <!--/#closed-panel-->
                            </div>
                            <!--/.tabs-->
                        </div>
                    </div>
                    <!--/.mdl-card-->
                </div>
            </main>
        </div>

        <!--js-->
        <script src="lib/mdl/material.min.js"></script>
        <script src="lib/uikit/js/uikit.min.js"></script>

        <!--js stepper-->
        <script src="lib/mdl-stepper/stepper.min.js"></script>
        <script src="js/stepper-nonlinear.js"></script>

        <!--custom js-->
        <script src="js/openwindow.js"></script>
    </body>

</html>
