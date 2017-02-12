<?php
function droptext($value){
    
  if ($file = @fopen($value, 'r')) {
                                                      while(($line = fgets($file)) !== false) {
                                                            echo $line;
                                                        }
                                                        fclose($file);
                                                    }
    
}

function droploop($value){
    if ($value == "day"){
        $txt = "-- วัน --";
        $condition=1;
        $loop=$condition+30;
        echo "<option >{$txt}</option>";
    for ($condition;$condition<=$loop;$condition++){
       echo "<option value=\"{$condition}\">{$condition}</option>";
    }
    }
    else {
            $txt = "-- ปี --";
            $condition=2559;
            $loop=2459;
        echo "<option >{$txt}</option>";
    for ($condition;$condition>=$loop;$condition--){
       echo "<option value=\"{$condition}\">{$condition}</option>";
    }
    }
}
?>