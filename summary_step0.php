<div class="uk-form-horizontal">
    <h4 class="uk-heading-divider">
        สรุปข้อมูลเยี่ยมบ้าน</h4>
    <div class="uk-margin">
        <label class="uk-form-label">เลขที่โรงพยาบาล</label>
        <div class="uk-form-controls uk-form-controls-text">
            HN
            <?php echo $patient_hn ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ชื่อ-นามสกุลผู้ป่วย</label>
        <div class="uk-form-controls uk-form-controls-text">
            <?php echo $patient_name ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">สถานะเยี่ยมบ้าน
                                        </label>
        <div class="uk-form-controls uk-form-controls-text">
            <?php echo $visit_status ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ประเภทการเยี่ยมบ้าน</label>
        <div class="uk-form-controls uk-form-controls-text">
            <?php echo $visit_type ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">วันที่เยี่ยม</label>
        <div class="uk-form-controls uk-form-controls-text">
            <?php echo $date_visit ?>
            <!--2/2/2560 <small>(เช้า)</small>-->
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">เวลาที่เยี่ยม</label>
        <div class="uk-form-controls uk-form-controls-text">
            <?php echo $time_visit ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">เยี่ยมครั้งที่</label>
        <div class="uk-form-controls uk-form-controls-text">
            <?php echo $num_visit ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">แพทย์เจ้าของไข้</label>
        <div class="uk-form-controls uk-form-controls-text">
            <?php echo $doctor_owner ?>
            <small>(<?php echo $doctor_owner_id ?>)</small>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ทีมแพทย์เยี่ยมบ้าน</label>
        <div class="uk-form-controls uk-form-controls-text">
            <ol>
                <li>
                    <?php echo $doctor_owner_id ?>
                </li>
            </ol>
            <!--
                <ol>
                    <li> นพ.นพดล นพกุล <small>(011106)</small></li>
                    <li> นพ.นพดล นพกุล <small>(011106)</small></li>
                </ol>
            -->
        </div>
    </div>
    <hr>
    <div class="uk-margin">
        <label class="uk-form-label">สรุปผลเยี่ยมบ้าน</label>
        <div class="uk-form-controls">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="summary_status" value="1" checked> ได้เยี่ยมบ้าน</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="summary_status" value="2"> ยกเลิกเยี่ยมบ้าน</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="summary_status" value="3"> ปิดเยี่ยมบ้าน</label>
            <br>
            <br> ถ้าไม่ได้เยี่ยมบ้าน โปรดระบุเหตุผล:
            <select name="reason_cancel" class="ui search dropdown" id="select-cancel-reason">                    
                <option value="">เลือกเหตุผล</option>
                <?php 
                    $reason_cancel_file = file_get_contents("txt/reason_cancel.txt");
                    $rows = explode("\n", $reason_cancel_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $row_data = explode("\t", $data);
                        $info[$row]['name'] = $data;
                ?>               
                <option value="<?php echo $info[$row]['name']; ?>">
                    <?php echo $info[$row]['name']; ?>
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
