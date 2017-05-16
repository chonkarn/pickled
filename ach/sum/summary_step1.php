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
                    <li><a href="summary.php">สรุปเยี่ยมบ้าน</a></li>
                    <li><span href=""></span>เพิ่มสรุปเยี่ยมบ้าน</li>
                </ul>

                <!--stepper-nonlinear-->
                <ul class="mdl-stepper mdl-stepper--horizontal" id="demo-stepper-nonlinear" style="height: 2200px;">

                    <!--step1-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openSumStep(1)">
                            <span class="mdl-step__title"><span class="mdl-step__title-text">ข้อมูลทั่วไป</span></span>
                        </span>
                        <div class="mdl-step__content">
                            <form class="uk-form-horizontal">
                                <div class="uk-margin">
                                    <label class="uk-form-label">เหตุผลการเยี่ยมบ้าน</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="reason" checked> Assessment</label>
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="reason"> Illness management</label>
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="reason"> Palliative</label>
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="reason"> Post hospitalized</label>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">ทีมแพทย์เยี่ยมบ้าน</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <select class="uk-select uk-width-1-2 uk-form-small">
                                            <option>เลือกหรือค้นหาแพทย์เยี่ยมบ้าน</option>
                                            <option>1 สัปดาห์</option>
                                            <option>2 สัปดาห์</option>
                                            <option>3 สัปดาห์</option>
                                            <option>1 เดือน</option>
                                            <option>2 เดือน</option>
                                            <option>3 เดือน</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <button class="uk-button uk-button-primary uk-button-small">+ เพิ่มแพทย์</button>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">ยาที่ใช้ปัจจุบันและยาที่ซื้อกินเอง</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-auto">
                                                <label class="uk-margin-right uk-text-bold">ชื่อยา</label>
                                                <select class="uk-select uk-form-width-medium uk-form-small">
                                                    <option>เลือกหรือค้นหาชื่อยา</option>
                                                    <option>1 สัปดาห์</option>
                                                    <option>2 สัปดาห์</option>
                                                    <option>3 สัปดาห์</option>
                                                    <option>1 เดือน</option>
                                                    <option>2 เดือน</option>
                                                    <option>3 เดือน</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="uk-margin-right uk-text-bold">ลักษณะ</label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-radio" type="radio" name="unit" checked> ยาเม็ด
                                                </label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-radio" type="radio" name="unit"> ยาน้ำ
                                                </label>
                                            </div>
                                            <div>
                                                <label class="uk-margin-right uk-text-bold">โดส</label>
                                                <input class="uk-input uk-form-width-xsmall uk-form-small" type="number" placeholder="1"> เม็ด
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-auto">
                                                <label class="uk-margin-right uk-text-bold">วิธีใช้ยา</label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-radio" type="radio" name="method" checked> ก่อนอาหาร</label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-radio" type="radio" name="method"> หลังอาหาร</label>
                                            </div>
                                            <div>
                                                <label class="uk-margin-right uk-text-bold">ช่วงเวลา</label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> เช้า
                                                </label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> กลางวัน
                                                </label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> เย็น
                                                </label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> ก่อนนอน
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <button class="uk-button uk-button-primary uk-button-small">+ เพิ่มยาที่ใช้</button>
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Impairment / Immobility</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Basic activities of daily living</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                            <input class="uk-radio " type="radio" name="basic" checked> Yes
                                        </label>
                                        <label>
                                            <input class="uk-radio" type="radio" name="basic"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <label class="uk-margin-right"><b>Problem</b></label>
                                        <label class="uk-margin-right">
                                            <input class="uk-checkbox" type="checkbox"> Dressing
                                        </label>
                                        <label class="uk-margin-right">
                                            <input class="uk-checkbox" type="checkbox"> Eating
                                        </label>
                                        <label class="uk-margin-right">
                                            <input class="uk-checkbox" type="checkbox"> Ambulating
                                        </label>
                                        <label class="uk-margin-right">
                                            <input class="uk-checkbox" type="checkbox"> Toileting
                                        </label>
                                        <input class="uk-checkbox" type="checkbox"> Hygine
                                        <hr>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Instrumental activities of daily living</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <label class="uk-margin-right">
                                                    <input class="uk-radio " type="radio" name="instrument" checked> Yes
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="instrument"> No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-width-1-1">
                                                <label class="uk-margin-right"><b>Problem</b></label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> Shopping</label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> Houskeeping
                                                </label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> Medication
                                                </label>
                                                <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> Financial
                                                </label>
                                                <input class="uk-checkbox" type="checkbox"> Transpoting / Technology
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Nutrition</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Nutritional status</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="nutrition" checked> Healthy
                                        </label>
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="nutrition"> Obesity
                                        </label>
                                        <input class="uk-radio" type="radio" name="nutrition"> Malnutrition
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Home environment / Safety</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Risk</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                            <input class="uk-radio " type="radio" name="risk" checked> Yes
                                        </label>
                                        <label>
                                            <input class="uk-radio" type="radio" name="risk"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Place at risk</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <select class="uk-select uk-width-1-2 uk-form-small">
                                            <option>เลือก Place at risk</option>
                                            <option>1 สัปดาห์</option>
                                            <option>2 สัปดาห์</option>
                                            <option>3 สัปดาห์</option>
                                            <option>1 เดือน</option>
                                            <option>2 เดือน</option>
                                            <option>3 เดือน</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Social support</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Caregiver burden</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="caregiver" checked> Yes
                                        </label>
                                        <label>
                                            <input class="uk-radio" type="radio" name="caregiver"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">Main caregiver</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <select class="uk-select uk-width-1-2 uk-form-small">
                                            <option>เลือก Main caregiver</option>
                                            <option>1 สัปดาห์</option>
                                            <option>2 สัปดาห์</option>
                                            <option>3 สัปดาห์</option>
                                            <option>1 เดือน</option>
                                            <option>2 เดือน</option>
                                            <option>3 เดือน</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label">สิทธิ์การรักษา</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <select class="uk-select uk-width-1-2 uk-form-small">
                                            <option>เลือกสิทธิ์การรักษา</option>
                                            <option>1 สัปดาห์</option>
                                            <option>2 สัปดาห์</option>
                                            <option>3 สัปดาห์</option>
                                            <option>1 เดือน</option>
                                            <option>2 เดือน</option>
                                            <option>3 เดือน</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Medication</p>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Prescription drug</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-5@s">
                                                <label class="uk-margin-right">
                                                    <input class="uk-radio" type="radio" name="prescription" checked> Yes
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="prescription"> No
                                                </label>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Nonprescription drug</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-5@s">
                                                <label class="uk-margin-right">
                                                    <input class="uk-radio " type="radio" name="nonprescription" checked> Yes
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="nonprescription"> No
                                                </label>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Dietary supplement</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-5@s">
                                                <label class="uk-margin-right">
                                                    <input class="uk-radio " type="radio" name="supplement" checked> Yes
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="supplement"> No
                                                </label>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Medication compliance</label>
                                    <div class="uk-form-controls uk-form-controls-text">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-5@s">
                                                <label class="uk-margin-right">
                                                    <input class="uk-radio " type="radio" name="compliance" checked> Yes
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="compliance"> No
                                                </label>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="mdl-typography--title">Management</p>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">

                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Assessment
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Pain & Symptom management
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Medication management
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small " placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Procedure
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Family meeting
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Social support & Health insurance
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Psychological care
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Rehabilitation
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text"></label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Advance direction choice
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text"></label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Dying
                                                <span class="uk-text-meta uk-text-small">Funeral plan / Grief bereavement care</span>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text"></label>
                                    <div class="uk-form-controls">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-3">
                                                <input class="uk-checkbox" type="checkbox"> Other specify
                                            </div>
                                            <div class="uk-width-1-2">
                                                <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--/form.uk-->
                        </div>
                        <div class="mdl-step__actions">
                            <div class="mdl-layout-spacer"></div>
                            <button class="mdl-button mdl-js-button mdl-button--primary">
                                ถัดไป
                            </button>
                        </div>
                    </li>

                    <!--step2-->
                    <li class="mdl-step">
                        <span class="mdl-step__label" onclick="openSumStep(2)">
          <span class="mdl-step__title">
            <span class="mdl-step__title-text">รายละเอียดปัญหา</span>
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