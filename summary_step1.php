<h4 class="uk-heading-divider">ส่วนที่ 1 ข้อมูลทั่วไป</h4>
<div class="uk-form-horizontal">
    <div class="uk-margin">
        <label class="uk-form-label">เหตุผลการเยี่ยมบ้าน</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason" checked> Assessment</label>
            <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="reason"> Illness management</label>
            <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="reason"> Palliative</label>
            <label class="uk-margin-right">
                                            <input class="uk-radio" type="radio" name="reason"> Post hospitalized</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">ทีมแพทย์เยี่ยมบ้าน</label>
        <div class="uk-form-controls">
            <?php
                $docterSQL = "SELECT user,f_user,l_user FROM tbuser ORDER BY user ASC";
                $docterQuery = mysql_query($docterSQL) or die(mysql_error()."[".$docterSQL."]");
            ?>
                <select name="doctor[]" class="ui search multiple selection dropdown uk-width-1-2@m" multiple="" id="selecter">
                <option value="">พิมพ์ชื่อ-นามสกุล หรือรหัสประจำตัว</option>
                <?php 
                    while ($docterRow = mysql_fetch_array($docterQuery)) {
                        echo "<option value='".$docterRow['user']."'>".$docterRow['f_user']." ".$docterRow['l_user']." (".$docterRow['user'].")"."</option>";
                    }
                ?>   
            </select>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label">ยาที่ใช้ปัจจุบันและยาที่ซื้อกินเอง</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-auto">
                    <label class="uk-margin-right uk-text-bold">ชื่อยา</label>
                    <input class="uk-input uk-form-width-medium uk-form-small" placeholder="ชื่อยา...">
                </div>
                <div>
                    <label class="uk-margin-right uk-text-bold">ลักษณะ</label>
                    <label class="uk-margin-right">
                                                    <input class="uk-radio" type="radio" name="unit" checked> ยาเม็ด
                                                </label>
                    <label class="uk-margin-right">
                                                    <input class="uk-radio" type="radio" name="unit"> ยาน้ำ
                                                </label>
                </div>
                <div>
                    <label class="uk-margin-right uk-text-bold">โดส</label>
                    <input class="uk-input uk-form-width-xsmall uk-form-small" type="number" placeholder="1"> เม็ด
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-auto">
                    <label class="uk-margin-right uk-text-bold">วิธีใช้ยา</label>
                    <label class="uk-margin-right">
                                                    <input class="uk-radio" type="radio" name="method" checked> ก่อนอาหาร</label>
                    <label class="uk-margin-right">
                                                    <input class="uk-radio" type="radio" name="method"> หลังอาหาร</label>
                </div>
                <div>
                    <label class="uk-margin-right uk-text-bold">ช่วงเวลา</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> เช้า
                                                </label>
                    <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> กลางวัน
                                                </label>
                    <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> เย็น
                                                </label>
                    <label class="uk-margin-right">
                                                    <input class="uk-checkbox" type="checkbox"> ก่อนนอน
                                                </label>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <button class="uk-button uk-button-default uk-button-small button-green">+ เพิ่มยาที่ใช้</button>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Impairment / Immobility</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Basic activities of daily living</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-radio " type="radio" name="basic" checked> Yes</label>
            <label><input class="uk-radio" type="radio" name="basic"> No</label>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <label class="uk-margin-right uk-text-bold">Problem</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Dressing</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Eating</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Ambulating</label>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Toileting</label>
            <input class="uk-checkbox" type="checkbox"> Hygine
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Instrumental activities of daily living</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <label class="uk-margin-right"><input class="uk-radio " type="radio" name="instrument" checked> Yes</label>
                    <label><input class="uk-radio" type="radio" name="instrument"> No</label>
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-width-1-1">
                    <label class="uk-margin-right"><b>Problem</b></label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Shopping</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Houskeeping</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Medication</label>
                    <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Financial</label>
                    <input class="uk-checkbox" type="checkbox"> Transpoting / Technology
                    <br>
                </div>
            </div>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Nutrition</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Nutritional status</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="nutrition" checked> Healthy</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="nutrition"> Obesity</label>
            <input class="uk-radio" type="radio" name="nutrition"> Malnutrition
        </div>
    </div>

    <h5 class="uk-heading-bullet">Home environment / Safety</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Risk</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-radio " type="radio" name="risk" checked> Yes</label>
            <label><input class="uk-radio" type="radio" name="risk"> No</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Place at risk</label>
        <div class="uk-form-controls uk-form-controls-text">
            <select class="uk-select uk-width-1-2@s uk-form-small">
                <option>เลือก Place at risk</option>
                <option>1 สัปดาห์</option>
                <option>2 สัปดาห์</option>
                <option>3 สัปดาห์</option>
                <option>1 เดือน</option>
                <option>2 เดือน</option>
                <option>3 เดือน</option>
            </select>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Social support</h5>
    <div class="uk-margin">
        <label class="uk-form-label">Caregiver burden</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="caregiver" checked> Yes</label>
            <label><input class="uk-radio" type="radio" name="caregiver"> No</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Main caregiver</label>
        <div class="uk-form-controls uk-form-controls-text">
            <select class="uk-select uk-width-1-2@s uk-form-small">
                <option>เลือก Main caregiver</option>
                <option>1 สัปดาห์</option>
                <option>2 สัปดาห์</option>
                <option>3 สัปดาห์</option>
                <option>1 เดือน</option>
                <option>2 เดือน</option>
                <option>3 เดือน</option>
            </select>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">สิทธิ์การรักษา</label>
        <div class="uk-form-controls">
            <select name="healthinsure" class="ui search selection dropdown uk-width-1-2@s" id="select-healthinsure">
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
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="prescription" checked> Yes</label>
                    <label><input class="uk-radio" type="radio" name="prescription"> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Nonprescription drug</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right"><input class="uk-radio " type="radio" name="nonprescription" checked> Yes</label>
                    <label><input class="uk-radio" type="radio" name="nonprescription"> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Dietary supplement</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right"><input class="uk-radio " type="radio" name="supplement" checked> Yes</label>
                    <label><input class="uk-radio" type="radio" name="supplement"> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Medication compliance</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right"><input class="uk-radio " type="radio" name="compliance" checked> Yes</label>
                    <label><input class="uk-radio" type="radio" name="compliance"> No</label>
                </div>
                <div class="uk-width-1-2@s">
                    <input class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม...">
                </div>
            </div>
        </div>
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
