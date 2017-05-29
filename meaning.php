<?php

switch($patient_visit_status){
    case 1: $patient_visit_status = 'ใหม่'; break;
    case 2: $patient_visit_status = 'เยี่ยมต่อ'; break;
    case 3: $patient_visit_status = 'ปิดเยี่ยมบ้าน'; break;
}

switch($patient_visit_type){
    case 1: $patient_visit_type = 'Home visit care'; break;
    case 2: $patient_visit_type = 'Geriatric case'; break;
    case 3: $patient_visit_type = 'Palliative case'; break;
}

switch($patient_gender){
    case 1: $patient_gender = 'ชาย'; break;
    case 2: $patient_gender = 'หญิง'; break;
}

switch($patient_status){
    case 1: $patient_status = 'โสด'; break;
    case 2: $patient_status = 'สมรส'; break;
    case 3: $patient_status = 'หม้าย'; break;
    case 4: $patient_status = 'หย่าร้าง'; break;
    case 5: $patient_status = 'แยกกันอยู่'; break;
}

switch($patient_religion){
    case 1: $patient_religion = 'พุทธ'; break;
    case 2: $patient_religion = 'คริสต์'; break;
    case 3: $patient_religion = 'อิสลาม'; break;
    case 4: $patient_religion = 'อื่นๆ'; break;
}

switch($patient_bmonth){
    case 1: $patient_bmonth = 'มกราคม'; break;
    case 2: $patient_bmonth = 'กุมภาพันธ์'; break;
    case 3: $patient_bmonth = 'มีนาคม'; break;
    case 4: $patient_bmonth = 'เมษายน'; break;
    case 5: $patient_bmonth = 'พฤษภาคม'; break;
    case 6: $patient_bmonth = 'มิถุนายน'; break;
    case 7: $patient_bmonth = 'กรกฎาคม'; break;
    case 8: $patient_bmonth = 'สิงหาคม'; break;
    case 9: $patient_bmonth = 'กันยายน'; break;
    case 10: $patient_bmonth = 'ตุลาคม'; break;
    case 11: $patient_bmonth = 'พฤศจิกายน'; break;
    case 12: $patient_bmonth = 'ธันวาคม'; break;
}

switch($time_visit){
    case 1: $time_visit = 'ภาคเช้า (9.00-12.00 น)'; break;
    case 2: $time_visit = 'ภาคบ่าย (13.00-16.00 น)'; break; 
}

?>
