<h4 class="uk-heading-divider">ส่วนที่ 3 สรุปข้อมูลปัญหา</h4>

<div class="uk-form-horizontal">
    
    <h5 class="uk-heading-bullet">รหัสการวินิจฉัยปัญหาผู้ป่วย </h5>
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
        
    <h5 class="uk-heading-bullet">Management</h5>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input class="uk-checkbox" type="checkbox"> Assessment
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input class="uk-checkbox" type="checkbox"> Pain & Symptom management
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input class="uk-checkbox" type="checkbox"> Medication management
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small " placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input class="uk-checkbox" type="checkbox"> Procedure
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input class="uk-checkbox" type="checkbox"> Family meeting
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s uk-text-truncate">
                    <input class="uk-checkbox" type="checkbox"> Social support & Health insurance
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input class="uk-checkbox" type="checkbox"> Psychological care
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input class="uk-checkbox" type="checkbox"> Rehabilitation
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"></label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input class="uk-checkbox" type="checkbox"> Advance direction choice
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"></label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s uk-text-truncate">
                    <input class="uk-checkbox" type="checkbox"> Dying<br>
                    <small>Funeral plan / Grief bereavement care</small>
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"></label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input class="uk-checkbox" type="checkbox"> Other specify
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
</div>