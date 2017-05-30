<?php
    switch($row["id_position"])
    {
        case 0: $row["id_position"] = "ผู้ดูแลระบบ"; break;
        case 1: $row["id_position"] = "แพทย์ประจำบ้าน"; break;
        case 2: $row["id_position"] = "เจ้าหน้าที่"; break;
    }
?>

<!--
case 0: $row["id_position"] = "ผู้ดูแลระบบ"; break;
        case 1: $row["id_position"] = "อาจารย์แพทย์"; break;
        case 2: $row["id_position"] = "แพทย์ประจำบ้าน"; break;
        case 3: $row["id_position"] = "3 เจ้าหน้าที่"; break;
        case 4: $row["id_position"] = "4 เจ้าหน้าที่"; break;
        case 5: $row["id_position"] = "5 เจ้าหน้าที่"; break;
        case 6: $row["id_position"] = "นักศึกษาแพทย์"; break;-->
