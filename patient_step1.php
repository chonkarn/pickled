<div class="uk-form-horizontal">
    <div class="uk-margin">
        <label class="uk-form-label">รหัสโรงพยาบาล</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="ui input">
                <input type="text" name="hn" placeholder="HN" value="<?php echo $hn ?>">
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">สถานะเยี่ยมบ้าน</label>
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
        <label class="uk-form-label">เลขบัตรประชาชน</label>
        <div class="uk-form-controls">
            <div class="ui input">
                <input type="text" name="id-card" placeholder="โปรดระบุ" value="<?php echo $patient_id ?>">
            </div>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label">ชื่อ-นามสกุล</label>
        <div class="uk-form-controls">
            <div class="ui small form">
                <div class="fields">
                    <div class="field">
                        <?php
                        $pnameSQL = "SELECT * FROM pname ";
                        $pnameQuery = mysql_query($pnameSQL) or die(mysql_error());
                    ?>
                            <select class="ui search selection dropdown" name="doctor-owner">
                            <option value="">คำนำหน้า</option>
                            <?php 
                                while ($row = mysql_fetch_array($pnameQuery)) {
                                    echo "<option value='".$row['pname_id']."'>".$row['pname_val']."</option>";
                                }
                            ?>        
                        </select>
                    </div>
                    <div class="field">
                        <input type="text" name="fname" placeholder="ชื่อ" value="<?php echo $patient_fname ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="lname" placeholder="นามสกุล" value="<?php echo $patient_lname ?>">
                    </div>
                </div>
            </div>
            <!--
            <div class="uk-grid uk-grid-small">
                <div class="uk-width-1-6@s">
                    <select class="ui search dropdown" name="pname" id="pname"></select>
                </div>
                <div class="uk-width-1-4@s">
                    <label class="uk-form-label"><small> ชื่อ</small></label>
                    <input class="uk-input uk-form-small" type="text" placeholder="" name="fname">
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label"><small> นามสกุล</small></label>
                    <input class="uk-input uk-form-small" type="text" placeholder="" name="lname">
                </div>
            </div>
-->
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">เพศ</label>
        <div class="uk-form-controls">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="gender" value="1" checked> ชาย</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="gender" value="2"> หญิง</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">วันเกิด</label>
        <div class="uk-form-controls uk-form-controls-text">
            <select name="bday" class="ui search selection dropdown">
                <option value="">วัน</option>
                <?php 
                    $day = "day";
                    droploop($day);
                ?>
            </select> /
            <select class="ui search dropdown" name="bmonth" id="bmonth">
                <?php 
                    $month_file = file_get_contents("txt/month.txt");
                    $rows = explode("\n", $month_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $row_data = explode("\t", $data);
                        $info[$row]['value'] = $row_data[0];
                        $info[$row]['name'] = $row_data[1];
                ?>
                <option value="">เดือน</option>
                <option value="<?php echo $info[$row]['value']; ?>">
                    <?php echo $info[$row]['name']; ?>
                </option>
                <?php } ?>
            </select> /
            <select name="byear" class="ui search selection dropdown">
                <option value="">ปี</option>
                <?php 
                    $year = "year";
                    droploop($year);
                ?>
            </select>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">สถานภาพ</label>
        <div class="uk-form-controls">
            <select class="ui search dropdown" name="status" id="status">
                <?php 
                    $status_file = file_get_contents("txt/status.txt");
                    $rows = explode("\n", $status_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $row_data = explode("\t", $data);
                        $info[$row]['value'] = $row_data[0];
                        $info[$row]['name'] = $row_data[1];
                ?>
                <option value="">สถานภาพ</option>
                <option value="<?php echo $info[$row]['value']; ?>">
                    <?php echo $info[$row]['name']; ?>
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ศาสนา</label>
        <div class="uk-form-controls">
            <select class="ui search dropdown" name="religion" id="religion" onchange="inputhidden(re)">
                <?php 
                    $religion_file = file_get_contents("txt/religion.txt");
                    $rows = explode("\n", $religion_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $row_data = explode("\t", $data);
                        $info[$row]['value'] = $row_data[0];
                        $info[$row]['name'] = $row_data[1];
                ?>
                <option value="">ศาสนา</option>
                <option value="<?php echo $info[$row]['value']; ?>">
                    <?php echo $info[$row]['name']; ?>
                </option>
                <?php } ?>
            </select>
            <div class="ui input focus">
                <input type="text" name="religion_input" id="religion_input" style="visibility:hidden;" placeholder="โปรดระบุ">
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ระดับการศึกษา</label>
        <div class="uk-form-controls">
            <select class="ui search dropdown" name="education" id="education" onchange="inputhidden(edu)">
                <?php 
                    $education_file = file_get_contents("txt/education.txt");
                    $rows = explode("\n", $education_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $row_data = explode("\t", $data);
                        $info[$row]['value'] = $row_data[0];
                        $info[$row]['name'] = $row_data[1];
                ?>
                <option value="">ระดับการศึกษา</option>
                <option value="<?php echo $info[$row]['value']; ?>">
                    <?php echo $info[$row]['name']; ?>
                </option>
                <?php } ?>
            </select>
            <div class="ui input focus">
                <input type="text" id="education_input" name="education_input" style="visibility:hidden;" placeholder="โปรดระบุ">
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">อาชีพ</label>
        <div class="uk-form-controls">
            <select class="ui search dropdown" name="occupation" id="occupation" onchange="inputhidden(occ)">
                <?php 
                    $occupation_file = file_get_contents("txt/occupation.txt");
                    $rows = explode("\n", $occupation_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $row_data = explode("\t", $data);
                        $info[$row]['value'] = $row_data[0];
                        $info[$row]['name'] = $row_data[1];
                ?>
                <option value="">อาชีพ</option>
                <option value="<?php echo $info[$row]['value']; ?>">
                    <?php echo $info[$row]['name']; ?>
                </option>
                <?php } ?>
            </select>
            <div class="ui input focus">
                <input type="text" id="occupation_input" name="occupation_input" style="visibility:hidden;" placeholder="โปรดระบุ">
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">สิทธิการรักษา</label>
        <div class="uk-form-controls">
            <?php
                $query = "SELECT insure_id, insure_name 
                    FROM healthinsure 
                    ORDER BY insure_id ASC";
                $result = mysql_query($query) or die(mysql_error()."[".$query."]");
            ?>
                <select class="ui search selection dropdown" name="insure" id="select-insure">
                <?php 
                    while ($row = mysql_fetch_array($result)) {
                        echo "<option value='".$row['insure_id']."'>".$row['insure_name']." (".$row['insure_id'].")"."</option>";
                    }
                ?>        
            </select>
        </div>
    </div>
    <hr>
    <h5 class="uk-heading-bullet">ข้อมูลการติดต่อ</h5>
    <div class="uk-margin">
        <label class="uk-form-label">ที่อยู่</label>
        <div class="uk-form-control">
        <div class="uk-form-controls">
            <div class="uk-grid uk-grid-small">
                <div class="uk-width-1-6">
                    <label class="uk-form-label"><small> บ้านเลขที่</small></label>
                    <input class="uk-input uk-form-small" type="text" placeholder="" name="add_no">
                </div>
                <div class="uk-width-1-6">
                    <label class="uk-form-label"><small>หมู่ที่</small></label>
                    <input class="uk-input uk-form-width-small uk-form-small" type="number" name="add_mhoo" placeholder="">
                </div>
                <div class="uk-width-1-6">
                    <label class="uk-form-label"><small>อาคาร/หมู่บ้าน</small></label>
                    <input class="uk-input uk-form-small" type="text" name="add_village" placeholder="">
                </div>
                <div class="uk-width-1-5">
                    <label class="uk-form-label"><small>  ซอย</small></label>
                    <input class="uk-input uk-form-small" type="text" name="add_soi" placeholder="">
                </div>
                <div class="uk-width-1-4">
                    <label class="uk-form-label"><small>ถนน</small></label>
                    <input class="uk-input uk-form-small" type="text" placeholder="" name="add_road">
                </div>
                <div class="uk-width-1-5">
                    <label class="uk-form-label"><small>แขวง/ตำบล</small></label>
                    <input class="uk-input uk-form-small" type="text" placeholder="" name="add_subdis">
                </div>
                <div class="uk-width-1-5">
                    <label class="uk-form-label"><small> เขต/อำเภอ</small></label>
                    <input class="uk-input uk-form-small" type="text" placeholder="" name="add_dis">
                </div>
                <div class="uk-width-1-4">
                    <label class="uk-form-label"><small>จังหวัด</small></label>
                    <input class="uk-input uk-form-small" type="text" placeholder="" name="add_province">
                </div>
                <div class="uk-width-1-6">
                    <label class="uk-form-label"><small>รหัสไปรษณีย์</small></label>
                    <input class="uk-input uk-form-small" type="number" placeholder="" name="add_zip">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">เบอร์โทรติดต่อ</label>
        <div class="uk-form-control">
            <div class="ui mini form">
                <div class="fields">
                    <div class="field">
                        <input type="text" name="tel_home" placeholder="โทรศัพท์บ้าน" value="<?php echo $patient_no_home ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="tel_mobile" placeholder="โทรศัพท์เคลื่อนที่" value="<?php echo $patient_no_mobile ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="tel_work" placeholder="โทรศัพท์ที่ทำงาน" value="<?php echo $patient_no_work ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h5 class="uk-heading-bullet">ครอบครัว</h5>
    <div class="uk-margin">
        <label class="uk-form-label">ข้อมูลญาติ</label>
        <div class="uk-form-control">
            <div class="ui mini form">
                <div class="fields">
                    <div class="field">
                        <input type="text" name="relate_name" placeholder="ชื่อ-นามสกุล" value="<?php echo $relate_name ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="relate_tel" placeholder="เบอร์โทร" value="<?php echo $relate_tel ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="relate_def" placeholder="เกี่ยวข้องเป็น" value="<?php echo $relate_def ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5 class="uk-heading-divider">แพทย์ผู้ดูแล</h5>
    <div class="uk-margin">
        <label class="uk-form-label">แพทย์เจ้าของไข้</label>
        <div class="uk-form-controls">
            <?php
                $query = "SELECT user,f_user,l_user 
                    FROM tbuser 
                    ORDER BY user ASC";
                $result = mysql_query($query) or die(mysql_error()."[".$query."]");
            ?>
                <select class="ui search selection dropdown" name="doctor-owner">
                    <option value="">พิมพ์ชื่อ-นามสกุล หรือรหัสประจำตัว</option>
                <?php 
                    while ($row = mysql_fetch_array($result)) {
                        echo "<option value='".$row['user']."'>".$row['f_user']." ".$row['l_user']." (".$row['user'].")"."</option>";
                    }
                ?>        
                </select>
        </div>
    </div>
</div>
