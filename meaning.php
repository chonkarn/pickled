<?php

switch($visit_status){
    case 1: $visit_status = 'ใหม่'; break;
    case 2: $visit_status = 'เยี่ยมต่อ'; break;
    case 3: $visit_status = 'ปิดเยี่ยมบ้าน'; break;
}

switch($visit_type){
    case 1: $visit_type = 'Home visit care'; break;
    case 2: $visit_type = 'Geriatric case'; break;
    case 3: $visit_type = 'Palliative case'; break;
}

switch($patient_gender){
    case 1: $patient_gender = 'ชาย'; break;
    case 2: $patient_gender = 'หญิง'; break;
}

?>