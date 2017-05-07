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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>

        <!--jQuery-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!--mdl-->
        <link rel="stylesheet" href="lib/mdl/material.min.css">
        <link rel="stylesheet" href="lib/mdl-template-dashboard/styles.css">
        <script src="lib/mdl/material.min.js"></script>

        <!--semantic-ui-->
        <link rel="stylesheet" href="lib/semantic-ui/dist/semantic.min.css">
        <script src="lib/semantic-ui/dist/semantic.min.js"></script>

        <!--uikit-->
        <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">
        <script src="lib/uikit/js/uikit.min.js"></script>
        <script src="lib/uikit/js/uikit-icons.min.js"></script>

        <!--icon-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!--custom css-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font.css">

        <!--datepicker-->
        <link rel="stylesheet" href="lib/jquery-ui/jquery-ui.min.css">
        <script src="lib/jquery-ui/jquery-ui.min.js"></script>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html";?>
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <ul class="uk-breadcrumb breadcrumb">
                        <li><span href="#"></span><i class="material-icons breadcrumb-icons">folder_shared</i> ผู้ป่วยเยี่ยมบ้าน</li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--112-col-desktop">
                        <div class="mdl-card__menu">
                            <a href="patient_form_checkHN.php">
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--green">
                                <i class="material-icons">add</i></button>
                            </a>
                        </div>

                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">

                            <h4 class="uk-heading-divider">ค้นหาผู้ใช้งานในระบบ</h4>
                            
                            
                            
                            
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
                                <!--/.mdl-tabs__tab-bar-->
                                <div class="mdl-tabs__panel is-active" id="visiting-panel">
                                    <h5 class="uk-margin-top">ผู้ป่วยเยี่ยมบ้านต่อ</h5>
                                    <table class="mdl-data-table mdl-js-data-table selectable mdl-cell--12-col" id="patient_own_con">
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
                                    $connect = mysql_connect("localhost","hvmsdb","1234");
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
                                                <td>
                                                    <?php echo $row['patient_hn']?>
                                                </td>
                                                <td class="mdl-data-table__cell--non-numeric">
                                                    <?php echo $row['patient_p_name'].$row['patient_name']." ".$row['patient_surname']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['patient_visit_status']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['num_visit']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['last_visit']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['next_visit']?>
                                                </td>
                                                <td><a href="patient_edit_5987452.html"><i class="material-icons">edit</i></a></td>
                                            </tr>

                                            <?php
                                    }
                                    ?>
                                    </table>
                                </div>
                                <!--/#visiting-panel-->
                                <div class="mdl-tabs__panel" id="closed-panel">
                                    <h5 class="uk-margin-top">ผู้ป่วยปิดเยี่ยมบ้าน</h5>
                                    <table class="mdl-data-table mdl-js-data-table selectable mdl-cell--12-col" id="patient_own_closed">
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
                                    $connect = mysql_connect("localhost","root", "");
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
                                                <td>
                                                    <?php echo $row['patient_hn']?>
                                                </td>
                                                <td class="mdl-data-table__cell--non-numeric">
                                                    <?php echo $row['patient_p_name'].$row['patient_name']." ".$row['patient_surname']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['patient_visit_status']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['num_visit']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['last_visit']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['next_visit']?>
                                                </td>
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