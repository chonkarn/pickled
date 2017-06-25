<div class="uk-form-horizontal">
    <h4 class="uk-heading-divider">ส่วนที่ 3 สรุปปัญหา</h4>
    <h5 class="uk-heading-bullet">รหัสการวินิจฉัยปัญหาผู้ป่วย</h5>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">วินิจฉัยหลัก</label>
        <?php
            $icd10SQL = "SELECT icd10_id, icd10_name, icd10_keyword FROM icd10 ORDER BY icd10_id ASC LIMIT 500";
            $icd10Query = mysql_query($icd10SQL) or die(mysql_error()."[".$icd10SQL."]");
        ?>
        <select name="mainproblem[]" class="ui search selection dropdown uk-width-1-2@m" id="select-mainproblem">
            <option value="">พิมพ์รหัสหรือชื่อของโรคและอาการ</option>
            <?php
                while ($icd10Row = mysql_fetch_array($icd10Query)) {
                    echo "<option value='".$icd10Row['icd10_id']."'>".$icd10Row['icd10_id']." ".$icd10Row['icd10_name']."</option>";
                }
            ?>
        </select>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">ปัญหา</label>
        <?php
            $icd10SQL = "SELECT icd10_id, icd10_name, icd10_keyword FROM icd10 ORDER BY icd10_id ASC LIMIT 500";
            $icd10Query = mysql_query($icd10SQL) or die(mysql_error()."[".$icd10SQL."]");
        ?>
        <select name="problem[]" class="ui search multiple selection dropdown uk-width-1-2@m" multiple="" id="select-problem">
            <option value="">พิมพ์รหัสหรือชื่อของโรคและอาการ</option>
            <?php
                while ($icd10Row = mysql_fetch_array($icd10Query)) {
                    echo "<option value='".$icd10Row['icd10_id']."'>".$icd10Row['icd10_id']." ".$icd10Row['icd10_name']."</option>";
                }
            ?>
        </select>
    </div>
</div>
