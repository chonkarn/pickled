<?php
    $qq = "SELECT * from tbuser_position ";
    
    $link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");
    mysqli_query($link,"SET NAMES UTF8");
    mysqli_query($link,"SET character_set_results=utf8");
    mysqli_query($link,"SET character_set_client=utf8");
    mysqli_query($link,"SET character_set_connection=utf8");
    $show = mysqli_query($link,$qq);
//admin page variable
    if ($row["chief"] == 1 ) $row["chief"] = "หัวหน้าแพทย์";
        else $row["chief"] = "";
    switch ($row["chief_month"]){
            case 1 : $row["chief_month"] = "มกราคม"; break;    
            case 2 : $row["chief_month"] = "กุมภาพันธ์"; break;    
            case 3 : $row["chief_month"] = "มีนาคม"; break;    
            case 4 : $row["chief_month"] = "เมษายน"; break;    
            case 5 : $row["chief_month"] = "พฤษภาคม"; break;
            case 6 : $row["chief_month"] = "มิถุนายน"; break;
            case 7 : $row["chief_month"] = "กรกฎาคม"; break;
            case 8 : $row["chief_month"] = "สิงหาคม"; break;
            case 9 : $row["chief_month"] = "กันยายน"; break;
            case 10 : $row["chief_month"] = "ตุลาคม"; break;
            case 11 : $row["chief_month"] = "พฤศจิกายน"; break;
            case 12 : $row["chief_month"] = "ธันวาคม"; break;
        case 0 : $row["chief_month"] = ""; break;
        }
 if ($row["chief_year"] == "0000") $row["chief_year"] = "";
else $row["chief_year"] = $row["chief_year"]+543;

    while ($print = mysqli_fetch_array($show)){
        if ($row["id_position"] === $print["position_id"]) $row["id_position"] = $print["position_name"];
    }
    
    

    
?>

