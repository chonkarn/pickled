<div class="uk-form-horizontal">
    <h4 class="uk-heading-divider">ส่วนที่ 2 รายละเอียดของปัญหา</h4>
    <h5 class="uk-heading-bullet">ประวัติการรักษา</h5>

    <div class="uk-margin">
        <label class="uk-form-label">การผ่าตัด</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="surgery-1" onclick="surgery_check()"><input type="radio" id="surgery-1" class="uk-radio" name="surgery" value="1"> ไม่มี</label>
            <label class="uk-margin-right" for="surgery-2" onclick="surgery_check()"><input type="radio" id="surgery-2" class="uk-radio" name="surgery" value="2"> มี</label>
            <div class="ui small input focus">
                <input type="text" style="visibility:hidden;" id="surgery_input" name="surgery_input" placeholder="โปรดระบุ">
            </div>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label">การแพ้ยา / แพ้อาหาร</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="allgeric-1" onclick="allgeric_check()"><input type="radio" id="allgeric-1" class="uk-radio" name="allergic" value="1"> ไม่มี</label>
            <label class="uk-margin-right" for="allgeric-2" onclick="allgeric_check()"><input type="radio" id="allgeric-2" class="uk-radio" name="allergic" value="2"> มี</label>
            <div class="ui small input focus">
                <input type="text" style="visibility:hidden;" id="allergic_input" name="allergic_input" placeholder="โปรดระบุ">
            </div>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label"> แพทย์ทางเลือก </label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="alternative-1" onclick="alternative_check()"><input type="radio" id="alternative-1" class="uk-radio" name="alternative" value="1" checked> <span class="mdl-radio__label">ไม่มี</span> </label>
            <label class="uk-margin-right" for="alternative-2" onclick="alternative_check()"><input type="radio" id="alternative-2" class="uk-radio" name="alternative" value="2"> <span class="mdl-radio__label">มี</span> </label>
            <div class="ui small input focus">
                <input type="text" style="visibility:hidden;" id="alternative_input" name="alternative_input" placeholder="โปรดระบุ">
            </div>
        </div>
    </div>

    <h5 class="uk-heading-bullet">พฤติกรรมเสี่ยงในปัจจุบัน</h5>

    <div class="uk-margin">
        <label class="uk-form-label">สุรา</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="alcohol-1" onclick="alcohol_check()"><input type="radio" id="alcohol-1" class="uk-radio" name="alcohol" value="1"> ไม่เคยดื่ม</label>
            <label class="uk-margin-right" for="alcohol-2" onclick="alcohol_check()"><input type="radio" id="alcohol-2" class="uk-radio" name="alcohol" value="2"> ดื่มอยู่</label>
            <label class="uk-margin-right" for="alcohol-3" onclick="alcohol_check()"><input type="radio" id="alcohol-3" class="uk-radio" name="alcohol" value="3"> เลิกดื่มแล้ว</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ปัญหาการดื่มสุรา</label>
        <div class="uk-form-controls uk-form-controls-text">
            <input type="checkbox" class="uk-checkbox" name="alcohol_problem" id="alcohol_problem" disabled> มีปัญหา <small>(ในกรณีดื่มอยู่ หรือเลิกดื่มแล้ว)</small>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label">บุหรี่</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-1"><input class="uk-radio" id="cigarette-1" type="radio" name="cigarette" value="1" checked> ไม่เคยสูบ</label>
            <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-2"><input class="uk-radio" id="cigarette-2" type="radio" name="cigarette" value="2"> สูบอยู่</label>
            <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-3"><input class="uk-radio" id="cigarette-3" type="radio" name="cigarette" value="3"> เลิกสูบแล้ว</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ปริมาณการสูบบุหรี่</label>
        <div class="uk-form-controls uk-form-controls-text">
            <small>ถ้ากำลังสูบ หรือเลิกสูบแล้ว โปรดระบุปริมาณการสูบบุหรี่</small>
            <br>
            <label class="uk-margin-right"> จำนวนมวน <input class="uk-input uk-form-width-xsmall uk-form-small" type="number" value="" id="cigarette_amount" name="cigarette_amount" disabled> / วัน</label>
            <label class="uk-margin-right"> ระยะเวลาการสูบ <input class="uk-input uk-form-width-xsmall uk-form-small" type="number" valu="" id="cigarette_period" name="cigarette_period" disabled> / ปี</label>
        </div>
    </div>

    <h5 class="uk-heading-bullet">ประวัติครอบครัว</h5>

    <div class="uk-margin">
        <label class="uk-form-label"> สถานะทางการเงิน </label>
        <div class="uk-form-controls uk-form-controls-text">
            <input class="uk-checkbox" type="checkbox" id="money_problem" name="money_problem"> มีปัญหา
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"> ประวัติโรคในครอบครัว </label>
        <div class="uk-form-controls uk-form-controls-text">
            <input class="uk-checkbox" type="checkbox" id="hypertension" name="hypertension" value="1"> Hypertension
            <br><input class="uk-checkbox" type="checkbox" id="diabetes-mellitus" name="diabetes-mellitus"> Diabetes mellitus
            <br><input class="uk-checkbox" type="checkbox" id="dyslipidemia" name="dyslipidemia"> Dyslipidemia
            <br><input class="uk-checkbox" type="checkbox" id="stroke" name="stroke" value="1"> Stroke
            <br><input class="uk-checkbox" type="checkbox" id="cad" name="cad"> CAD
            <br><input class="uk-checkbox" type="checkbox" id="cancer" name="cancer" onclick="cancer_check()"> Cancer:
            <div class="ui mini input focus">
                <input type="text" id="cancer_input" name="cancer_input" placeholder="โปรดระบุ" disabled>
            </div>
            <br>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" id="other" onclick="other_check()" name="other"> อื่นๆ: </label>
            <div class="ui mini input focus">
                <input type="text" id="other_input" name="other_input" placeholder="โปรดระบุ" disabled>
            </div>
        </div>
    </div>
