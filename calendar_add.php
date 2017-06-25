<!DOCTYPE html>
<html>
<?php
	session_start();
	if($_SESSION['id'] == "")
	{
		header( "location:login.php");
		exit();
	}
    mysql_connect("localhost", "hvmsdb","1234") or die(mysql_error());
mysql_select_db("homevisit") or die(mysql_error());
?>

    <head>

				<?php include "head.html"; ?>

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
                        <li><a href="calendar.php" class="uk-button uk-button-text"><i class="material-icons breadcrumb-icons">date_range</i>ปฏิทินนัดหมาย</a></li>
                        <li>เพิ่มนัดหมาย</li>
                    </ul>

                    <div id="content" class="mdl-shadow--2dp">
                        <h4 class="uk-heading-divider">เพิ่มนัดหมาย</h4>
                        <form class="uk-form-horizontal" action="calendar_add_db.php" method="get">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-horizontal-text">ชื่อผู้ป่วย</label>
                                <div class="uk-form-controls">
                                   <?php
                                        $med = $_SESSION['id'];
                                        $position = $_SESSION["position"];
                                        if ($position == 2) $query = "SELECT patient_hn,patient_p_name,patient_name,patient_surname FROM patientinfo ORDER BY patient_hn DESC ";
                                        else $query = "SELECT patient_hn,patient_p_name,patient_name,patient_surname FROM patientinfo WHERE patient_doctor_owner=$med ORDER BY patient_hn DESC ";
                                        $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                        ?>

                                        <select name="patient" class="ui search selection dropdown" id="select-patient">
                                        <?php
                                        while ($row = mysql_fetch_array($result))
                                        {
                                            echo "<option value='".$row['patient_hn']."'>".$row['patient_p_name'].$row['patient_name']." ".$row['patient_surname']." (HN ".$row['patient_hn'].")"."</option>";
                                        }
                                    ?>
                                        </select>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-horizontal-select">วันที่เยี่ยม</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input uk-width-medium" type="date" name="datepicker" value="<?php echo $_GET['date'];?>">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <div class="uk-form-label">ช่วงเวลา</div>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <label><input class="uk-radio" type="radio" name="visit-time" value="0" checked> เช้า (9.00-12.00 น)</label>
                                    <div class="uk-margin-small"><label><input class="uk-radio " type="radio" name="visit-time" value="1"> บ่าย (13.00-16.00 น)</label></div>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-horizontal-text">แพทย์เยี่ยมบ้าน</label>



                                <div class="uk-form-controls">
                                    <?php
                                        $q = "SELECT user,f_user,l_user FROM tbuser ORDER BY user DESC ";
                                        $r = mysql_query($q) or die(mysql_error()."[".$q."]");
                                        ?>

                                        <select name="doctor[]" class="ui search multiple selection dropdown" multiple="" id="select-doctor">
																					<<option value="">พิมพ์ชื่อ-นามสกุล หรือรหัสประจำตัว</option>
                                        <?php
                                        while ($ro = mysql_fetch_array($r))
                                        {
                                            echo "<option value='".$ro['user']."'>".$ro['f_user']." ".$ro['l_user']." (".$ro['user'].")"."</option>";
                                        }
                                    ?>
                                        </select>
                                </div>
                            </div>
														<div class="uk-text-right">
																<button type="submit" class="uk-button uk-button-default button-green">บันทึก</button>
														</div>
                            <!-- <div class="uk-text-right">
                                <button>บันทึก </button>
                            </div> -->
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
                fullTextSearch: 'exact'
            });

    </script>

</html>
