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
        <script>
        function position_check(){
            if(document.getElementById("position_id").value === "1") {
                document.getElementById("test").style.visibility = 'visible';
            }
            else {
                document.getElementById("test").style.visibility = 'hidden';
            }
        }
            function chief_check(){
           if (document.getElementById("chief").checked == true){
               document.getElementById("chief_input").style.visibility = 'visible';
           }else {
               document.getElementById("chief_input").style.visibility = 'hidden';
           }
        }
        </script>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "admin_header.html";?>

                <main class="mdl-layout__content mdl-color--grey-100">
                    <div class="mdl-grid demo-content">

                        <!--breadcrumb-->
                        <ul class="uk-breadcrumb breadcrumb">
                            <li><a href="#"><i class="material-icons breadcrumb-icons">account_circle</i> เพิ่มผู้ใช้งานใหม่</a></li>
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
                                            <select id="position_id" name="id_position" onchange="position_check()">
                                            <?php 
                                            $qq = "SELECT * from tbuser_position ";
                                            $link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");
                                            mysqli_query($link,"SET NAMES UTF8");
                                            mysqli_query($link,"SET character_set_results=utf8");
                                            mysqli_query($link,"SET character_set_client=utf8");
                                            mysqli_query($link,"SET character_set_connection=utf8");
                                            $show = mysqli_query($link,$qq);
                                            while ($print = mysqli_fetch_array($show)){
                                                echo '<option value='.$print["position_id"].' >'.$print["position_name"].'</option>';
                                            }
                                            ?>
                                            </select>
                                                <div id="test" style="visibility:hidden" >
                                                 <label class="uk-form-label">ตำแหน่งพิเศษ</label>
                                                    <input class="uk-checkbox" type="checkbox" id="chief" name="chief" value="1" onclick="chief_check()"> หัวหน้าแพทย์ประจำบ้าน
                                                    <div id="chief_input" style="visibility:hidden">
                                                    ประจำเดือน : <select name="chief_month">
                                                        <option value="1">มกราคม</option>
                                                        <option value="2">มิถุนายน</option>
                                                        <option value="3">พฤษภาคม</option>
                                                        <option value="4">เมษายน</option>
                                                        <option value="5">พฤษภาคม</option>
                                                        <option value="6">มิถุนายน</option>
                                                        <option value="7">กรกฎาคม</option>
                                                        <option value="8">สิงหาคม</option>
                                                        <option value="9">กันยายน</option>
                                                        <option value="10">ตุลาคม</option>
                                                        <option value="11">พฤศจิกายน</option>
                                                        <option value="12">ธันวาคม</option>
                                                    </select>
                                                        ประจำปี : <select name="chief_year">
                                                        <option value="2016">2559</option>
                                                        <option value="2017">2560</option>
                                                        <option value="2018">2561</option>
                                                    </select>
                                                    </div>
                                                </div>
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
