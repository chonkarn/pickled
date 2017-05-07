<!DOCTYPE html>
<html>
<?php 
    mysql_connect("localhost", "hvmsdb","1234") or die(mysql_error());
    mysql_select_db("homevisit") or die(mysql_error());
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
    <link rel="stylesheet" href="css/calendar.css"> </head>
<?php
function create_calen($monday){
    
    $val = $monday;
    $monday = $monday + 5;
    $same2 = "</li>";
    $pt2 = "id=";
    $col = "\"";
    $pt3 = ">";
    $pt4 = "</div>";
    $first = "<ul class=\"day\">";
    $last = "</ul>";
    $checkapp = "2017-04-";
    $query = "SELECT * FROM calendar_info ";
    $link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");
    $r = mysqli_query($link, $query);
      
    
        while ($val < $monday ){
                if ($val == date("d")) 
                    $pt = "<div class=\"date today\" name=";
                else 
                    $pt = "<div class=\"date\" name=";
            if ($val < 10) {$checkapp = "2017-04-0";}    
            $d = "d"+$val;
            $checkapp = $checkapp.$val;
            $same = "<li class=\"day\" onclick=\"location.href='calendar_add.php?date=";
            $same = $same.$checkapp."';\" >";
            
            echo $same;
            echo $pt.$col.$d.$col.$pt2.$col.$d.$col.$pt3.$val.$pt4;
            
                while ($row = mysqli_fetch_assoc($r))
                {
//                    echo $checkapp." ".$row['dmy'];
                    if ($checkapp === $row['dmy']){
                        include 'date_event.html';

                    }
                        
                }
                mysqli_data_seek($r, 0);
      
                
            echo $same2;
            $checkapp = "2017-04-";
            $val++;
            
        }
    
}

?>  

    <body>
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