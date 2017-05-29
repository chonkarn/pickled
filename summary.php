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
    $connect = mysql_connect($servername, $username, $password) or die(mysql_error());
    mysql_select_db($dbname) or die(mysql_error());
    mysql_query("set character set utf8");  
?>

    <head>
        <?php include"head.html"; ?>
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

                                <!--#NOSUM-PANEL-->
                                <div class="mdl-tabs__panel is-active" id="nosum-panel">
                                    <h5 class="uk-margin-top uk-heading-bullet">สรุปเยี่ยมบ้านที่ยังไม่สรุป</h5>
                                    <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                        <thead>
                                            <tr>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">HN <span uk-icon="icon: arrow-up"></span></a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ชื่อ-นามสกุล</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ครั้งที่เยี่ยม</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">วันเวลาเยี่ยม</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">สถานะ</a></th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>

                                        <!--                 
                                            0 คือยังไม่สรุป - ไปที่หน้า summary_check.php
                                            1 คือสรุปบางส่วน - ไปที่หน้า summary_form.php
                                            2 คือสรุปเสร็จแล้ว
                                        -->

                                        <?php
                                            $results1 = mysql_query("
                                                SELECT * FROM summary 
                                                INNER JOIN patientinfo ON summary.patient_hn = patientinfo.patient_hn
                                                WHERE summary.summary_edit_status BETWEEN 1 AND 2
                                                ORDER BY calendar_id ASC;
                                            ");
                                        
                                            while($row = mysql_fetch_array($results1)) {
                                                if($row['summary_edit_status'] == 1){
                                                    $row['summary_edit_status'] = "ยังไม่ได้สรุป";
                                                }
                                                else if($row['summary_edit_status'] == 2){
                                                    $row['summary_edit_status'] = "สรุปบางส่วน";
                                                }
                                                
                                        ?>
                                            <tr>
                                                <td>
                                                    <span class="th-label">HN: </span>
                                                    <?php echo $row['patient_hn']?>
                                                </td>
                                                <td>
                                                    <span class="th-label">ชื่อ-นามสกุล: </span>
                                                    <a href="<?php echo "summary_view.php?hn=".$row['patient_hn']."&calendar_id=".$row['calendar_id']; ?>" class="uk-button-text text-green">
                                                        <?php echo $row['patient_pname']." ".$row['patient_fname']." ".$row['patient_lname']?>
                                                    </a>
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
                                                    <span class="th-label">สถานะกรอกข้อมูล: </span>
                                                    <?php echo $row['summary_edit_status']?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo "summary_form.php?hn=".$row['patient_hn']."&calendar_id=".$row['calendar_id']; ?>" class="uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                                <!--/#nosum-panel-->

                                <!--#SUM-PANEL-->
                                <div class="mdl-tabs__panel" id="sum-panel">
                                    <h5 class="uk-margin-top uk-heading-bullet">สรุปเยี่ยมบ้านที่สรุปแล้ว</h5>
                                    <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                        <thead>
                                            <tr>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">HN <span uk-icon="icon: arrow-up"></span></a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ชื่อ-นามสกุล</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">ครั้งที่เยี่ยม</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">วันเวลาเยี่ยม</a></th>
                                                <th class="uk-table-link"><a href="#" class="uk-button-text">สถานะ</a></th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $results2 = mysql_query("
                                                SELECT * FROM summary 
                                                INNER JOIN patientinfo ON summary.patient_hn = patientinfo.patient_hn
                                                WHERE summary.summary_edit_status = 3
                                                ORDER BY calendar_id ASC;
                                            ");
                                        
                                            while($row = mysql_fetch_array($results2)) {
                                                if($row['summary_edit_status'] == 3){
                                                    $row['summary_edit_status'] = "สรุปแล้ว";
                                                }
                                        ?>
                                            <tr>
                                                <td>
                                                    <span class="th-label">HN: </span>
                                                    <?php echo $row['patient_hn']?>
                                                </td>
                                                <td>
                                                    <span class="th-label">ชื่อ-นามสกุล: </span>
                                                    <a href="<?php echo " summary_form.php?hn=".$row['patient_hn']." &calendar_id=".$row['calendar_id']; ?>" class="uk-button-text text-green">
                                                        <?php echo $row['patient_pname']." ".$row['patient_fname']." ".$row['patient_lname']?>
                                                    </a>
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
                                                    <span class="th-label">สถานะกรอกข้อมูล: </span>
                                                    <?php echo $row['summary_edit_status']?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo " summary_form.php?hn=".$row['patient_hn']." &calendar_id=".$row['calendar_id']; ?>" class="uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
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
    </body>

</html>
