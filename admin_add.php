<!DOCTYPE html>
<html>

<?php
    include 'dropdown.php';
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
        <?php include "head.html"; ?>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "admin_header.html";?>

                <main class="mdl-layout__content mdl-color--grey-100">
                    <div class="mdl-grid demo-content">

                        <!--breadcrumb-->
                        <ul class="uk-breadcrumb breadcrumb">
                            <li><a href="#"><i class="material-icons breadcrumb-icons">account_circle</i> <?php echo $row['f_user']." ".$row['l_user']." (".$row['user'].")" ?></a></li>
                        </ul>

                            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                                    <h4 class="uk-heading-divider">ข้อมูลส่วนตัว</h4>
                                    <form class="uk-form-horizontal" method="post" action="admin_add_save.php" enctype="multipart/form-data">
                                        <div class="uk-margin">
                                            <label class="uk-form-label">รหัสประจำตัว</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                                <input class="uk-input uk-form-small" id="form-stacked-text" placeholder="" type="text" value="" name="user">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">ชื่อ</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <input class="uk-input uk-form-small" id="form-stacked-text" placeholder="" type="text" value="" name="f_user">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">นามสกุล</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <input class="uk-input uk-form-small" id="form-stacked-text" type="text" value="" placeholder="" name="l_user">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">ตำแหน่ง</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                            
                                            <select class="ui search dropdown" name="id_position" id="id_position">
                <option value="1">อาจารย์แพทย์</option>
                <option value="1">แพทย์ประจำบ้าน</option>
                <option value="1">แพทย์ประจำบ้านประจำเดือน</option>
                <option value="2">พยาบาลวิชาชีพ</option>
                <option value="2">นักศึกษาแพทย์</option>
                <option value="2">เจ้าหน้าที่ผู้เกี่ยวข้อง</option>
                <option value="0">ผู้ดูแลระบบ</option>
            </select>
                                            
                                            
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">รหัสผ่าน</label>
                                            <div class="uk-form-controls uk-form-controls-text">รหัสผ่านอัตโนมัติ คือรหัสประจำตัวของผู้ใช้</div>
                                        </div>
                                        <!--
                                    <div class="uk-margin">
                                        <label class="uk-form-label">รูปภาพผู้ใช้</label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                        </div>
                                    </div>
-->
                                        <input type="submit" class="uk-button uk-button-default button-green uk-align-right uk-margin-remove" value="บันทึก">
                                    </form>
                                </div>
                            </div>

                        
                    </div>
                    <!--/.mdl-grid demo-content-->
                </main>
        </div>
    </body>

</html>
