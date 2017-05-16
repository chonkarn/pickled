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

            <?php include "header.html"; ?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="#"><i class="material-icons breadcrumb-icons">account_circle</i> จัดการรหัสของโรค</a></li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--112-col-desktop">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <h4 class="uk-heading-divider">ค้นหารหัสของโรคและอาการ (ICD-10)</h4>
                            <div class="mdl-grid">
                                <div class="mdl-layout-spacer"></div>
                                <div class="ui category search">
                                    <div class="ui icon input">
                                        <input class="prompt" type="text" placeholder="ค้นหารหัส หรือ ชื่อโรค...">
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
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--green">
                                <i class="material-icons">add</i></button>
                            </a>
                        </div>

                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <h5 class="uk-margin-top uk-heading-bullet">รหัสของโรคและอาการ (ICD-10)</h5>
                            <table class="uk-table uk-table-responsive uk-table-divider uk-table-hover uk-table-justify uk-table-middle uk-table-small">
                                <thead>
                                    <tr>
                                        <th class="uk-table-link"><a href="#" class="uk-button-text">ID <span uk-icon="icon: arrow-down"></span></a></th>
                                        <th class="uk-table-link"><a href="#" class="uk-button-text">Name</a></th>
                                        <th class="uk-table-link"><a href="#" class="uk-button-text">Keyword </a></th>
                                        <th class="uk-table-link"><a href="#" class="uk-button-text">My keyword</a></th>
                                        <th>แก้ไข</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row = mysql_fetch_array($keyword_data)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <span class="th-label">ID: </span>
                                            <?php echo $row['icd10_id'] ?>
                                        </td>
                                        <td>
                                            <span class="th-label">Name: </span>
                                            <?php echo $row['icd10_name'] ?>
                                        </td>
                                        <td>
                                            <span class="th-label">Keyword: </span>
                                            <a href="#" class="uk-button uk-button-text text-green">
                                                <?php echo $row['icd10_keyword'] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="th-label">My Keyword: </span>
                                            <?php echo $row['icd10_keyword'] ?>
                                        </td>
                                        <td>
                                            <a href="#" class="uk-button uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
