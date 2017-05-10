<?php

function visit_status($val){
    
    switch ($val){
        case 0: $val = "ใหม่"; break;
        case 1: $val = "เก่า"; break;
    }
    
    return $val;
}

function visit_type($val){
    
    switch ($val){
        case 1: $val = "Home visit case"; break;
        case 2: $val = "Geriatric case"; break;
        case 3: $val = "Palliative case"; break;
    }
    
    return $val;
}

function time_cal($val){
    
    if ($val == 0) $time = "เช้า";
    else $time = "บ่าย";
        
        return $time;
}


?>