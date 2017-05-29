<div class="uk-form-horizontal">
    <h5 class="uk-heading-bullet">ประวัติการรักษา</h5>
    <div class="uk-margin">
        <label class="uk-form-label">การผ่าตัด</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="surgery-1" onclick="surgery_check()"><input type="radio" id="surgery-1" class="uk-radio" name="surgery" value="1" checked> ไม่มี</label>
            <label class="uk-margin-right" for="surgery-2" onclick="surgery_check()"><input type="radio" id="surgery-2" class="uk-radio" name="surgery" value="2"> มี</label>
        </div>
        <div class="uk-form-controls uk-form-controls-text" id="div_surgery" style="visibility:hidden;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="surgery_input">
                <label class="mdl-textfield__label" for="fname">ระบุ</label>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">การแพ้ยา / แพ้อาหาร</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="allgeric-1" onclick="allgeric_check()"><input type="radio" id="allgeric-1" class="uk-radio" name="allergic" value="1" checked> ไม่มี</label>
            <label class="uk-margin-right" for="allgeric-2" onclick="allgeric_check()"><input type="radio" id="allgeric-2" class="uk-radio" name="allergic" value="2"> มี</label>
        </div>
        <div class="uk-form-controls uk-form-controls-text" id="div_allgeric" style="visibility:hidden;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="allergic_input"> </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"> แพทย์ทางเลือก </label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="alternative-1" onclick="alternative_check()"><input type="radio" id="alternative-1" class="uk-radio" name="alternative" value="1" checked> <span class="mdl-radio__label">ไม่มี</span> </label>
            <label class="uk-margin-right" for="alternative-2" onclick="alternative_check()"><input type="radio" id="alternative-2" class="uk-radio" name="alternative" value="2"> <span class="mdl-radio__label">มี</span> </label>
        </div>
        <div class="uk-form-controls uk-form-controls-text" id="div_alternative" style="visibility:hidden;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="alternative_input">
                <label class="uk-margin-right" for="fname">ระบุ</label> <span class="mdl-textfield__error">กรอกเพียงตัวอักษร</span>
            </div>
        </div>
    </div>
    <hr>
    <h5>พฤติกรรมเสี่ยงในปัจจุบัน</h5>
    <div class="uk-margin">
        <label class="uk-form-label"> สุรา </label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="alcohol-1" onclick="alcohol_check()"><input type="radio" id="alcohol-1" class="uk-radio" name="alcohol" value="1" checked> <span class="mdl-radio__label"><u>ไม่</u>เคยดื่ม</span> </label>
            <label class="uk-margin-right" for="alcohol-2" onclick="alcohol_check()"><input type="radio" id="alcohol-2" class="uk-radio" name="alcohol" value="2"> <span class="mdl-radio__label">ดื่มอยู่</span> </label>
            <label class="uk-margin-right" for="alcohol-3" onclick="alcohol_check()"><input type="radio" id="alcohol-3" class="uk-radio" name="alcohol" value="3"> <span class="mdl-radio__label">เลิกดื่มแล้ว</span> </label>
        </div>
        <div id="div_alcohol" class="uk-form-controls uk-form-controls-text" style="visibility:hidden;"> <small>ถ้าเคยดื่ม หรือ กำลังดื่มอยู่</small>
            <br>
            <label class="uk-margin-right" for="drink"><input type="checkbox" id="drink" class="uk-checkbox" name="alcohol_input"> <span class="uk-margin-right">มีปัญหา เกี่ยวกับการดื่ม</span> </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"> บุหรี่ </label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-1"><input class="uk-radio" id="cigarette-1" type="radio" name="cigarette" value="1" checked> ไม่เคยสูบ</label>
            <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-2"><input class="uk-radio" id="cigarette-2" type="radio" name="cigarette" value="2"> สูบอยู่</label>
            <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-3"><input class="uk-radio" id="cigarette-3" type="radio" name="cigarette" value="3"> เลิกสูบแล้ว</label>
        </div>
        <div class="uk-form-controls uk-form-controls-text" id="div_cigarette" style="visibility:hidden;">
            <br> <small>ถ้าท่านกำลังสูบ หรือเลิกสูบแล้ว โปรดระบุปริมาณการสูบบุหรี่</small>
            <br>
            <label class="uk-margin-right"> จำนวนมวน<input class="uk-input uk-form-width-xsmall uk-form-small" type="number" placeholder="" name="cigarette_amout"> / วัน</label>
            <label class="uk-margin-right"> ระยะเวลาการสูบ
            <input class="uk-input uk-form-width-xsmall uk-form-small" type="number" placeholder="" name="cigarette_period"> / ปี</label>
        </div>
    </div>
    <hr>
    <h5>ประวัติครอบครัว</h5>
    <div class="uk-margin">
        <label class="uk-form-label"> สถานะทางการเงิน </label>
        <div class="uk-form-controls uk-form-controls-text">
            <input class="uk-checkbox" type="checkbox" id="money" name="money"> มีปัญหา
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"> ประวัติโรคในครอบครัว </label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" id="hypertension" name="hypertension" value="1"> Hypertension</label>
            <br>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" id="diabetes-mellitus" name="diabetes-mellitus"> Diabetes mellitus</label>
            <br>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" id="dyslipidemia" name="dyslipidemia"> Dyslipidemia</label>
            <br>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" id="stroke" name="stroke" value="1"> Stroke</label>
            <br>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" id="cad" name="cad"> CAD</label>
            <br>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" id="cancer" name="cancer"> Cancer:</label>
            <input class="uk-input uk-form-width-medium uk-form-small" type="text" placeholder="ระบุ" name="cancer_input">
            <br>
            <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" id="other" name="other"> อื่นๆ: </label>
            <input class="uk-input uk-form-width-medium uk-form-small" type="text" placeholder="ระบุ" name="other_input"> </div>
    </div>
</div>
