<div class="uk-form-horizontal">
    <h4 class="uk-heading-divider">ส่วนที่ 1 ข้อมูลทั่วไป</h4>
    <div class="uk-margin">
        <label class="uk-form-label">รหัสโรงพยาบาล</label>
        <div class="uk-form-controls uk-form-controls-text">
            HN <?php echo $patient_hn ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">สถานะเยี่ยมบ้าน</label>
        <div class="uk-form-controls uk-form-controls-text">
            <?php
            switch($patient_visit_status){
                case 1: echo "ใหม่"; break;
                case 2: echo "เยี่ยมต่อ"; break;
                case 3: echo "ปิดเยี่ยมบ้าน"; break;
            }
     ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ประเภทการเยี่ยมบ้าน</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="patient_visit_type" value="1" <?php if($patient_visit_type==1){echo "checked";} ?> /> Home visit care</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="patient_visit_type" value="2" <?php if($patient_visit_type==2){echo "checked";} ?> /> Geriatric case</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="patient_visit_type" value="3" <?php if($patient_visit_type==3){echo "checked";} ?> /> Palliative case</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">เลขบัตรประชาชน</label>
        <div class="uk-form-controls">
            <div class="ui input">
                <input type="text" name="patient_id" placeholder="โปรดระบุ" value="<?php echo $patient_id ?>">
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
                            <select class="ui search selection dropdown" name="pname">
                            <option value="<?php echo $patient_pname ?>">คำนำหน้า</option>
                            <?php 
                                while ($row = mysql_fetch_array($pnameQuery)) {
                                    echo "<option value='".$row['pname_val']."'>".$row['pname_val']."</option>";
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
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">เพศ</label>
        <div class="uk-form-controls">
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="gender" value="1" <?php if($patient_gender==1){echo "checked";} ?> /> ชาย</label>
            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="gender" value="2" <?php if($patient_gender==2){echo "checked";} ?> /> หญิง</label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">วันเกิด</label>
        <div class="uk-form-controls uk-form-controls-text">
            <select name="bday" class="ui search selection dropdown">
                <option value="<?php echo $patient_bday ?>">วัน</option>
                <?php 
                    $day = "day";
                    droploop($day);
                ?>
            </select> /
            <select class="ui search dropdown" name="bmonth" id="bmonth">
                <option value="<?php echo $patient_bmonth ?>">เดือน</option>
                <?php 
                    $month_file = file_get_contents("txt/month.txt");
                    $rows = explode("\n", $month_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $row_data = explode("\t", $data);
                        $info[$row]['value'] = $row_data[0];
                        $info[$row]['name'] = $row_data[1];
                ?>
                <option value="<?php echo $info[$row]['value']; ?>">
                    <?php echo $info[$row]['name']; ?>
                </option>
                <?php } ?>
            </select> /
            <select name="byear" class="ui search selection dropdown">
                <option value="<?php echo $patient_byear ?>">ปี</option>
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
                <option value="<?php echo $patient_status ?>">สถานภาพ</option>
                <?php 
                    $status_file = file_get_contents("txt/status.txt");
                    $rows = explode("\n", $status_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $info[$row]['name'] = $data;
                ?>
                <option value="<?php echo $info[$row]['name']; ?>">
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
                <option value="<?php echo $patient_religion ?>">ศาสนา</option>
                <?php 
                    $religion_file = file_get_contents("txt/religion.txt");
                    $rows = explode("\n", $religion_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $info[$row]['name'] = $data;
                ?>
                <option value="<?php echo $info[$row]['name']; ?>">
                    <?php echo $info[$row]['name'] ?>
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
                <option value="<?php echo $patient_education ?>">ระดับการศึกษา</option>
                <?php 
                    $education_file = file_get_contents("txt/education.txt");
                    $rows = explode("\n", $education_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $info[$row]['name'] = $data;
                ?>
                <option value="<?php echo $info[$row]['name']; ?>">
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
                <option value="<?php echo $patient_occupation ?>">อาชีพ</option>
                <?php 
                    $occupation_file = file_get_contents("txt/occupation.txt");
                    $rows = explode("\n", $occupation_file);
                    array_shift($rows);
                    foreach($rows as $row => $data) {
                        $info[$row]['name'] = $data;
                ?>
                <option value="<?php echo $info[$row]['name']; ?>">
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
                     <option value="<?php echo $healthinsure ?>">พิมพ์สิทธิการรักษา</option>
                <?php 
                    while ($row = mysql_fetch_array($result)) {
                        echo "<option value='".$row['insure_id']."'>".$row['insure_name']." (".$row['insure_id'].")"."</option>";
                    }
                ?>        
            </select>
        </div>
    </div>

    <h5 class="uk-heading-bullet">ข้อมูลการติดต่อ</h5>

    <div class="uk-margin">
        <label class="uk-form-label">ที่อยู่</label>
        <div class="uk-form-controls">
            <div class="ui mini form">
                <div class="fields">
                    <div class="field">
                        <input type="text" name="add_no" placeholder="บ้านเลขที่" value="<?php echo $add_no ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="add_mhoo" placeholder="หมู่ที่" value="<?php echo $add_mhoo ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="add_village" placeholder="อาคาร/หมู่บ้าน" value="<?php echo $add_village ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="add_soi" placeholder="ซอย" value="<?php echo $add_soi ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="add_road" placeholder="ถนน" value="<?php echo $add_road ?>">
                    </div>
                </div>

            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-form-controls">
                <div class="ui mini form">
                    <div class="fields">
                        <div class="field">
                            <input type="text" name="add_subdis" placeholder="แขวง/ตำบล" value="<?php echo $add_subdis ?>">
                        </div>
                        <div class="field">
                            <input type="text" name="add_dis" placeholder="เขต/อำเภอ" value="<?php echo $add_dis ?>">
                        </div>
                        <div class="field">
                            <select class="ui search dropdown" name="add_province">
                                <option value="<?php echo $add_province ?>">จังหวัด</option>
                                <?php 
                                    $province_file = file_get_contents("txt/province.txt");
                                    $rows = explode("\n", $province_file);
                                    array_shift($rows);
                                    foreach($rows as $row => $data) {
                                        $info[$row]['name'] = $data;
                                ?>
                                <option value="<?php echo $info[$row]['name']; ?>">
                                    <?php echo $info[$row]['name']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="field">
                            <input type="text" name="add_zip" placeholder="ไปรษณีย์" value="<?php echo $add_zip ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label">เบอร์โทรติดต่อ</label>
        <div class="uk-form-controls">
            <div class="ui mini form">
                <div class="fields">
                    <div class="field">
                        <input type="text" name="tel_home" placeholder="โทรศัพท์บ้าน" value="<?php echo $patient_tel_home ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="tel_mobile" placeholder="โทรศัพท์เคลื่อนที่" value="<?php echo $patient_tel_mobile ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="tel_work" placeholder="โทรศัพท์ที่ทำงาน" value="<?php echo $patient_tel_work ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h5 class="uk-heading-bullet">ครอบครัว</h5>

    <div class="uk-margin">
        <label class="uk-form-label">ข้อมูลญาติ</label>
        <div class="uk-form-controls">
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

    <div class="uk-margin">
        <label class="uk-form-label">แผนผังครอบครัว</label>
        <div class="uk-form-controls">
            <div class="test-upload uk-placeholder uk-text-center">
                <span uk-icon="icon: cloud-upload"></span>
                <span class="uk-text-middle">ลากไฟล์รูปภาพมาที่ช่องนี้ หรือ</span>
                <div uk-form-custom>
                    <input type="file" multiple>
                    <span class="uk-link">เลือก 1 รูปภาพ</span>
                </div>
            </div>
            <progress id="progressbar" class="uk-progress" value="0" max="100" hidden></progress>
        </div>
    </div>

    <h5 class="uk-heading-bullet">แพทย์ผู้ดูแล</h5>

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
                    <option value="<?php echo $doctor_owner ?>">พิมพ์ชื่อ-นามสกุล หรือรหัสประจำตัว</option>
                <?php 
                    while ($row = mysql_fetch_array($result)) {
                        echo "<option value='".$row['user']."'>".$row['f_user']." ".$row['l_user']." (".$row['user'].")"."</option>";
                    }
                ?>        
                </select>
        </div>
    </div>
</div>

<script>
    (function($) {

        var bar = $("#progressbar")[0];

        UIkit.upload('.test-upload', {

            url: '',
            multiple: true,

            beforeSend: function() {
                console.log('beforeSend', arguments);
            },
            beforeAll: function() {
                console.log('beforeAll', arguments);
            },
            load: function() {
                console.log('load', arguments);
            },
            error: function() {
                console.log('error', arguments);
            },
            complete: function() {
                console.log('complete', arguments);
            },

            loadStart: function(e) {
                console.log('loadStart', arguments);

                bar.removeAttribute('hidden');
                bar.max = e.total;
                bar.value = e.loaded;
            },

            progress: function(e) {
                console.log('progress', arguments);

                bar.max = e.total;
                bar.value = e.loaded;

            },

            loadEnd: function(e) {
                console.log('loadEnd', arguments);

                bar.max = e.total;
                bar.value = e.loaded;
            },

            completeAll: function() {
                console.log('completeAll', arguments);

                setTimeout(function() {
                    bar.setAttribute('hidden', 'hidden');
                }, 1000);

                alert('Upload Completed');
            }
        });

    })(jQuery);

</script>
