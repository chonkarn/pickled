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

    <!--mdl-stepper-->
    <link rel="stylesheet" href="lib/mdl-stepper/stepper.min.css">

    <!--icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--custom css-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
</head>

<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <?php include "header.html"?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">
                
                <ul class="uk-breadcrumb">
                    <li><a href="summary.html">สรุปเยี่ยมบ้าน</a></li>
                    <li><span href=""></span>เพิ่มสรุปเยี่ยมบ้าน</li>
                </ul>

                <!--stepper-nonlinear-->
                <ul class="mdl-stepper mdl-stepper--horizontal" id="demo-stepper-nonlinear" style="height: 2050px;">

                    <!--step1-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openSumStep(1)">
                            <span class="mdl-step__title"><span class="mdl-step__title-text">ข้อมูลทั่วไป</span></span>
                        </span>
                        <div class="mdl-step__content">

                        </div>
                        <div class="mdl-step__actions">
                            <div class="mdl-layout-spacer"></div>
                            <button class="mdl-button mdl-js-button mdl-button--primary">
                                ถัดไป
                            </button>
                        </div>
                    </li>
                    
                    <!--step2-->
                    <li class="mdl-step is-active">
                        <span class="mdl-step__label" onclick="openSumStep(2)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">รายละเอียดปัญหา</span>
                        </span>
                        </span>
                        <div class="mdl-step__content">

                            <form class="uk-form-horizontal uk-margin-large">

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Biological problem</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea uk-width-1-2" rows="3" placeholder="Biological problem..."></textarea>
                                    </div>
                                </div>
                                <hr>

                                <p class="mdl-typography--title">Physical examination</p>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Vital sign</label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3@s">
                                                BP
                                                <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""> mmHg
                                            </div>
                                            <div class="uk-width-1-3@s">
                                                HR
                                                <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""> /min
                                            </div>
                                            <div class="uk-width-1-3@s">
                                                RR
                                                <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""> /min
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-width-1-2@s">
                                            Oxygen saturation
                                            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""> %
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">HEENT</label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox"> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Heart</label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox"> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Lungs</label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox"> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small ">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Abdomen</label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox"> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Extremities</label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox"> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Neuro</label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-6@s">
                                                <input class="uk-checkbox" type="checkbox"> ปกติ
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Score assessment</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">PPS</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Geriatric depression scale</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Mini mental state examination</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Orientation to time</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Orientation to place</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Registration</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">
                                        Attention / Calculation <span class="uk-text-warning">*</span>
                                    </label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">

                                        <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Recall</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Naming</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Repetition</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Verbal command</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Written command
                                        <span class="uk-text-warning">*</span>
                                    </label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">

                                        <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Writing
                                        <span class="uk-text-warning">*</span>
                                    </label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">

                                        <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Visuoconstruction</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text"> Psychological and Social peroblem</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea uk-width-1-2" rows="3" placeholder=" Psychological and Social peroblem..."></textarea>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Other problem</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea uk-width-1-2" rows="3" placeholder="Other problem..."></textarea>
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Summarized</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Assessment and Plan</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea uk-width-1-2" rows="3" placeholder="Assessment and Plan..."></textarea>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Goal</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea uk-width-1-2" rows="3" placeholder="Goal..."></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mdl-step__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                ย้อนกลับ
                            </button>
                            <div class="mdl-layout-spacer"></div>
                            <button class="mdl-button mdl-js-button mdl-button--primary">
                                ถัดไป
                            </button>
                        </div>
                    </li>
                    
                    <!--step3-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openSumStep(3)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">สรุปข้อมูลปัญหา</span>
                        </span>
                        </span>
                        <div class="mdl-step__content">

                        </div>
                        <div class="mdl-step__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                ย้อนกลับ
                            </button>
                            <div class="mdl-layout-spacer"></div>
                            <button class="mdl-button mdl-js-button mdl-button--primary">
                                ถัดไป
                            </button>
                        </div>
                    </li>
                    
                    <!--step4-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openSumStep(4)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">สรุปหลังประชุม</span>
                        </span>
                        </span>
                        <div class="mdl-step__content">

                        </div>
                        <div class="mdl-step__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                ย้อนกลับ
                            </button>
                            <div class="mdl-layout-spacer"></div>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
                                บันทึก
                            </button>
                        </div>
                    </li>
                </ul>
                <!--/.stepper-nonlinear-->
            </div>
            <!--/.demo-content-->
        </main>
    </div>

    <!--jquery-->
    <script src="js/jquery-3.1.1.min.js"></script>

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