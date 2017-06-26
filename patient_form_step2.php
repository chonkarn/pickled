<div class="uk-form-horizontal">
    <h4 class="uk-heading-divider">ส่วนที่ 2 รายละเอียดของปัญหา</h4>
    <h5 class="uk-heading-bullet">ประวัติการรักษา</h5>

    <div class="uk-margin">
        <label class="uk-form-label">การผ่าตัด</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="surgery-1" onclick="surgery_check()"><input type="radio" id="surgery-1" class="uk-radio" name="surgery" value="1" <?php if($surgery==1){echo "checked"; } ?> /> ไม่มี</label>
            <label class="uk-margin-right" for="surgery-2" onclick="surgery_check()"><input type="radio" id="surgery-2" class="uk-radio" name="surgery" value="2" <?php if($surgery==2){echo "checked"; } ?> /> มี</label>
            <div class="ui small input focus">
                <input type="text" style="visibility:hidden;" id="surgery_input" name="surgery_input" placeholder="โปรดระบุ" value="<?php echo $surgery_input ?>" />
            </div>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label">การแพ้ยา / แพ้อาหาร</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="allgeric-1" onclick="allgeric_check()"><input type="radio" id="allgeric-1" class="uk-radio" name="allergic" value="1" <?php if($allergic==1){echo "checked"; } ?> /> ไม่มี</label>
            <label class="uk-margin-right" for="allgeric-2" onclick="allgeric_check()"><input type="radio" id="allgeric-2" class="uk-radio" name="allergic" value="2" <?php if($allergic==2){echo "checked"; } ?> /> มี</label>
            <div class="ui small input focus">
                <input type="text" style="visibility:hidden;" id="allergic_input" name="allergic_input" placeholder="โปรดระบุ" value="<?php echo $allergic_input ?>" />
            </div>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label">แพทย์ทางเลือก</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="alternative-1" onclick="alternative_check()"><input type="radio" id="alternative-1" class="uk-radio" name="alternative" value="1" <?php if($alternative==1){echo "checked"; } ?> /> ไม่มี</label>
            <label class="uk-margin-right" for="alternative-2" onclick="alternative_check()"><input type="radio" id="alternative-2" class="uk-radio" name="alternative" value="2" <?php if($alternative==2){echo "checked"; } ?> /> มี </label>
            <div class="ui small input focus">
                <input type="text" style="visibility:hidden;" id="alternative_input" name="alternative_input" placeholder="โปรดระบุ" value="<?php echo $alternative_input ?>" />
            </div>
        </div>
    </div>

    <h5 class="uk-heading-bullet">พฤติกรรมเสี่ยงในปัจจุบัน</h5>

    <div class="uk-margin">
        <label class="uk-form-label">สุรา</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" for="alcohol-1" onclick="alcohol_check()"><input type="radio" id="alcohol-1" class="uk-radio" name="alcohol" value="1" <?php if($alcohol==1){echo "checked"; } ?> /> ไม่เคยดื่ม</label>
            <label class="uk-margin-right" for="alcohol-2" onclick="alcohol_check()"><input type="radio" id="alcohol-2" class="uk-radio" name="alcohol" value="2" <?php if($alcohol==2){echo "checked"; } ?> /> ดื่มอยู่</label>
            <label class="uk-margin-right" for="alcohol-3" onclick="alcohol_check()"><input type="radio" id="alcohol-3" class="uk-radio" name="alcohol" value="3" <?php if($alcohol==3){echo "checked"; } ?> /> เลิกดื่มแล้ว</label>
        </div>
    </div>
    <div class="uk-margin" style="visibility:hidden;" id="div_alcohol">
        <label class="uk-form-label">ปัญหาการดื่มสุรา</label>
        <div class="uk-form-controls uk-form-controls-text">
          <div class="ui checkbox">
            <input type="checkbox" tabindex="1" class="hidden" name="alcohol_problem" id="alcohol_problem" value="1" <?php if($alcohol_problem==1){echo "checked";} ?> />
            <label>มีปัญหา <small>(ในกรณีดื่มอยู่ หรือเลิกดื่มแล้ว)</small></label>
          </div>

            <!-- <input type="checkbox" class="uk-checkbox" name="alcohol_problem" id="alcohol_problem"  /> มีปัญหา <small>(ในกรณีดื่มอยู่ หรือเลิกดื่มแล้ว)</small> -->
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label">บุหรี่</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-1"><input class="uk-radio" id="cigarette-1" type="radio" name="cigarette" value="1" <?php if($cigarette==1){echo "checked"; } ?> /> ไม่เคยสูบ</label>
            <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-2"><input class="uk-radio" id="cigarette-2" type="radio" name="cigarette" value="2" <?php if($cigarette==2){echo "checked"; } ?> /> สูบอยู่</label>
            <label class="uk-margin-right" onclick="cigarette_check()" for="cigarette-3"><input class="uk-radio" id="cigarette-3" type="radio" name="cigarette" value="3" <?php if($cigarette==3){echo "checked"; } ?> /> เลิกสูบแล้ว</label>
        </div>
    </div>

    <div class="uk-margin" style="visibility:hidden;" id="div_cigarette">
        <label class="uk-form-label">ปริมาณการสูบบุหรี่</label>
        <div class="uk-form-controls uk-form-controls-text">
            <small>ถ้ากำลังสูบ หรือเลิกสูบแล้ว โปรดระบุปริมาณการสูบบุหรี่</small>
            <br>
            <div class="ui mini form">
              <div class="inline fields">
                <label>จำนวนมวน</label>
                <div class="inline two wide field">
                   <input type="number" value="" id="cigarette_amount" name="cigarette_amount" <?php if($cigarette_amount!=NULL){echo $cigarette_amount;} ?> />
                </div>
                / วัน

                <label class="uk-margin-left">ระยะเวลาการสูบ</label>
                <div class="inline two wide field">
                   <input type="number" valu="" id="cigarette_period" name="cigarette_period" <?php if($cigarette_period!=NULL){echo $cigarette_period;} ?> />
                </div>
                / ปี
              </div>
            </div>
        </div>
    </div>

    <h5 class="uk-heading-bullet">ประวัติครอบครัว</h5>

    <div class="uk-margin">
        <label class="uk-form-label">สถานะทางการเงิน</label>
        <div class="uk-form-controls uk-form-controls-text">
          <div class="ui checkbox">
            <input type="checkbox" tabindex="1" class="hidden" id="money_problem" name="money_problem" value="1" <?php if($money_problem == 1){ echo "checked"; } ?> />
            <label>มีปัญหา</label>
          </div>

            <!-- <input class="uk-checkbox" type="checkbox" id="money_problem" name="money_problem" value="1"  /> มีปัญหา -->
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ประวัติโรคในครอบครัว</label>
        <div class="uk-form-controls uk-form-controls-text">
          <div class="ui checkbox">
            <input type="checkbox" tabindex="1" class="hidden" value="1" name="hypertansion" <?php if($hypertansion == 1){ echo "checked"; } ?> />
            <label>Hypertension</label>
          </div>
          <br>
          <div class="ui checkbox">
            <input type="checkbox" tabindex="2" class="hidden" value="1" name="diabetes_mellitus" <?php if($diabetes_mellitus == 1){ echo "checked"; } ?> />
            <label>Diabetes mellitus</label>
          </div>
          <br>
          <div class="ui checkbox">
            <input type="checkbox" tabindex="3" class="hidden" value="1" name="dyslipidemia" <?php if($dyslipidemia == 1){ echo "checked"; } ?> />
            <label>Dyslipidemia</label>
          </div>
          <br>
          <div class="ui checkbox">
            <input type="checkbox" tabindex="4" class="hidden" value="1" name="stroke" <?php if($stroke == 1){ echo "checked"; } ?> />
            <label>Stroke</label>
          </div>
          <br>
          <div class="ui checkbox">
            <input type="checkbox" tabindex="5" class="hidden" value="1" name="cad" <?php if($cad == 1){ echo "checked"; } ?> />
            <label>CAD</label>
          </div>
          <br>
          <div class="ui checkbox" id="cancer" onclick="cancer_check()">
            <input type="checkbox" tabindex="6" class="hidden" value="1" name="cancer" <?php if($cancer == 1){ echo "checked"; } ?> />
            <label>Cancer:</label>
          </div>
          <div class="ui mini input focus">
              <input type="text" id="cancer_input" name="cancer_input" placeholder="โปรดระบุ" value="<?php echo $cancer_input ?>" style="visibility:hidden;">
          </div>
          <br>
          <div class="ui checkbox" id="other" onclick="other_check()">
            <input type="checkbox" tabindex="7" class="hidden" value="1" name="other" <?php if($other == 1){ echo "checked"; } ?> />
            <label>Other:</label>
          </div>
          <div class="ui mini input focus">
              <input type="text" id="other_input" name="other_input" placeholder="โปรดระบุ" value="<?php echo $other_input ?>" style="visibility:hidden;">
          </div>
        </div>
    </div>
