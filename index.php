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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

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
</head>

<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
       <?php include"header.html";?>
        <main class="mdl-layout__content mdl-color--grey-100 ">
            <div class="mdl-grid demo-content">

                <ul class="uk-breadcrumb">
                    <li><span href=""></span>หน้าหลัก</li>
                </ul>

                <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__menu">
                        <a href="patient_form_checkHN.php">
                            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--green">
                                <i class="material-icons">add</i>
                            </button>
                        </a>
                    </div>
                    <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-color-text--black">
                        <h5>ผู้ป่วยเยี่ยมบ้านในความดูแล</h5>

                        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                            <div class="mdl-tabs__tab-bar">
                                <a href="#visiting-panel" class="mdl-tabs__tab is-active">เยี่ยมต่อ</a>
                                <a href="#closed-panel" class="mdl-tabs__tab">ปิดเคส</a>
                            </div>
                            <!--/.mdl-tabs__tab-bar-->
                            <div class="mdl-tabs__panel is-active" id="visiting-panel">
                                <h5 class="uk-margin-top">ผู้ป่วยปัจจุบันใน 3 เดือนที่ผ่านมา</h5>
                                <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col" id="patient_own_con">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__header--sorted-ascending" onclick="sortTable(0,'patient_own_con','sort')" id="sort">HN</th>
                                            <th class="mdl-data-table__cell--non-numeric">ชื่อ-นามสกุล</th>
                                            <th>สถานะ</th>
                                            <th>เยี่ยมแล้ว (ครั้ง)</th>
                                            <th>เยี่ยมครั้งสุดท้าย</th>
                                            <th>เยี่ยมครั้งต่อไป</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $user = $_SESSION['id'];
                                    $connect = mysql_connect("localhost","hvmsdb", "1234");
                                    if (!$connect) {
                                        die(mysql_error());
                                    }
                                    mysql_query("set character set utf8");   
                                    mysql_select_db("homevisit");
                                    $results = mysql_query("SELECT * FROM patientinfo WHERE patient_doctor_owner = '$user' AND (patient_visit_status = 1 OR patient_visit_status = 2) ");
                                    while($row = mysql_fetch_array($results)) {
                                    if ($row['patient_visit_status'] == 1) $row['patient_visit_status'] = "ใหม่" ;
                                        else $row['patient_visit_status'] = "เยี่ยมต่อ"
                                    ?>
                                        <tr>
                                            <td><?php echo $row['patient_hn']?></td>
                                            <td class="mdl-data-table__cell--non-numeric"><?php echo $row['patient_p_name'].$row['patient_name']." ".$row['patient_surname']?></td>
                                            <td><?php echo $row['patient_visit_status']?></td>
                                            <td><?php echo $row['num_visit']?></td>
                                            <td><?php echo $row['last_visit']?></td>
                                            <td><?php echo $row['next_visit']?></td>
                                            <td><a href="patient_edit_5987452.html"><i class="material-icons">edit</i></a></td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                            <!--/#visiting-panel-->
                            <div class="mdl-tabs__panel" id="closed-panel">
                                <h5 class="uk-margin-top">ผู้ป่วยที่ปิดเคสใน 3 เดือนที่ผ่านมา</h5>
                                <table class="mdl-data-table mdl-js-data-table mdl-cell--12-col" id="patient_own_closed">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__header--sorted-ascending" onclick="sortTable(1,'patient_own_closed','sort2')" id="sort2">HN</th>
                                            <th class="mdl-data-table__cell--non-numeric">ชื่อ-นามสกุล</th>
                                            <th>สถานะ</th>
                                            <th>เยี่ยมแล้ว (ครั้ง)</th>
                                            <th>เยี่ยมครั้งสุดท้าย</th>
                                            <th>เยี่ยมครั้งต่อไป</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                <?php
                                    $user = $_SESSION['id'];
                                    $connect = mysql_connect("localhost","hvmsdb", "1234");
                                    if (!$connect) {
                                        die(mysql_error());
                                    }
                                    mysql_query("set character set utf8");   
                                    mysql_select_db("homevisit");
                                    $results = mysql_query("SELECT * FROM patientinfo WHERE patient_doctor_owner = '$user' AND patient_visit_status = 0 ");
                                    while($row = mysql_fetch_array($results)) {
                                    $row['patient_visit_status'] = "ปิดเยี่ยมบ้าน";
                                    ?>
                                        <tr>
                                            <td><?php echo $row['patient_hn']?></td>
                                            <td class="mdl-data-table__cell--non-numeric"><?php echo $row['patient_p_name'].$row['patient_name']." ".$row['patient_surname']?></td>
                                            <td><?php echo $row['patient_visit_status']?></td>
                                            <td><?php echo $row['num_visit']?></td>
                                            <td><?php echo $row['last_visit']?></td>
                                            <td><?php echo $row['next_visit']?></td>
                                            <td><a href="patient_edit_5987452.html"><i class="material-icons">edit</i></a></td>
                                        </tr>

                                    <?php
                                    }
                                    ?>    
                                </table>
                            </div>
                            <!--/#closed-panel-->
                        </div>
                        <!--/.tabs-->
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--green">ดูผู้ป่วยทั้งหมด</a>
                    </div>
                </div>

                <!--calendar-->
                <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                    <div class="mdl-card__supporting-text mdl-color-text--grey-900">
                        <h4>นัดหมายเยี่ยมบ้าน</h4>
                        <h5>สัปดาห์นี้</h5>
                        <ul class="uk-list uk-list-large uk-list-divider">
                            <li><b class="text-green">วันนี้</b>
                                <ul class="uk-list">
                                    <li>นาง เพียรจิต จงใจรักษ์</li>
                                </ul>
                            </li>
                            <li>ศ. 3/2/2560
                                <ul class="uk-list">
                                    <li>นาง เพียรจิต จงใจรักษ์</li>
                                    <li>นาง เพียรจิต จงใจรักษ์</li>
                                    <li>นาง เพียรจิต จงใจรักษ์</li>
                                </ul>
                            </li>
                        </ul>
                        <hr>
                        <h5>สัปดาห์หน้า</h5>
                        <ul class="uk-list uk-list-large uk-list-divider">
                            <li>จ. 6/2/2560
                                <ul class="uk-list">
                                    <li>นาง เพียรจิต จงใจรักษ์</li>
                                </ul>
                            </li>
                            <li>พ. 8/2/2560
                                <ul class="uk-list">
                                    <li>นาง เพียรจิต จงใจรักษ์</li>
                                    <li>นาง เพียรจิต จงใจรักษ์</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--summary-->
                <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet mdl-cell--8-col-desktop">
                    <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-color-text--black">
                        <h5>สรุปเยี่ยมบ้าน</h5>
                        <table class="mdl-data-table mdl-js-data-table mdl-cell--12-col">
                            <thead>
                                <tr>
                                    <th>HN</th>
                                    <th class="mdl-data-table__cell--non-numeric">ชื่อ-นามสกุล</th>
                                    <th class="mdl-data-table__header--sorted-descending">วันที่เยี่ยม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>7469584</td>
                                    <td class="mdl-data-table__cell--non-numeric"><a href="#">นาง มะลิ บำรุงมิตร</a></td>
                                    <td>15/8/2559</td>
                                </tr>
                                <tr>
                                    <td>7567245</td>
                                    <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย ขจร ชัยโชค</a></td>
                                    <td>14/8/2559</td>
                                </tr>
                                <tr>
                                    <td>6981258</td>
                                    <td class="mdl-data-table__cell--non-numeric"><a href="#">นาง กันยา สุปราณี</a></td>
                                    <td>10/8/2559</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
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