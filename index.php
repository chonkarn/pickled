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
    $connect = mysql_connect($servername, $username, $password);
    if (!$connect) {
        die(mysql_error());
    }
    mysql_select_db("homevisit");
    mysql_query("set character set utf8");  
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>

        <!--jQuery-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!--mdl-->
        <link rel="stylesheet" href="lib/mdl/material.min.css">
        <link rel="stylesheet" href="lib/mdl-template-dashboard/styles.css">
        <script src="lib/mdl/material.min.js"></script>

        <!--uikit-->
        <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">
        <script src="lib/uikit/js/uikit.min.js"></script>
        <script src="lib/uikit/js/uikit-icons.min.js"></script>

        <!--icon-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!--custom css-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font.css">
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include"header.html"; ?>

            <main class="mdl-layout__content mdl-color--grey-100 ">
                <div class="mdl-grid demo-content">

                    <ul class="uk-breadcrumb breadcrumb">
                        <li><span href="#"></span><i class="material-icons breadcrumb-icons">home</i> หน้าหลัก</li>
                    </ul>

                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__menu">
                            <a href="patient_form_checkHN.php">
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--green">
                                <i class="material-icons">add</i>
                            </button>
                            </a>
                        </div>
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-color-text--black">
                            <h4 class="uk-heading-divider">ผู้ป่วยเยี่ยมบ้านในความดูแล</h4>
                            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                                <div class="mdl-tabs__tab-bar">
                                    <a href="#visiting-panel" class="mdl-tabs__tab is-active">เยี่ยมต่อ</a>
                                    <a href="#closed-panel" class="mdl-tabs__tab">ปิดเคส</a>
                                </div>

                                <!--#VISITING-PANEL-->
                                <div class="mdl-tabs__panel is-active" id="visiting-panel">
                                    <h5 class="uk-margin-top uk-heading-bullet">ผู้ป่วยปัจจุบันใน 3 เดือนที่ผ่านมา</h5>
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
                                                        <?php echo $row['patient_hn']?>
                                                    </td>
                                                    <td>
                                                        <span class="th-label">ชื่อ-นามสกุล: </span>
                                                        <a href="#" class="uk-button-text text-green">
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
                                                        <a href="#" class="uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--/#visiting-panel-->

                                <!--#CLOSED-PANEL-->
                                <div class="mdl-tabs__panel" id="closed-panel">
                                    <h5 class="uk-margin-top uk-heading-bullet">ผู้ป่วยที่ปิดเคสใน 3 เดือนที่ผ่านมา</h5>
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
                                                <th>แก้ไขประวัติ</th>
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
                                                    <a href="#" class="uk-button-text text-green">
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
                                                    <a href="#" class="uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                                <!--/#closed-panel-->
                            </div>
                            <!--/.tabs-->
                        </div>
                        <div class="mdl-card__actions mdl-card--border uk-text-right">
                            <a href="patient.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--green">ดูผู้ป่วยทั้งหมด</a>
                        </div>
                    </div>


                    <div class=" demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--5-col">
                        <div class="mdl-card__supporting-text mdl-color-text--grey-900">
                            <h4 class="uk-heading-divider">นัดหมายเยี่ยมบ้าน</h4>
                        </div>
                    </div>

                    <div class=" demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--7-col">
                        <div class="mdl-card__supporting-text mdl-color-text--grey-900">
                            <h4 class="uk-heading-divider">สรุปเยี่ยมบ้าน</h4>
                            <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                <thead>
                                    <tr>
                                        <th>รูปภาพ</th>
                                        <th class="uk-table-link"><a href="#" class="uk-button-text text-green" onclick="sortTable(1,'patient_own_closed','sort2')" id="sort2">HN <span uk-icon="icon: arrow-up"></span></a></th>
                                        <th class="uk-table-link"><a href="#" class="uk-button-text">ชื่อ-นามสกุล</a></th>
                                        <th class="uk-table-link"><a href="#" class="uk-button-text">เยี่ยมครั้งล่าสุด</a></th>
                                        <th class="uk-table-link"><a href="#" class="uk-button-text">แก้ไขสรุป</a></th>
                                    </tr>
                                </thead>
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
                                        <a href="#" class="uk-button-text text-green">
                                            <?php echo $row['patient_p_name']." ".$row['patient_name']." ".$row['patient_surname']?>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="th-label">วันที่เยี่ยมบ้าน: </span>
                                        <?php echo $row['last_visit']?>
                                    </td>
                                    <td>
                                        <a href="#" class="uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="mdl-card__actions mdl-card--border uk-text-right">
                            <a href="summary.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--green">ดูสรุปทั้งหมด</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!--sort-->
        <script src="js/table_sort.js"></script>

        <!--jquery-->
        <script src="js/jquery-3.1.1.min.js"></script>

        <!--js-->
        <script src="lib/mdl/material.min.js"></script>
        <script src="lib/uikit/js/uikit.min.js"></script>
    </body>

</html>
