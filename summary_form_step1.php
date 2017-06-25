<div class="uk-form-horizontal">
    <h4 class="uk-heading-divider">ส่วนที่ 1 ข้อมูลทั่วไป</h4>
    <div class="uk-margin">
        <label class="uk-form-label">เหตุผลการเยี่ยมบ้าน</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason_visit" value="1" <?php if($reason_visit==1){ echo "checked"; } ?> /> Assessment</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason_visit" value="2" <?php if($reason_visit==2){ echo "checked"; } ?> /> Illness management</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason_visit" value="3" <?php if($reason_visit==3){ echo "checked"; } ?> /> Palliative</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason_visit" value="4" <?php if($reason_visit==4){ echo "checked"; } ?> /> Post hospitalized</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ยาที่ใช้ปัจจุบันและยาที่ซื้อกินเอง</label>
        <div class="uk-form-controls uk-form-controls-text">
            <textarea name="med" class="uk-textarea uk-width-1-2@m" rows="3" placeholder="โปรดระบุ..."><?php echo $med ?></textarea>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Impairment / Immobility</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Basic activities of daily living</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label><input name="basic_act" class="uk-checkbox" type="checkbox" value="1" <?php if($basic_act==1){echo "checked";} ?> /> มีปัญหา</label>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <label class="uk-margin-right uk-text-bold">เลือกปัญหา</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="basic_act_dress" <?php if($basic_act_dress==1){ echo "checked"; } ?> /> Dressing</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="basic_act_eat" <?php if($basic_act_eat==1){ echo "checked"; } ?> /> Eating</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="basic_act_ambu" <?php if($basic_act_ambu==1){ echo "checked"; } ?> /> Ambulating</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="basic_act_toilet" <?php if($basic_act_toilet==1){ echo "checked"; } ?> /> Toileting</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="basic_act_hygine" <?php if($basic_act_hygine==1){ echo "checked"; } ?> /> Hygine</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Instrumental activities of daily living</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <label><input name="instru_act" value="1" class="uk-checkbox" type="checkbox" <?php if($instru_act==1){ echo "checked"; } ?> /> มีปัญหา</label>
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-width-1-1">
                    <label class="uk-margin-right uk-text-bold">เลือกปัญหา</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="instru_act_shop" <?php if($instru_act_shop==1){ echo "checked"; } ?> /> Shopping</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="instru_act_house" <?php if($instru_act_house==1){ echo "checked"; } ?> /> Houskeeping</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="instru_act_med" <?php if($instru_act_med==1){ echo "checked"; } ?> /> Medication</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="instru_act_fin" <?php if($instru_act_fin==1){ echo "checked"; } ?> /> Financial</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="instru_act_tech" <?php if($instru_act_tech==1){ echo "checked"; } ?> /> Transpoting / Technology</label>
                </div>
            </div>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Nutrition</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Nutritional status</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="1" name="nutrition_status" <?php if($nutrition_status==1){ echo "checked"; } ?> /> Healthy</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="2" name="nutrition_status" <?php if($nutrition_status==2){ echo "checked"; } ?> /> Obesity</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="3" name="nutrition_status" <?php if($nutrition_status==3){ echo "checked"; } ?> /> Malnutrition</label>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Home environment / Safety</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Risk</label>
        <div class="uk-form-controls uk-form-controls-text">
            <input name="home_risk" value="1" class="uk-checkbox" type="checkbox" <?php if($home_risk==1){ echo "checked"; } ?> /> มีความเสี่ยง
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Place at risk</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-width-1-2@s"><input class="uk-input uk-form-small" name="home_place" placeholder="โปรดระบุ..." value="<?php if($home_place != NULL){ echo $home_place; } ?>"></div>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Social support</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Caregiver burden</label>
        <div class="uk-form-controls uk-form-controls-text">
            <input name="caregiver_burden" value="1" class="uk-checkbox" type="checkbox" <?php if($caregiver_burden==1){ echo "checked"; } ?> /> มีปัญหา
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Main caregiver</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-width-1-2@s"><input name="main_caregiver" class="uk-input uk-form-small" placeholder="โปรดระบุ..." value="<?php if($main_caregiver != NULL){ echo $main_caregiver; } ?>" /></div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">สิทธิ์การรักษา</label>
        <div class="uk-form-controls">
            <select class="ui search selection dropdown uk-width-1-2@s" id="select-healthinsure" name="healthinsure">
                <?php
                    $healthinsureSQL = "SELECT insure_id, insure_name FROM healthinsure ORDER BY insure_id ASC";
                    $healthinsureQuery = mysql_query($healthinsureSQL) or die(mysql_error()."[".$healthinsureSQL."]");
                ?>
                <option value="">เลือกสิทธิ์การรักษา</option>
                <?php
                    while ($healthinsureRow = mysql_fetch_array($healthinsureQuery)) {
                        echo "<option value='".$healthinsureRow['insure_id']."'>"
                            .$healthinsureRow['insure_name']
                            ."</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <h5 class="uk-heading-bullet">Medication</h5>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Prescription drug</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="pre_drug" value="1" <?php if($pre_drug==1){ echo "checked"; } ?> /> Yes</label>
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="pre_drug" value="2" <?php if($pre_drug==2){ echo "checked"; } ?> /> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input name="pre_drug_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php if($pre_drug_text != NULL){ echo $pre_drug_text; } ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Nonprescription drug</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="non_drug" value="1" <?php if($non_drug==1){ echo "checked"; } ?> /> Yes</label>
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="non_drug" value="2" <?php if($non_drug==2){ echo "checked"; } ?> /> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input name="non_drug_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php if($non_drug_text != NULL){ echo $pre_drug_text; } ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Dietary supplement</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="diet_sup" value="1" <?php if($diet_sup==1){ echo "checked"; } ?> /> Yes</label>
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="diet_sup" value="2" <?php if($diet_sup==2){ echo "checked"; } ?>/> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input name="diet_sup_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php if($diet_sup_text != NULL){ echo $pre_drug_text; } ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Medication compliance</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="med_com" value="1" <?php if($med_com==1){ echo "checked"; } ?> /> Yes</label>
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="med_com" value="2" <?php if($med_com==2){ echo "checked"; } ?> /> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input name="med_com_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php if($med_com_text != NULL){ echo $pre_drug_text; } ?>">
                </div>
            </div>
        </div>
    </div>
</div>
