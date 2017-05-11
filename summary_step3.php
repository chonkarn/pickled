<?php
    $icd10SQL = "SELECT icd10_id, icd10_name, icd10_keyword FROM icd10 ORDER BY icd10_id ASC LIMIT 10";
    $icd10Query = mysql_query($icd10SQL) or die(mysql_error()."[".$icd10SQL."]");
?>

    <h4 class="uk-heading-divider">ส่วนที่ 3 สรุปข้อมูลปัญหา</h4>
    <div class="uk-form-horizontal">
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">วินิจฉัยหลัก</label>
            <select name="mainproblem[]" class="ui search selection dropdown uk-width-1-2@m" id="select-mainproblem">
                <option value="">พิมพ์ชื่อ หรือรหัส</option>
                
            </select>
        </div>
        <hr>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">ปัญหา</label>
            <select name="problem[]" class="ui search multiple selection dropdown uk-width-1-2@m" multiple="" id="select-problem">
                <option value="">พิมพ์ชื่อ หรือรหัส</option>
                <?php 
                    while ($icd10Row = mysql_fetch_array($icd10Query)) {
                        echo "<option value='".$icd10Row['icd10_id']."'>".$icd10Row['icd10_id']." ".$icd10Row['icd10_name']."</option>";
                    }
                ?> 
            </select>
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>