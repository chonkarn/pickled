<div class="uk-form-horizontal">
    <h4 class="uk-heading-divider">ส่วนที่ 4 สรุปหลังประชุม</h4>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">สรุปคำแนะนำ</label>
        <div class="uk-form-controls">
            <textarea name="suggestion" class="uk-textarea uk-width-1-2@m" rows="3" placeholder="โปรดระบุ...">
                <?php echo $suggestion ?>
            </textarea>
        </div>
    </div>
    <h5 class="uk-heading-bullet">วางแผนครั้งต่อไป</h5>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">
            <input class="uk-radio" type="radio" name="next-planning" value="1"> เยี่ยมบ้านต่อ</label>
        <div class="uk-form-controls">
            <label class="uk-margin-right" >วันที่เยี่ยม</label>
            <input class="uk-input uk-form-small uk-width-small" type="date" name="datepicker">
            <br>
            <label class="uk-margin-right">ช่วงเวลา</label>
            <label class="uk-margin-right">
                <input class="uk-radio" type="radio" name="time" value="1" checked> เช้า <small>(9.00 - 12.00)</small></label>
            <label class="uk-margin-right">
                <input class="uk-radio" type="radio" name="time" value="2"> บ่าย <small>(13.00 - 16.00)</small></label>
            <div class="uk-margin">
                <label class="uk-margin-right">แพทย์เยี่ยมบ้าน</label>
<!--                <div class="uk-form-controls">-->
                    <?php
                                        $q = "SELECT user,f_user,l_user FROM tbuser ORDER BY user DESC ";
                                        $r = mysql_query($q) or die(mysql_error()."[".$q."]");
                                        ?>
                        <select name="doctor[]" class="ui search multiple selection dropdown" multiple="" id="select-doctor">
                            <option value="">พิมพ์ชื่อ-นามสกุล หรือรหัสประจำตัว</option>
                            <?php
                                        while ($ro = mysql_fetch_array($r))
                                        {
                                            echo "<option value='".$ro['user']."'>".$ro['f_user']." ".$ro['l_user']." (".$ro['user'].")"."</option>";
                                        }
                                    ?>
                        </select>
<!--                </div>-->
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">
            <input class="uk-radio" type="radio" name="next-planning" value="2"> ปิดเยี่ยมบ้าน</label>
        <div class="uk-form-controls">
            <label class="uk-margin-right">เหตุผล:</label>
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