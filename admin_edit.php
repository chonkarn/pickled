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
    include 'db.php';
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

        <!--jquery-->
        <script src="lib/jquery/jquery-3.1.1.min.js"></script>

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
            
            <?php include"admin_header.html";?>
            
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="#"><i class="material-icons breadcrumb-icons">account_circle</i> <?php echo $row['f_user']." ".$row['l_user']." (".$row['user'].")" ?></a></li>
                    </ul>

                    <div class="demo-cards mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                        <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                                <h4 class="uk-heading-divider">ข้อมูลส่วนตัว</h4>
                                <form class="uk-form-horizontal" method="post" action="user_profile_save_nl.php" enctype="multipart/form-data">
                                   
                                    <div class="uk-margin">
                                        <label class="uk-form-label">คำนำหน้า</label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input class="uk-input uk-form-small" id="form-stacked-text" type="text" value="<?php echo $row["f_user"]; ?>" name="user_name">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">ชื่อ</label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input class="uk-input uk-form-small" id="form-stacked-text" type="text" value="<?php echo $row["f_user"]; ?>" name="user_name">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">นามสกุล</label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input class="uk-input uk-form-small" id="form-stacked-text" type="text" value="<?php echo $row["l_user"]; ?>" name="user_lname">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">ตำแหน่ง</label>
                                        <div class="uk-form-controls uk-form-controls-text">แพทย์ประจำบ้าน</div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">รูปภาพผู้ใช้</label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                        </div>
                                    </div>
                                    <input type="submit" class="uk-button uk-button-default button-green uk-align-right uk-margin-remove" value="บันทึก">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--/.demo-cards-->

                    <div class="demo-cards mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                        <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                                <form class="uk-form-horizontal" method="post" action="user_profile_pwd.php">
                                    <h4 id="pwd" class="uk-heading-divider">รหัสผ่าน</h4>
                                    <h5 class="uk-heading-bullet uk-margin-small">เปลี่ยนรหัสผ่าน</h5><div class="uk-margin">
                                        <label class="uk-form-label">รหัสผ่านเดิม</label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input class="uk-input uk-form-small" id="form-stacked-text" type="password" value="" placeholder="พิมพ์รหัสผ่านเดิม"> </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">รหัสผ่านใหม่</label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input class="uk-input uk-form-small" id="form-stacked-text" type="password" name="newpwd" placeholder="พิมพ์รหัสผ่านใหม่"> 
                                            <small>อย่างน้อย 6 ตัวอักขระ</small> 
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">ยืนยันรหัสผ่านใหม่</label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <input class="uk-input uk-form-small" id="form-stacked-text" type="password" name="newpwd2" placeholder="พิมพ์รหัสผ่านใหม่อีกครั้ง"> </div>
                                    </div>
                                    
                                    <h5 class="uk-heading-bullet uk-margin-small">คำถามเพื่อรีเซตรหัสผ่าน</h5>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">คำถาม</label>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <select class="uk-input uk-form-small" id="question" name="question" type="text" placeholder="คำถาม"> 
                                                <?php droptext("txt/question.txt"); ?>
                                            </select>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label">คำตอบ</label>
                                            <div class="uk-form-controls uk-form-controls-text">
                                                <input class="uk-input uk-form-small" id="answer" name="answer" type="text" value="<?php echo $row["answer"]; ?>"> </div>
                                        </div>
                                        <a href="index.php" class="uk-button uk-button-default button-green uk-align-right uk-margin-remove">บันทึก</a>
                                    </div>
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