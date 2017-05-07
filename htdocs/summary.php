<!DOCTYPE html>
<html>
<?php
	session_start();
	if($_SESSION['id'] == "")
	{
		header( "location:login.php");
		exit();
	}
    ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>

    <!--mdl-->
    <link rel="stylesheet" href="lib/mdl/material.min.css">
    <link rel="stylesheet" href="lib/mdl-template-dashboard/styles.css">

    <!--uikit-->
    <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">

    <!--icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--custom css-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
</head>

<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <?php include"header.html";?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">

                <ul class="uk-breadcrumb breadcrumb">
                    <li><span href="#"></span><i class="material-icons breadcrumb-icons">assignment</i> สรุปเยี่ยมบ้าน</li>
                </ul>

                <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell--12-col mdl-cell mdl-cell--12-col-tablet mdl-cell--112-col-desktop">
                    <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">

                        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                            <div class="mdl-tabs__tab-bar">
                                <a href="#nosum-panel" class="mdl-tabs__tab is-active">ยังไม่สรุป</a>
                                <a href="#sum-panel" class="mdl-tabs__tab">สรุปแล้ว</a>
                            </div>
                            <!--/.mdl-tabs__tab-bar-->
                            <div class="mdl-tabs__panel is-active" id="nosum-panel">
                                <h5 class="uk-margin-top">สรุปเยี่ยมบ้านที่ยังไม่สรุป</h5>
                                <table class="mdl-data-table mdl-js-data-table mdl-cell--12-col">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__header--sorted-ascending">HN</th>
                                            <th class="mdl-data-table__cell--non-numeric">ชื่อ-นามสกุล</th>
                                            <th class="mdl-data-table__cell--non-numeric">วันเวลาเยี่ยม</th>
                                            <th>ครั้งที่เยี่ยม</th>
                                            <th>สถานะ</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>5987452</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="summary_check.php">นาง เพียรจิต จงใจรักษ์</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>5</td>
                                            <td>ยังไม่ได้สรุป</td>

                                            <td><a href="summary_check.php"><i class="material-icons">edit</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>6215845</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย รุ่งโรจน์ เรืองรอง</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>4</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>8963215</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย วิบูรณ์ ธนโชติไพศาล</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>6</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>4987521</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาง เพียรจิต จงใจรักษ์</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>5</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>5874158</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย เหมันต์ ธนไพบูรณ์</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>6</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>5965485</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาง รุ่งทิพย์ ก่อเกียรติ</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>3</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>6158489</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาง ชญานิศ พลฑา</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>7</td>
                                            <td>สรุปบางส่วน</td>

                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>6258459</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย ชัชพิสิทธิ์ กาวิโล</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/6/2559 (บ่าย)</td>
                                            <td>8</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>7854485</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาง วิยดา เครื่องดี</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">5/8/2560 (เช้า)</td>
                                            <td>6</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>8512365</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย ธนโชติ  มหาทรัพย์</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">5/8/2560 (เช้า)</td>
                                            <td>9</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/#nosum-panel-->
                            <div class="mdl-tabs__panel" id="sum-panel">
                                <h5 class="uk-margin-top">สรุปเยี่ยมบ้านที่สรุปแล้ว</h5>
                                <table class="mdl-data-table mdl-js-data-table mdl-cell--12-col">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__header--sorted-ascending">HN</th>
                                            <th class="mdl-data-table__cell--non-numeric">ชื่อ-นามสกุล</th>
                                            <th class="mdl-data-table__cell--non-numeric">วันเวลาเยี่ยม</th>
                                            <th>ครั้งที่เยี่ยม</th>
                                            <th>สถานะ</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>5987452</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="patient_5987452.html">นาง มาลิณี เกียรติขจร</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>5</td>
                                            <td>ยังไม่ได้สรุป</td>

                                            <td><a href="patient_edit_5987452.html"><i class="material-icons">edit</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>6215845</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย รุ่งโรจน์ เรืองรอง</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>4</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>8963215</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย วิบูรณ์ ธนโชติไพศาล</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>6</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>4987521</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาง เพียรจิต จงใจรักษ์</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>5</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>5874158</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย เหมันต์ ธนไพบูรณ์</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>6</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>5965485</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาง รุ่งทิพย์ ก่อเกียรติ</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>3</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>6158489</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาง ชญานิศ พลฑา</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/7/2560 (เช้า)</td>
                                            <td>7</td>
                                            <td>สรุปบางส่วน</td>

                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>6258459</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย ชัชพิสิทธิ์ กาวิโล</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">12/6/2559 (บ่าย)</td>
                                            <td>8</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>7854485</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาง วิยดา เครื่องดี</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">5/8/2560 (เช้า)</td>
                                            <td>6</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                        <tr>
                                            <td>8512365</td>
                                            <td class="mdl-data-table__cell--non-numeric"><a href="#">นาย ธนโชติ  มหาทรัพย์</a></td>
                                            <td class="mdl-data-table__cell--non-numeric">5/8/2560 (เช้า)</td>
                                            <td>9</td>
                                            <td>สรุปบางส่วน</td>
                                            <td><i class="material-icons">edit</i></td>
                                        </tr>
                                    </tbody>
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