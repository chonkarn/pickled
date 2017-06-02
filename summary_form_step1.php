<div class="uk-form-horizontal">
    <h4 class="uk-heading-divider">ส่วนที่ 1 ข้อมูลทั่วไป</h4>
    <div class="uk-margin">
        <label class="uk-form-label">เหตุผลการเยี่ยมบ้าน</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason_visit" value="1" checked> Assessment</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason_visit" value="2"> Illness management</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason_visit" value="3"> Palliative</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason_visit" value="4"> Post hospitalized</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ยาที่ใช้ปัจจุบันและยาที่ซื้อกินเอง</label>
        <div class="uk-form-controls uk-form-controls-text">
            <textarea name="med" class="uk-textarea uk-width-1-2@m" rows="3" placeholder="โปรดระบุ..."></textarea>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Impairment / Immobility</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Basic activities of daily living</label>
        <div class="uk-form-controls uk-form-controls-text">
<!--
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="1" name="basic_act" id="basic_act_yes" checked> Yes</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="0" name="basic_act" id="basic_act_no"> No</label>
-->
            <input class="uk-checkbox" type="checkbox" name="basic_act"> มีปัญหา
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <label class="uk-margin-right uk-text-bold">เลือกปัญหา</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" name="basic_act_dress"> Dressing</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" name="basic_act_eat"> Eating</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" name="basic_act_ambu"> Ambulating</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" name="basic_act_toilet"> Toileting</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" name="basic_act_hygine"> Hygine</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Instrumental activities of daily living</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-1">
<!--
                    <label class="uk-margin-right"><input class="uk-radio " type="radio" name="instru_act" checked> Yes</label>
                    <label><input class="uk-radio" type="radio" name="instru_act"> No</label>
-->
                    <input class="uk-checkbox" type="checkbox" name="instru_act"> มีปัญหา
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-width-1-1">
                    <label class="uk-margin-right uk-text-bold">เลือกปัญหา</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="1" name="instru_act_shop"> Shopping</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="2" name="instru_act_house"> Houskeeping</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="3" name="instru_act_med"> Medication</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="4" name="instru_act_fin"> Financial</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" value="5" name="instru_act_tech"></label> Transpoting / Technology
                </div>
            </div>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Nutrition</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Nutritional status</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="1" name="nutrition_status" checked> Healthy</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="2" name="nutrition_status"> Obesity</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="3" name="nutrition_status"> Malnutrition</label>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Home environment / Safety</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Risk</label>
        <div class="uk-form-controls uk-form-controls-text">
<!--
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="1" name="home_risk" checked> Yes</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="0" name="home_risk"> No</label>
-->
            <input class="uk-checkbox" type="checkbox" name="home_risk"> มีปัญหา
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Place at risk</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-width-1-2@s"><input class="uk-input uk-form-small" name="home_place" placeholder="โปรดระบุ..."></div>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Social support</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Caregiver burden</label>
        <div class="uk-form-controls uk-form-controls-text">
<!--
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="1" name="caregiver_burden" checked> Yes</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" value="0" name="caregiver_burden"> No</label>
-->
            <input class="uk-checkbox" type="checkbox" name="caregiver_burden"> มีปัญหา
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Main caregiver</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-width-1-2@s"><input class="uk-input uk-form-small" name="main_caregiver" placeholder="โปรดระบุ..."></div>
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
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="pre_drug" checked> Yes</label>
                    <label><input class="uk-radio" type="radio" name="pre_drug"> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input name="pre_drug_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Nonprescription drug</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right"><input class="uk-radio " type="radio" name="non_drug" checked> Yes</label>
                    <label><input class="uk-radio" type="radio" name="non_drug"> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input name="non_drug_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Dietary supplement</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right"><input class="uk-radio " type="radio" name="diet_sup" checked> Yes</label>
                    <label><input class="uk-radio" type="radio" name="diet_sup"> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input name="diet_sup_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Medication compliance</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right"><input class="uk-radio " type="radio" name="med_com" checked> Yes</label>
                    <label><input class="uk-radio" type="radio" name="med_com"> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input name="med_com_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    
</div>
