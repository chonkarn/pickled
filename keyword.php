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
    
    $keyword_data = mysql_query("SELECT * FROM icd10 ORDER BY icd10_id ASC LIMIT 20");
    $keyword_count = mysql_num_rows($keyword_data);
    
?>

    <head>
        <?php include "head.html"; ?>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html"; ?>

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">

                    <!--breadcrumb-->
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="#"><i class="material-icons breadcrumb-icons">format_list_numbered</i> จัดการรหัสของโรค</a></li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--112-col-desktop">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <h4 class="uk-heading-divider">ค้นหารหัสของโรคและอาการ (ICD-10)</h4>
                            <div class="uk-grid">
                                <div class="mdl-layout-spacer"></div>
                                <div class="ui icon input small">
                                    <input type="text" placeholder="ค้นหาด้วยรหัสหรือชื่อโรค...">
                                    <i class="circular search link icon"></i>
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
                                        <th class="uk-table-link"><a class="uk-button-text">รหัส</a></th>
                                        <th class="uk-table-link"><a class="uk-button-text">ชื่อโรคและอาการ</a></th>
                                        <th class="uk-table-link"><a class="uk-button-text">คีย์เวิร์ด</a></th>
                                        <th class="uk-table-link"><a class="uk-button-text">คีย์เวิร์ดของฉัน</a></th>
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
                                            <a href="<?php echo "keyword_edit.php?user=".$user."&icd10_id=".$row['icd10_id'] ?>" class="uk-button uk-button-text text-green"><span uk-icon="icon: pencil"></span></a>
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

        <!--table sort-->
        <script src="lib/tablesort/tablesort.js"></script>
        <script>
            $('table').tablesort()
        </script>
    </body>

</html>
