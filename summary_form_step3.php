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
                    <input name="manage_assess" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_assess==1){ echo "checked"; } ?> /> Assessment
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_assess_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_assess_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input name="manage_pain" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_pain==1){ echo "checked"; } ?> /> Pain & Symptom management
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_pain_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_pain_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input name="manage_med" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_med==1){ echo "checked"; } ?> /> Medication management
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_med_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_med_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input name="manage_procedure" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_procedure==1){ echo "checked"; } ?> /> Procedure
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_procedure_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_procedure_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input name="manage_fammeet" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_fammeet==1){ echo "checked"; } ?> /> Family meeting
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_fammeet_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_fammeet_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s uk-text-truncate">
                    <input name="manage_social" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_social==1){ echo "checked"; } ?> /> Social support & Health insurance
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_social_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_social_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input name="manage_psycho" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_psycho==1){ echo "checked"; } ?> /> Psychological care
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_psycho_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_psycho_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input name="manage_rehab" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_rehab==1){ echo "checked"; } ?> /> Rehabilitation
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_rehab_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_rehab_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"></label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input name="manage_choice" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_choice==1){ echo "checked"; } ?> /> Advance direction choice
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_choice_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_choice_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"></label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s uk-text-truncate">
                    <input name="manage_dying" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_dying==1){ echo "checked"; } ?> /> Dying<br>
                    <small>Funeral plan / Grief bereavement care</small>
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_dying_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_dying_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"></label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3@s">
                    <input name="manage_other" value="1" class="uk-checkbox" type="checkbox" <?php if($manage_other==1){ echo "checked"; } ?> /> Other specify
                </div>
                <div class="uk-width-1-2@s">
                    <input name="manage_other_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $manage_other_text ?>" />
                </div>
            </div>
        </div>
    </div>
</div>