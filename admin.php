<!DOCTYPE html>
<html>
<?php
	session_start();
	if($_SESSION['id'] == "") {
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
    $results = mysql_query("SELECT * FROM tbuser WHERE user = '$user'");
    $row = mysql_fetch_array($results);
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
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "admin_header.html"; ?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><span href="#"></span><i class="material-icons breadcrumb-icons">folder_shared</i> รายชื่อผู้ใช้งาน</li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--112-col-desktop">

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

                        <div class="mdl-card__menu">
                            <a href="#" title="พิมพ์สรุปก่อนประชุม" uk-tooltip uk-toggle>
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                <i class="material-icons">add</i></button>
                            </a>
                        </div>

                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                                <div class="mdl-tabs__tab-bar">
                                    <a href="#doctor-panel" class="mdl-tabs__tab is-active">แพทย์</a>
                                    <a href="#staff-panel" class="mdl-tabs__tab">เจ้าหน้าที่</a>
                                </div>
                                <!--/.mdl-tabs__tab-bar-->
                                <div class="mdl-tabs__panel is-active" id="doctor-panel">

                                    <?php 
                                        $doctor_data = mysql_query(" SELECT * FROM tbuser 
                                                    WHERE id_position BETWEEN 1 AND 2
                                                    ORDER BY user ASC");
                                        $doctor_count = mysql_num_rows($doctor_data);
                                    ?>

                                    <h5 class="uk-margin-top uk-heading-bullet">รายชื่อแพทย์ในภาควิชา (
                                        <?php echo "$doctor_count" ?> คน)</h5>

                                    <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                        <thead>
                                            <tr>
                                                <th>รูปภาพ</th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text text-green">รหัสประจำตัว <span uk-icon="icon: arrow-down"></span></a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ชื่อ-นามสกุล</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ตำแหน่ง</a></th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while($row = mysql_fetch_array($doctor_data)) {
                                                    include 'id_position.php';
                                                    if($row["photo"] == "") {
                                                        $photo = "img/avatar-doctor.svg";
                                                    }
                                                    else {
                                                        $photo = "img/".$row["photo"];
                                                    } 
                                            ?>
                                                <tr>
                                                    <td><img class="uk-preserve-width uk-border-circle" src="<?php echo $photo ?>" width="40" alt=""></td>
                                                    <td>
                                                        <span class="th-label">รหัสประจำตัว: </span>
                                                        <?php echo $row['user'] ?>
                                                    </td>
                                                    <td>
                                                        <span class="th-label">ชื่อ-นามสกุล: </span>
                                                        <a href="#" class="uk-button uk-button-text text-green">
                                                            <?php echo $row['f_user']." ".$row['l_user'] ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <span class="th-label">ตำแหน่ง: </span>
                                                        <?php echo $row['id_position'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="uk-button uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!--/#staff-->
                                <div class="mdl-tabs__panel" id="staff-panel">

                                    <?php
                                        $staff_data = mysql_query("
                                            SELECT * FROM tbuser 
                                            WHERE NOT id_position BETWEEN 1 AND 2
                                            ORDER BY user ASC
                                        ");
                                        $staff_count = mysql_num_rows($staff_data);
                                    ?>

                                        <h5 class="uk-margin-top uk-heading-bullet">รายชื่อเจ้าหน้าที่ผู้มีส่วนเกี่ยวข้อง (
                                            <?php echo "$staff_count" ?> คน)</h5>

                                        <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                            <thead>
                                                <tr>
                                                    <th>รูปภาพ</th>
                                                    <th class="uk-table-link"><a href="#" class="uk-button-text">รหัสประจำตัว <span uk-icon="icon: arrow-down"></span></a></th>
                                                    <th class="uk-table-link"><a href="#" class="uk-button-text">ชื่อ-นามสกุล</a></th>
                                                    <th class="uk-table-link"><a href="#" class="uk-button-text">ตำแหน่ง</a></th>
                                                    <th>แก้ไข</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    while($row = mysql_fetch_array($staff_data)) {
                                                        include 'id_position.php';
                                                        if($row["photo"] == "") {
                                                            $photo = "img/avatar-doctor.svg";
                                                        }
                                                        else {
                                                            $photo = "img/".$row["photo"];
                                                        }
                                                ?>
                                                    <tr>
                                                        <td><img class="uk-preserve-width uk-border-circle" src="<?php echo $photo ?>" width="40" alt=""></td>
                                                        <td>
                                                            <?php
                                                        echo $row['user']
                                                    ?>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="uk-button uk-button-text text-green">
                                                                <?php
                                                            echo $row['f_user']." ".$row['l_user']
                                                        ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php
                                                        echo $row['id_position']." "
                                                    ?>
                                                        </td>
                                                        <td><a href="#" class="uk-button uk-button-text text-green"><span uk-icon="icon: pencil"></span></a></td>
                                                    </tr>
                                                    <?php } ?>
                                            </tbody>
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
