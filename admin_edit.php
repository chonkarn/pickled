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
    
        $myuser = $_GET['myuser'];
    $myquery = mysql_query("SELECT * FROM tbuser WHERE user = '$myuser'");
    $myrow = mysql_fetch_array($myquery);

?>

    <head>
        <?php include"head.html";?>
        <script>
        function chief_check(){
           if (document.getElementById("chief").checked == true){
               document.getElementById("chief_input").style.visibility = 'visible';
           }else {
               document.getElementById("chief_input").style.visibility = 'hidden';
           }
        }
            function validateForm() {
                var x = document.forms["myForm"]["newpwd"].value;
                var y = document.forms["myForm"]["newpwd2"].value;
                if (x != y) {
                    alert("รหัสผ่านไม่ตรงกัน");
                    return false;
                }
            }
        </script>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include"admin_header.html";
                include "id_position_2.php";?>

                <main class="mdl-layout__content mdl-color--grey-100">
                    <div class="mdl-grid demo-content">

                        <!--breadcrumb-->
                        <ul class="uk-breadcrumb breadcrumb">
                            <li><a href="#"><i class="material-icons breadcrumb-icons">account_circle</i> <?php echo $myrow['f_user']." ".$myrow['l_user']." (".$myrow['user'].")" ?></a></li>
                        </ul>
                            
                        <div class="demo-cards mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                                    <h4 class="uk-heading-divider">ข้อมูลส่วนตัว</h4>
                                    <form class="uk-form-horizontal" method="post" action="admin_edit_position.php" enctype="multipart/form-data">
                                        
                                        <div class="uk-margin">
                                            <label class="uk-form-label">ชื่อ</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <input class="uk-input uk-form-small" id="form-stacked-text" type="text" value="<?php echo $myrow["f_user"]; ?>" name="user_name">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">นามสกุล</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <input class="uk-input uk-form-small" id="form-stacked-text" type="text" value="<?php echo $myrow["l_user"]; ?>" name="user_lname">
                                                <input class="uk-input uk-form-small" id="form-stacked-text" type="text" value="<?php echo $myrow["user"]; ?>" name="user_id" style="visibility:hidden">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">ตำแหน่ง</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                            <select name="position_id">
                                            <?php 
                                            mysqli_data_seek($show,0);
                                            while ($print = mysqli_fetch_array($show)){
                                                echo '<option value='.$print["position_id"];
                                                if ($myrow["id_position"] == $print["position_id"]) echo " selected";
                                                echo ' >'.$print["position_name"].'</option>';
                                            }
                                            ?>
                                            </select>
                                            </div>
                                        </div>
                                        <?php 
                                        if ( $myrow["id_position"] == "1") {
                                            echo '<div class="uk-margin">'.
                                            '<label class="uk-form-label">ตำแหน่งพิเศษ</label>'.
                                            '<div class="uk-form-controls uk-form-controls-text"><input class="uk-checkbox" type="checkbox" id="chief" name="chief" value="1" onclick="chief_check()" ';
                                                if ($myrow["chief"] == 1 ) echo "checked";
                                                echo    '> '.
                                            'หัวหน้าแพทย์ประจำบ้าน'.
                                            '<div id="chief_input"';
                                                 if ($myrow["chief"] == 1 )    echo ' style="visibility:visible">';
                                            else echo ' style="visibility:hidden">';
                                                 echo   '<br>ประจำเดือน : <select name="chief_month" placeholder="โปรดระบุ" >'.
                                                '<option value=1';
                                                if ($myrow["chief_month"]==1) echo " selected";
                                                     echo '>มกราคม</option>'.
                                                '<option value=2';
                                                if ($myrow["chief_month"]==2) echo " selected";
                                                     echo '>กุมภาพันธ์</option>'.
                                                '<option value=3';
                                                if ($myrow["chief_month"]==3) echo " selected";
                                                     echo '>มีนาคม</option>'.
                                                '<option value=4';
                                                if ($myrow["chief_month"]==4) echo " selected";
                                                     echo '>เมษายน</option>'.
                                                '<option value=5';
                                                if ($myrow["chief_month"]==5) echo " selected";
                                                     echo '>พฤษภาคม</option>'.
                                                '<option value=6';
                                                if ($myrow["chief_month"]==6) echo " selected";
                                                     echo '>มิถุนายน</option>'.
                                                '<option value=7';
                                                if ($myrow["chief_month"]==7) echo " selected";
                                                     echo '>กรกฎาคม</option>'.
                                                '<option value=8';
                                                if ($myrow["chief_month"]==8) echo " selected";
                                                     echo '>สิงหาคม</option>'.
                                                '<option value=9';
                                                if ($myrow["chief_month"]==9) echo " selected";
                                                     echo '>กันยายน</option>'.
                                                '<option value=10';
                                                if ($myrow["chief_month"]==10) echo " selected";
                                                     echo '>ตุลาคม</option>'.
                                                '<option value=11';
                                                if ($myrow["chief_month"]==11) echo " selected";
                                                     echo '>พฤศจิกายน</option>'.
                                                '<option value=12';
                                                if ($myrow["chief_month"]==12) echo " selected";
                                                     echo '>ธันวาคม</option>'.
                                            '</select>'.
                                                '<br>ประจำปี : <select name="chief_year">'.
                                                '<option value=2016';
                                                if ($myrow["chief_year"]==2016) echo " selected";
                                                     echo '>2559</option>'.
                                                '<option value=2017';
                                                if ($myrow["chief_year"]==2017) echo " selected";
                                                     echo '>2560</option>'.
                                                '<option value=2018';
                                                if ($myrow["chief_year"]==2018) echo " selected";
                                                     echo '>2561</option>'.
                                                '</select>'.
                                                '</div>'.
                                            '</div></div>';
                                        }
                                        ?>
                                        <input type="submit" class="uk-button uk-button-default button-green uk-align-right uk-margin-remove" value="บันทึก">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/.demo-cards-->

                        <div class="demo-cards mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                                    <form name="myForm" onsubmit="return validateForm()" class="uk-form-horizontal" method="post" action="admin_change_pwd.php">
                                        <h4 id="pwd" class="uk-heading-divider">รหัสผ่าน</h4>
                                        <h5 class="uk-heading-bullet uk-margin-small">เปลี่ยนรหัสผ่าน</h5>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">รหัสผ่านใหม่</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <input class="uk-input uk-form-small" id="form-stacked-text" type="password" name="newpwd" placeholder="พิมพ์รหัสผ่านใหม่">
<!--                                                <small>อย่างน้อย 6 ตัวอักขระ</small>-->
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">ยืนยันรหัสผ่านใหม่</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <input class="uk-input uk-form-small" id="form-stacked-text" type="password" name="newpwd2" placeholder="พิมพ์รหัสผ่านใหม่อีกครั้ง"> </div>
                                        </div>

                                           <input class="uk-input uk-form-small" id="form-stacked-text" type="text" value="<?php echo $myrow["user"]; ?>" name="user_id" style="visibility:hidden">
                                            
                                            <input type="submit" class="uk-button uk-button-default button-green uk-align-right uk-margin-remove" value="บันทึก">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="demo-cards mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                                <div class="mdl-card__supporting-text mdl-color-text--grey-1200">
                                    <form name="myForm" onsubmit="return validateForm()" class="uk-form-horizontal" method="post" action="admin_change_pwd.php">
                                        <h4 id="pwd" class="uk-heading-divider">รหัสผ่าน</h4>
                                        <h5 class="uk-heading-bullet uk-margin-small">เปลี่ยนรหัสผ่าน</h5>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">รหัสผ่านใหม่</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <input class="uk-input uk-form-small" id="form-stacked-text" type="password" name="newpwd" placeholder="พิมพ์รหัสผ่านใหม่">
<!--                                                <small>อย่างน้อย 6 ตัวอักขระ</small>-->
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">ยืนยันรหัสผ่านใหม่</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <input class="uk-input uk-form-small" id="form-stacked-text" type="password" name="newpwd2" placeholder="พิมพ์รหัสผ่านใหม่อีกครั้ง"> </div>
                                        </div>

                                           <input class="uk-input uk-form-small" id="form-stacked-text" type="text" value="<?php echo $myrow["user"]; ?>" name="user_id" style="visibility:hidden">
                                            
                                            <input type="submit" class="uk-button uk-button-default button-green uk-align-right uk-margin-remove" value="บันทึก">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/.demo-cards-->
                    </div>
                    <!--/.mdl-grid demo-content-->
                </main>
        </div>
    </body>

</html>
