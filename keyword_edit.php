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
    
    $keyword_data = mysql_query("SELECT * FROM icd10 ORDER BY icd10_id ASC LIMIT 10 OFFSET 15");
    $keyword_count = mysql_num_rows($keyword_data);
    
?>

    <head>
        <?php include 'head.html' ?>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html" ?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="keyword.php" class="uk-button-text"><i class="material-icons breadcrumb-icons">format_list_numbered</i> จัดการรหัสของโรค</a></li>
                        <li><a href="#">แก้ไขรหัสของโรค</a></li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--112-col-desktop">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <h4 class="uk-heading-divider">แก้ไขคีย์เวิร์ด</h4>
                            <form class="uk-form-horizontal">
                                <div class="uk-margin">
                                    <label class="uk-form-label">ชื่อโรคและอาการ</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <input class="uk-input uk-form-small uk-width-1-2" id="form-stacked-text" type="text" value="A029 Salmonella infection, unspecified" name="icd10_name">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">คีย์เวิร์ดของฉัน</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <input class="uk-input uk-form-small uk-form-small uk-width-1-2" id="form-stacked-text" type="text" value="" name="icd10_mykeyword">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">คีย์เวิร์ด</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <input class="uk-input uk-form-small uk-form-small uk-width-1-2" id="form-stacked-text" type="text" value="" name="icd10_keyword">
                                        <p class="uk-text-small">สำหรับผู้ใช้ทุกคนในระบบสามารถเรียกใช้ด้วยคีย์เวิร์ดนี้ได้</p>
                                    </div>
                                </div>
                                <div class="uk-text-right">
                                    <button type="submit" class="uk-button uk-button-default button-green">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>

</html>
