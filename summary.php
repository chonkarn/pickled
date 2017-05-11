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
            
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><span href="#"></span><i class="material-icons breadcrumb-icons">assignment</i> สรุปเยี่ยมบ้าน</li>
                    </ul>

                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                                <div class="mdl-tabs__tab-bar">
                                    <a href="#nosum-panel" class="mdl-tabs__tab is-active">ยังไม่สรุป</a>
                                    <a href="#sum-panel" class="mdl-tabs__tab">สรุปแล้ว</a>
                                </div>
                                <div class="mdl-tabs__panel is-active" id="nosum-panel">
                                    <h5 class="uk-margin-top uk-heading-bullet">สรุปเยี่ยมบ้านที่ยังไม่สรุป</h5>
                                    <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                        <thead>
                                            <tr>
                                                <th>รูปภาพ</th>
                                                <th class="uk-table-link">
                                                    <a href="#" class="uk-button-text uk-text-bold" onclick="sortTable(1,'patient_own_closed','sort2')" id="sort2">
                                                        HN <span uk-icon="icon: arrow-up"></span>
                                                    </a>
                                                </th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ชื่อ-นามสกุล</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ครั้งที่เยี่ยม</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">วันเวลาเยี่ยม</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">สถานะ</a></th>
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
                                                $row['patient_visit_status'] = "ยังไม่ได้สรุป";
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
                                                    <a href="<?php echo "summary_view.php?hn=".$row['patient_hn']; ?>" class="uk-button-text text-green">
                                                        <?php echo $row['patient_p_name']." ".$row['patient_name']." ".$row['patient_surname']?>
                                                    </a>
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
                                                    <span class="th-label">สถานะ: </span>
                                                    <?php echo $row['patient_visit_status']?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo "summary_edit.php?hn=".$row['patient_hn']; ?>" class="uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                                <!--/#nosum-panel-->
                                <div class="mdl-tabs__panel" id="sum-panel">
                                    <h5 class="uk-margin-top uk-heading-bullet">สรุปเยี่ยมบ้านที่สรุปแล้ว</h5>
                                    <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                        <thead>
                                            <tr>
                                                <th>รูปภาพ</th>
                                                <th class="uk-table-link">
                                                    <a href="#" class="uk-button-text uk-text-bold" onclick="sortTable(1,'patient_own_closed','sort2')" id="sort2">
                                                        HN <span uk-icon="icon: arrow-up"></span>
                                                    </a>
                                                </th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ชื่อ-นามสกุล</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ครั้งที่เยี่ยม</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">วันเวลาเยี่ยม</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">สถานะ</a></th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $results = mysql_query("
                                                SELECT * FROM patientinfo 
                                                WHERE patient_doctor_owner = '$user' 
                                                AND patient_visit_status = 1
                                            ");
                                            while($row = mysql_fetch_array($results)) {
                                                $row['patient_visit_status'] = "สรุปบางส่วน";
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
                                                    <a href="<?php echo "summary_view.php?hn=".$row['patient_hn']; ?>" class="uk-button-text text-green">
                                                        <?php echo $row['patient_p_name']." ".$row['patient_name']." ".$row['patient_surname']?>
                                                    </a>
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
                                                    <span class="th-label">สถานะ: </span>
                                                    <?php echo $row['patient_visit_status']?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo "summary_edit.php?hn=".$row['patient_hn']; ?>" class="uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                                <!--/#sum-panel-->
                            </div>
                            <!--/.tabs-->

                        </div>
                    </div>
                    <!--/.mdl-card-->
                </div>
            </main>
        </div>

        <!--jquery-->
        <script src="js/jquery-3.1.1.min.js"></script>

        <!--js-->
        <script src="lib/mdl/material.min.js"></script>
        <script src="lib/uikit/js/uikit.min.js"></script>
    </body>

</html>