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
            <?php include "header.html"; ?>
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">
                    <ul class="uk-breadcrumb breadcrumb">
                        <li><a href="calendar.php" class="uk-button uk-button-text"><i class="material-icons breadcrumb-icons">date_range</i> ปฏิทินนัดหมาย</a></li>
                        <li>แจ้งเตือน</li>
                    </ul>

                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--112-col-desktop">
                        <div class="mdl-card__menu"></div>

                        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                            <div class="uk-grid uk-grid-collapse">

                                <div class="uk-width-1-1">
                                    <ul uk-accordion="multiple: true">
                                        <li class="uk-open">
                                            <h5 class="uk-accordion-title text-green uk-heading-bullet">แจ้งเตือนใหม่</h5>
                                            <div class="uk-accordion-content">
                                                <ul class="uk-list uk-list-divider">
                                                    <li>
                                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span uk-icon="icon: comments"></span>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <h5 class=" uk-margin-remove-bottom">
                                                                    นัดหมาย 22 มีนาคม
                                                                    <b>นาง มาณี ประชาไท <small>(HN 4683265)</small></b> ทีมแพทย์เข้าร่วมทุกคน
                                                                </h5>
                                                                <p class="uk-text-meta uk-margin-remove-top">
                                                                    <small><time datetime="2017-03-15T7:00">3 ชั่วโมงที่แล้ว</time></small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span uk-icon="icon: commenting"></span>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <h5 class=" uk-margin-remove-bottom">เพิ่มนัดหมาย 22 มีนาคม
                                                                    <b>นาง มาณี ประชาไท <small>(HN 4683265)</small></b>
                                                                </h5>
                                                                <p class="uk-text-meta uk-margin-remove-top">
                                                                    <small>                                                                    <time datetime="2017-03-14T10:00">เมื่อวาน</time>
</small> </p>
                                                            </div>
                                                            <div class="uk-float-right">
                                                                <a href="#show-hn4683265" class="uk-button uk-button-text" uk-toggle>เข้าร่วม <span class="text-green">&#11044;</span></a>
                                                                <!--THIS IS A MODAL-->
                                                                <div id="show-hn4683265" uk-modal="center: true">
                                                                    <div class="uk-modal-dialog">
                                                                        <button class="uk-modal-close-default" type="button" uk-close></button>

                                                                        <div class=" uk-modal-body">
                                                                            <h4>นาง มาณี ประชาไท (HN 4683265)</h4>

                                                                            <form class="uk-form-horizontal ">
                                                                                <div class=" uk-margin-small">
                                                                                    <label class="uk-form-label">สถานะเยี่ยมบ้าน</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        ใหม่
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">ประเภทการเยี่ยมบ้าน</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        Home visit care
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">วันเวลาที่เยี่ยม</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        22/3/2560 <small>(เช้า)</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">แพทย์เจ้าของไข้</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        นพ.ประสงค์ ทรงธรรม <small>(013655)</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">ทีมแพทย์เยี่ยมบ้าน</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        <span class="text-green">&#11044;</span> พญ.ภัควิภา เริ่มยินดี <small>(011097)</small>
                                                                                        <br>
                                                                                        <span class="text-green">&#11044;</span> นพ.นพดล นพกุล <small>(011106)</small>
                                                                                        <br>
                                                                                        <span class="text-green">&#11044;</span> <b>นพ.ประสงค์ ทรงธรรม <small>(011156)</small></b>
                                                                                        <br>
                                                                                        <span class="text-green">&#11044;</span> นพ.พฤกษา วนารี <small>(011196)</small>
                                                                                        <br>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">สรุปข้อมูลปัญหาผู้ป่วย</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        <ol>
                                                                                            <li> I10 <small>Essential (primary) hypertension</small></li>
                                                                                            <li> E117 <small>Non-insulin-dependent diabetes mellitus, with multiple complications</small></li>
                                                                                        </ol>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="uk-margin">
                                                                                    <label class="uk-form-label">เข้าร่วมทีมเยี่ยมบ้านหรือไม่?</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason" > อาจจะ</label>
                                                                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason" checked> เข้าร่วม</label>
                                                                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason"> ปฏิเสธ</label>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="uk-modal-footer">
                                                                            <div class="uk-align-right uk-margin-remove-vertical">
                                                                                <button class="uk-button uk-button-green uk-button-small" uk- type="button">บันทึก</button>
                                                                            </div>
                                                                        </div>
                                                                        <!--/.uk-modal-footer-->
                                                                    </div>
                                                                </div>
                                                                <!--/.uk-modal-->
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <!--แจ้งเตือนอ่านแล้ว-->
                                        <li class="uk-open">
                                            <h5 class="uk-accordion-title text-green uk-heading-bullet">แจ้งเตือนอ่านแล้ว</h5>
                                            <div class="uk-accordion-content">
                                                <ul class="uk-list uk-list-divider">
                                                    <li>
                                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span uk-icon="icon: commenting"></span>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <h5 class=" uk-margin-remove-bottom">เพิ่มนัดหมาย 24 มีนาคม
                                                                    <b> นาง ชญานิศ พลฑา <small>(HN 6118489)</small></b>
                                                                </h5>
                                                                <p class="uk-text-meta uk-margin-remove-top">
                                                                    <small>แจ้งเตือนเมื่อ <time datetime="2017-03-22T9:00">14 มีนาคม เวลา 14.40 น </time> |
อ่านแล้วเมื่อ <time datetime="2017-03-22T9:00">15 มีนาคม เวลา 10.02 น</time>
</small>
                                                                </p>
                                                            </div>
                                                            <div class="uk-float-right">
                                                                <a href="#show-hn6118489" class="uk-button uk-button-text" uk-toggle>รอตอบรับ <span class="text-yellow">&#11044;</span></a>

                                                                <!--#show-hn6118489 Modal-->
                                                                <div id="show-hn6118489" uk-modal="center: true">
                                                                    <div class="uk-modal-dialog">
                                                                        <button class="uk-modal-close-default" type="button" uk-close></button>

                                                                        <div class=" uk-modal-body">
                                                                            <h4>นาง ชญานิศ พลฑา (HN 6118489)</h4>
                                                                            <form class="uk-form-horizontal ">
                                                                                <div class=" uk-margin-small">
                                                                                    <label class="uk-form-label">สถานะเยี่ยมบ้าน</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        ใหม่
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">ประเภทการเยี่ยมบ้าน</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        Home visit care
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">วันเวลาที่เยี่ยม</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        24/3/2560 <small>(บ่าย)</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">แพทย์เจ้าของไข้</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        นพ.ประสงค์ ทรงธรรม <small>(013655)</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">ทีมแพทย์เยี่ยมบ้าน</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        <span class="text-green">&#11044;</span> พญ.ภัควิภา เริ่มยินดี <small>(011097)</small>
                                                                                        <br>
                                                                                        <span class="text-green">&#11044;</span> นพ.นพดล นพกุล <small>(011106)</small>
                                                                                        <br>
                                                                                        <span class="text-yellow">&#11044;</span> <b>นพ.ประสงค์ ทรงธรรม <small>(011156)</small></b>
                                                                                        <br>
                                                                                        <span class="text-red">&#11044;</span> นพ.พฤกษา วนารี <small>(011196)</small>
                                                                                        <br>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="uk-margin-small">
                                                                                    <label class="uk-form-label">สรุปข้อมูลปัญหาผู้ป่วย</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        <ol>
                                                                                            <li> I10 <small>Essential (primary) hypertension</small></li>
                                                                                            <li> E117 <small>Non-insulin-dependent diabetes mellitus, with multiple complications</small></li>
                                                                                        </ol>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="uk-margin">
                                                                                    <label class="uk-form-label">เข้าร่วมทีมเยี่ยมบ้านหรือไม่?</label>
                                                                                    <div class="uk-form-controls uk-form-controls-text">
                                                                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason" checked> รอตอบรับ</label>
                                                                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason" > เข้าร่วม</label>
                                                                                        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason"> ปฏิเสธ</label>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="uk-modal-footer">
                                                                            <div class="uk-align-right uk-margin-remove-vertical">
                                                                                <button class="uk-button uk-button-green uk-button-small" uk- type="button">บันทึก</button>
                                                                            </div>
                                                                        </div>
                                                                        <!--/.uk-modal-footer-->
                                                                    </div>
                                                                </div>
                                                                <!--/.uk-modal-->
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span uk-icon="icon: trash"></span>
                                                            </div>
                                                            <div class="uk-width-expand ">
                                                                <h5 class=" uk-margin-remove-bottom">
                                                                    <div class="uk-text-truncate">ลบนัดหมายวันที่ 20 มีนาคม <b>นาง เพียรจิต จงใจรักษ์ <small>(HN 6213261)</small></b> เนื่องจากความผิดพลาด</div>
                                                                </h5>
                                                                <p class="uk-text-meta uk-margin-remove-top">
                                                                    <small>                                                                    แจ้งเตือนเมื่อ <time datetime="2017-03-14T14:33">14 มีนาคม เวลา 14.33 น</time> | อ่านแล้วเมื่อ <time datetime="2017-03-14T14:33">15 มีนาคม เวลา 10.02 น</time>
</small> </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span uk-icon="icon: users"></span>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <h5 class=" uk-margin-remove-bottom">
                                                                    ประชุมก่อนออกเยี่ยมผู้ป่วย 3 นัดหมาย
                                                                    <span class="uk-text-truncate"><b>นาย เหมันต์ ธนไพบูรณ์ <small>(HN 7854485)</small></b></span>,
                                                                    <span class="uk-text-truncate"><b>นาง วิยดา เครื่องดี <small>(HN 7854485)</small></b></span>,
                                                                    <span class="uk-text-truncate"><b>นาง วิภา มานะยิ่ง <small>(HN 7465116)</small></b></span>
                                                                </h5>
                                                                <p class="uk-text-meta uk-margin-remove-top">
                                                                    <small>แจ้งเตือนเมื่อ <time datetime="2017-03-10T9:00">10 มีนาคม เวลา 9.00 น</time> | อ่านแล้วเมื่อ <time datetime="2017-03-10T9:00">15 มีนาคม เวลา 10.02 น</time></small></p>
                                                            </div>
                                                            <div><a href="#" class="uk-button uk-button-default uk-button-small button-green">พิมพ์สรุปเยี่ยมบ้าน (ล่าสุด)</a></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <!--แจ้งเตือนหมดอายุ-->
                                        <li>
                                            <h5 class="uk-accordion-title text-green uk-heading-bullet">
                                                แจ้งเตือนหมดอายุ <span uk-icon="icon: info" title="แก้ไขนัดหมายไม่ได้แล้ว" uk-tooltip="pos: right"></span>
                                            </h5>
                                            <div class="uk-accordion-content">
                                                <ul class="uk-list uk-list-divider">
                                                    <li>
                                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span uk-icon="icon: trash"></span>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <h5 class=" uk-margin-remove-bottom">
                                                                    ลบนัดหมายวันที่ 16 กุมภาพันธ์ 2560 <b>นาง เพียรจิต จงใจรักษ์ <small>(HN 6213261)</small></b> เนื่องจากความผิดพลาด
                                                                </h5>
                                                                <p class="uk-text-meta uk-margin-remove-top">
                                                                    <small>                                                    แจ้งเตือนเมื่อ <time datetime="2017-02-10T11:36">10 กุมภาพันธ์ เวลา 11.36</time> | อ่านแล้วเมื่อ <time datetime="2017-02-05T11:33">12 กุมภาพันธ์ เวลา 15.54</time>
</small> </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span uk-icon="icon: commenting"></span>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <h5 class=" uk-margin-remove-bottom">เพิ่มนัดหมายใหม่ 17 กุมภาพันธ์ 2560 <b>นาง รุ่งทิพย์ ก่อเกียรติ <small>(HN 5965485)</small></b></h5>
                                                                <p class="uk-text-meta uk-margin-remove-top">
                                                                    <small>แจ้งเตือนเมื่อ <time datetime="2017-02-09T10:56">9 กุมภาพันธ์ เวลา 10.56</time> | อ่านแล้วเมื่อ <time datetime="2017-02-05T11:33">12 กุมภาพันธ์ เวลา 15.54</time>
</small></p>
                                                            </div>
                                                            <div class="uk-float-right">
                                                                เข้าร่วม
                                                                <span class="text-green">&#11044;</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span uk-icon="icon: commenting"></span>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <h5 class=" uk-margin-remove-bottom">เพิ่มนัดหมายใหม่ 16 กุมภาพันธ์ 2560 <b>นาง เพียรจิต จงใจรักษ์ <small>(HN 6213261)</small></b></h5>
                                                                <p class="uk-text-meta uk-margin-remove-top">
                                                                    <small>แจ้งเตือนเมื่อ <time datetime="2017-02-06T10:24">6 กุมภาพันธ์ เวลา 10.24 น</time> | อ่านแล้วเมื่อ <time datetime="2017-02-05T11:33">5 กุมภาพันธ์ เวลา 11.33 น</time></small>
                                                                </p>
                                                            </div>
                                                            <div class="uk-float-right">
                                                                ปฏิเสธ
                                                                <span class="text-red">&#11044;</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span uk-icon="icon: commenting"></span>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <h5 class=" uk-margin-remove-bottom">เพิ่มนัดหมายใหม่ 9 กุมภาพันธ์ 2560<b>นาง มรกต รุ่งเรือง <small>(HN 6326954)</small></b></h5>
                                                                <p class="uk-text-meta uk-margin-remove-top">
                                                                    <small>                                                                   แจ้งเตือนเมื่อ <time datetime="2017-02-02T9:57">2 กุมภาพันธ์ เวลา 9.57 น</time> | อ่านแล้วเมื่อ <time datetime="2017-02-05T11:33">5 กุมภาพันธ์ เวลา 11.33 น</time>
</small> </p>
                                                            </div>
                                                            <div class="uk-float-right">
                                                                เข้าร่วม
                                                                <span class="text-green">&#11044;</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span uk-icon="icon: trash"></span>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <h5 class=" uk-margin-remove-bottom">
                                                                    ลบนัดหมายวันที่ 12 กุมภาพันธ์ 2560 <b>นาง เพียรจิต จงใจรักษ์ <small>(HN 6213261)</small></b> เนื่องจากความผิดพลาด
                                                                </h5>
                                                                <p class="uk-text-meta uk-margin-remove-top">
                                                                    <small>แจ้งเตือนเมื่อ  <time datetime="2017-02-02T9:55">2 กุมภาพันธ์ เวลา 9.55 น</time> |
อ่านแล้วเมื่อ <time datetime="2017-02-05T11:33">5 กุมภาพันธ์ เวลา 11.33 น</time>
</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="uk-align-right">
                                                            <a href="#" class="uk-button uk-button-text" uk-toggle>ดูเพิ่มเติม</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                    <!--/.accordion-->
                                </div>
                            </div>
                        </div>
                        <!--/.mdl-card__supporting-text-->
                    </div>
                    <!--/.mdl-card-->
                </div>
                <!--/.demo-content-->
            </main>
        </div>

        <!--jquery-->
        <!--<script src="js/jquery-3.1.1.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


        <!--js mdl-->
        <script src="lib/mdl/material.min.js"></script>
        <script src="lib/mdl-stepper/stepper.min.js"></script>


        <!--js uikit-->
        <script src="lib/uikit/js/uikit.min.js"></script>
        <script src="lib/uikit/js/uikit-icons.min.js"></script>

        <!--custom js-->
        <script src="js/stepper-nonlinear.js"></script>
    </body>

</html>