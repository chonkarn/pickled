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

        <!--datepicker-->
<!--
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
-->
        <link rel="stylesheet" href="lib/jquery-ui/jquery-ui.min.css">
        <script src="lib/jquery-ui/jquery-ui.min.js"></script>
        <script>
            $(function() {
                $("#datepicker").datepicker();
                $("#datepicker").datepicker("option", "dateFormat", "DDที่ d MM yy");
            });

        </script>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <?php include "header.html"; ?>
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="calendar.html" class="uk-button uk-button-text"><i class="material-icons breadcrumb-icons">date_range</i>ปฏิทินนัดหมาย</a></li>
                        <li>เพิ่มนัดหมาย</li>
                    </ul>

                    <div id="content" class="mdl-shadow--2dp">
                        <h4 class="uk-heading-divider">เพิ่มนัดหมาย</h4>
                        <form class="uk-form-horizontal">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-horizontal-text">ชื่อผู้ป่วย</label>
                                <div class="uk-form-controls">
                                    <select name="patient" class="ui search selection dropdown" id="select-patient">
                                        <option value="">พิมพ์รหัส / ชื่อ-นามสกุล</option>
                                        <option value="5987452">นาง มาลิณี เกียรติขจร (HN 5987452)</option>
                                        <option value="6215845">นาย รุ่งโรจน์ เรืองรอง (HN 6215845)</option>
                                        <option value="8963215">นาย วิบูรณ์ ธนโชติไพศาล (HN 8963215)</option>
                                        <option value="4987521">นาง เพียรจิต จงใจรักษ์ (HN 4987521)</option>
                                        <option value="5874158">นาย เหมันต์ ธนไพบูรณ์ (HN 5874158)</option>
                                        <option value="5965485">นาง รุ่งทิพย์ ก่อเกียรติ (HN 5965485)</option>
                                        <option value="6158489">นาง ชญานิศ พลฑา (HN 6158489)</option>
                                        <option value="6258459">นาย ชัชพิสิทธิ์ กาวิโล (HN 6258459)</option>
                                    </select>
                                    <!--
                                        <input list="patient" class="uk-input uk-width-medium uk-form-small" placeholder="พิมพ์รหัส / ชื่อ-นามสกุล">
                                        <datalist id="patient">
                                            <option value="นาย ชัชพิสิทธิ์ กาวิโล" /> 6258459
                                        </datalist>
                                    -->
                                    <a class=" uk-icon-button" href="calendar_add_patient.html">
                                        <span uk-icon="icon: list; ratio: 1"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-horizontal-select">วันที่เยี่ยม</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input uk-width-medium" type="text" id="datepicker">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <div class="uk-form-label">ช่วงเวลา</div>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <label><input class="uk-radio" type="radio" name="visit-time" checked> เช้า (9.00-12.00 น)</label>
                                    <div class="uk-margin-small"><label><input class="uk-radio " type="radio" name="visit-time"> บ่าย (13.00-16.00 น)</label></div>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-horizontal-text">แพทย์เยี่ยมบ้าน</label>
                                <div class="uk-form-controls">
                                    <select name="doctor" class="ui search multiple selection dropdown" multiple="" id="select-doctor">
                                    <option value="">พิมพ์รหัส / ชื่อ-นามสกุล</option>
                                    <option value="012568">นพ.ประสงค์ ทรงธรรม (012568)</option>
                                    <option value="013654">นพ.นพดล ชลธาร (013654)</option>
                                    <option value="016325">นพ.คชสร อมรรัตน์ (016325)</option>
                                    <option value="014251">พญ.รัตนา พานิชญ์ (014251)</option>
                                    <option value="013212">นญ.วิภาวรรณ ใจสุทธิ์ (013212)</option>
                                    <option value="013625">นพ.ชลธร รุ่งเจริญ (013625)</option>
                                </select>
                                    <a class=" uk-icon-button" href="calendar_add_doctor.html">
                                        <span uk-icon="icon: list; ratio: 1"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="uk-text-right">
                                <a href="calendar.html" class="uk-button uk-button-default button-green">บันทึก</a>
                            </div>
                        </form>
                    </div>
                    <!--/#content-->
                </div>
                <!--/.demo-content-->
            </main>
        </div>

    </body>
    <script>
        $('#select-patient')
            .dropdown({
                match: 'both',
                placeholder: 'auto',
                selectOnKeydown: 'true',
                keepOnScreen: 'true',
                allowTab: 'true',
                showOnFocus: 'true',
                fullTextSearch: 'exact',
            });

        $('#select-doctor')
            .dropdown({
                match: 'both',
                placeholder: 'auto',
                selectOnKeydown: 'true',
                keepOnScreen: 'true',
                allowTab: 'true',
                showOnFocus: 'true',
                fullTextSearch: 'exact',
            });

    </script>

</html>
