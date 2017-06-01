<!DOCTYPE html>
<html>

<?php 
    include 'patient_show.php';
    include "head.html"; 
    include 'patient_add_information_hiddeninput.php';
    include 'patient_step1_variable_manage.html';
?>

<head>
    <link rel="stylesheet" href="css/stepper.css">
</head>

<body>

    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

        <?php include "header.html" ?>

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">

                <!--breadcrumb-->
                <ul class="uk-breadcrumb breadcrumb">
                    <li><a href="patient.php" class="uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i> ผู้ป่วยเยี่ยมบ้าน</a></li>
                    <li>แก้ไขข้อมูลผู้ป่วย</li>
                </ul>

                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">

                    <form action="<?php echo "patient_save.php?hn=".$patient_hn; ?>" method="post">
                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <ul class="uk-subnav uk-subnav-pill stepper" uk-switcher>
                                <li id="step1" class="step three active"><a href="#" title="ข้อมูลทั่วไป" uk-tooltip>1</a></li>
                                <li id="step2" class="step three"><a href="#" title="รายละเอียดของปัญหา" uk-tooltip>2</a></li>
                                <li id="step3" class="step three"><a href="#" title="สรุปข้อมูลปัญหา" uk-tooltip>3</a></li>
                            </ul>
                            <ul class="uk-switcher">
                                <li>
                                    <?php include 'patient_form_step1.php' ?>
                                    <div class="uk-align-right">
                                        <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next" id="next-btn1">ถัดไป <span uk-icon="chevron-right"></span></a>
                                    </div>
                                </li>
                                <li>
                                    <?php include 'patient__form_step2.php' ?>
                                    <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous" id="prev-btn2"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                    <div class="uk-align-right">
                                        <a href="#" class="uk-button uk-button-default button-green" uk-switcher-item="next" id="next-btn2">ถัดไป <span uk-icon="chevron-right"></span></a>
                                    </div>
                                </li>
                                <li>
                                    <?php include 'patient_form_step3.php' ?>
                                    <a href="#" class="uk-button uk-button-default" uk-switcher-item="previous" id="prev-btn3"><span uk-icon="chevron-left"></span> ย้อนกลับ</a>
                                    <div class="uk-align-right">
                                        <button type="submit" class="uk-button uk-button-default button-green">บันทึก</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--/.mdl-card__supporting-text-->
                    </form>
                </div>
                <!--/.mdl-card-->
            </div>
            <!--/.content-->
        </main>
    </div>

    <!--custom js-->
    <script src="js/dropdown.js"></script>
    <script src="js/stepper.js"></script>

</body>

</html>
