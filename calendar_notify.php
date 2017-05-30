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
                                            <h5 class="uk-accordion-title text-green uk-heading-bullet"> นัดหมายที่ยังไม่ได้ตอบรับ</h5>
                                            <div class="uk-accordion-content">
                                                <ul class="uk-list uk-list-divider">
                                                    <?php 
                                                    $id = $_SESSION['id'];
                                                    $state = "SELECT * FROM calendar_members_status WHERE Id_members=$id";
                                                    $link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit") or die("ติดต่อไม่ได้");
                                                    $query = mysqli_query($link,$state);
//                                                    echo "♥".$id;
                                                    while ($value = mysqli_fetch_array($query)){
                                                        $state2 = "SELECT * FROM calendar_info WHERE Id_app=".$value["Id_app"];
                                                        $query2 = mysqli_query($link,$state2);
                                                        $row = mysqli_fetch_array($query2);
                                                        if ($value['members_status'] == 0 ) include 'calendar_notify_each.php';
                                                    }
//                                                    mysqli_data_seek($query,0); 
                                                    ?>
                                                    
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