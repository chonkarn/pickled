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
        <?php include "head.html"; ?>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html"; ?>

                <main class="mdl-layout__content mdl-color--grey-100 ">
                    <div class="mdl-grid demo-content">

                        <!--BREADCRUMB-->
                        <ul class="uk-breadcrumb breadcrumb">
                            <li><span href="#"></span><i class="material-icons breadcrumb-icons">home</i> หน้าหลัก</li>
                        </ul>

                        <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">

                            <!--CARD-MENU-->
                            <div class="mdl-card__menu">
                                <a href="patient_checkhn.php" title="เพิ่มผู้ป่วยใหม่" uk-tooltip>
                                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--green"><i class="material-icons">add</i></button>
                                </a>
                            </div>

                            <!--CARD-SUPPORTING-TEXT-->
                            <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                                <h4>ผู้ป่วยเยี่ยมบ้านใหม่ที่อยู่ในความดูแล</h4>
                                <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                    <thead>
                                        <tr>
                                            <th class="uk-table-link"><a href="#" class="uk-button-text">HN</a></th>
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
                                                    AND (patient_visit_status = 1)
                                                ");

                                                while($row = mysql_fetch_array($results)) {
                                                    if ($row['patient_visit_status'] == 1)
                                                        $row['patient_visit_status'] = "ใหม่" ;
                                            ?>
                                            <tr>
                                                <td>
                                                    <span class="th-label">HN: </span>
                                                    <?php echo $row['patient_hn']?>
                                                </td>
                                                <td>
                                                    <span class="th-label">ชื่อ-นามสกุล: </span>
                                                    <a href="<?php echo "patient_profile.php?hn=".$row['patient_hn']; ?>">
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
                                                    <?php echo $row['last_visit_date']?>
                                                </td>
                                                <td>
                                                    <span class="th-label">เยี่ยมครั้งต่อไป: </span>
                                                    <?php echo $row['next_visit_date']?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo " patient_form.php?hn=".$row['patient_hn'] ?>" class="uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mdl-card__actions mdl-card--border uk-text-right">
                                <a href="patient.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--green">ดูผู้ป่วยทั้งหมด</a>
                            </div>
                        </div>

                        <div class="mdl-cell mdl-cell--4-col mdl-grid mdl-grid--no-spacing">
                            <div class=" demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                                <div class="mdl-card__supporting-text mdl-color-text--grey-900">
                                    <h4>นัดหมายเยี่ยมบ้านสัปดาห์นี้</h4>
                                    <h5 class="uk-heading-bullet uk-margin-small">วันนี้</h5>
                                    <ul class="uk-list uk-list-divider">
                                        <li>ไม่มีนัดหมาย</li>
                                    </ul>
                                    <h5 class="uk-heading-bullet uk-margin-small">พรุ่งนี้</h5>
                                    <ul class="uk-list uk-list-divider">
                                        <li>ภาคเช้า นาง พรพิมล วงศ์ศรัทธา</li>
                                        <li>ภาคเช้า นาย เหมันต์ ธนไพบูรณ์</li>
                                    </ul>
                                    <h5 class="uk-heading-bullet uk-margin-small">สัปดาห์นี้</h5>
                                    <ul class="uk-list uk-list-divider">
                                        <li>ไม่มีนัดหมาย</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="demo-cards mdl-cell mdl-cell--8-col mdl-grid mdl-grid--no-spacing">
                            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                                <div class="mdl-card__supporting-text mdl-color-text--grey-900">
                                    <h4>สรุปเยี่ยมบ้านที่ยังไม่สรุป</h4>
                                    <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                        <thead>
                                            <tr>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">HN</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ชื่อ-นามสกุล</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">เยี่ยมครั้งล่าสุด</a></th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $results = mysql_query("
                                                SELECT * FROM summary
                                                INNER JOIN patientinfo ON summary.patient_hn = patientinfo.patient_hn

                                            ");

                                            while($row = mysql_fetch_array($results)) {
                                               $row['summary_status'] = "ยังไม่ได้สรุป";
                                        ?>
                                            <tr>
                                                <td>
                                                    <span class="th-label">HN: </span>
                                                    <?php echo $row['patient_hn']?>
                                                </td>
                                                <td>
                                                    <span class="th-label">ชื่อ-นามสกุล: </span>
                                                    <a href="#">
                                                        <?php echo $row['patient_p_name']." ".$row['patient_name']." ".$row['patient_surname']?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="th-label">วันที่เยี่ยมบ้าน: </span>
                                                    <?php echo $row['last_visit_date']?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo "summary_form.php?hn=".$row['patient_hn']."&calendar_id=".$row['calendar_id']; ?>" class="uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                                <div class="mdl-card__actions mdl-card--border uk-text-right">
                                    <a href="summary.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--green">ดูสรุปทั้งหมด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        </div>

        <!--table sort-->
        <script src="lib/tablesort/tablesort.js"></script>
        <script>
            $('table').tablesort()

        </script>

    </body>

</html>
