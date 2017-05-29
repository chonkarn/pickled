<dl class="dl-horizontal">
    <dt>รหัสโรงพยาบาล</dt>
    <dd><?php echo $patient_hn ?></dd>

    <dt>สถานะการเยี่ยมบ้าน</dt>
    <dd><?php echo $patient_visit_status ?></dd>

    <dt>ประเภทการเยี่ยมบ้าน</dt>
    <dd><?php echo $patient_visit_type ?></dd>

    <dt>แพทย์เจ้าของไข้</dt>
    <dd><?php echo $doctor_owner ?></dd>

    <h4 class="uk-heading-divider">ส่วนที่ 1 ข้อมูลทั่วไป</h4>

    <dt>เลขที่บัตรประชาชน</dt>
    <dd><?php echo $patient_id ?></dd>

    <dt>ชื่อ-นามสกุล</dt>
    <dd><?php echo $patient_name ?></dd>

    <dt>ที่อยู่ปัจจุบัน</dt>
    <dd>
        <span class="uk-margin-right"><b>บ้านเลขที่</b> <?php echo $add_no ?></span>
        <span class="uk-margin-right"><b>หมู่ที่</b> <?php echo $add_mhoo ?></span>
        <span class="uk-margin-right"><b>อาคาร/หมู่บ้าน</b> <?php echo $add_village ?></span>
        <span class="uk-margin-right"><b>ซอย</b> <?php echo $add_soi ?></span>
        <span class="uk-margin-right"><b>ถนน</b> <?php echo $add_road ?></span>
        <span class="uk-margin-right"><b>แขวง/ตำบล</b> <?php echo $add_subdis ?></span>
        <span class="uk-margin-right"><b>เขต/อำเภอ</b> <?php echo $add_dis ?></span>
        <span class="uk-margin-right"><b>จังหวัด</b> <?php echo $add_province ?></span>
        <span class="uk-margin-right"><b>รหัสไปรษณีย์</b> <?php echo $add_zip ?></span>
    </dd>

    <dt>เพศ</dt>
    <dd><?php echo $patient_gender ?></dd>

    <dt>วัน เดือน ปีเกิด</dt>
    <dd>
        <?php echo $patient_birthday ?>
    </dd>

    <dt>อายุ</dt>
    <dd>
        <?php echo $age_year." ปี ".$age_month." เดือน ".$age_day." วัน" ?>
    </dd>

    <dt>โทรศัพท์ที่บ้าน</dt>
    <dd><i class="material-icons">phone</i> <?php echo $patient_tel_home ?></dd>

    
    <dt>โทรศัพท์มือถือ</dt>
    <dd><i class="material-icons">phone</i> <?php echo $patient_tel_mobile ?></dd>

    <dt>โทรศัพท์ที่ทำงาน</dt>
    <dd><i class="material-icons">phone</i> <?php echo $patient_tel_work ?></dd>
    
    <dt>สถานภาพ</dt>
    <dd><?php echo $patient_status ?></dd>

    <dt>ศาสนา</dt>
    <dd><?php echo $patient_religion ?></dd>

    <dt>ระดับการศึกษา</dt>
    <dd><?php echo $patient_education ?></dd>

    <dt>อาชีพ</dt>
    <dd><?php echo $patient_occupation ?></dd>

    <dt>สิทธิการรักษา</dt>
    <dd><?php echo $healthinsure ?></dd>

    <hr>

    <dt>ข้อมูลญาติที่ติดต่อได้</dt>
    <dd>
        <b>ญาติคนที่ 1:</b>
        <br> ชื่อ-นามสกุล: <?php echo $relate_name ?> เกี่ยวข้องเป็น <?php echo $ralete_def ?>
        <br> เบอร์ติดต่อ: <i class="material-icons">phone</i> <?php echo $relate_tel ?>
        <hr>
        <b>ญาติคนที่ 2:</b>
        <br> ชื่อ-นามสกุล: นาง ปราณี เกียรติขจร เกี่ยวข้องเป็น น้องสาว
        <br> เบอร์ติดต่อ: <i class="fa fa-phone"></i> 094 456 1234
    </dd>

    <hr>

    <dt>แผนผังครอบครัว</dt>
    <dd><img src="img/familytree.jpg" style="border: 1px solid #ccc;" width=""></dd>

    <hr>

    <h4 class="uk-heading-divider">ส่วนที่ 2 ข้อมูลสุขภาพ</h4>
    <h5 class="uk-heading-bullet">ประวัติการรักษา</h5>

    <dt>การผ่าตัด</dt>
    <dd>เคยผ่าตัด ไส้ติ่ง</dd>

    <dt>การแพ้ยา/แพ้อาหาร</dt>
    <dd>ไม่มี</dd>

    <dt>แพทย์ทางเลือก</dt>
    <dd>ไม่มี</dd>

    <h5 class="uk-heading-bullet">พฤติกรรมเสี่ยงในปัจจุบัน</h5>
    <dt>สุรา</dt>
    <dd>
        เลิกดื่มแล้ว และ ไม่มีปัญหาเกี่ยวกับการดื่ม
    </dd>

    <dt>บุหรี่</dt>
    <dd>ไม่เคยสูบ</dd>

    <h5 class="uk-heading-bullet">ประวัติครอบครัว</h5>

    <dt>สถานะทางการเงิน</dt>
    <dd>ไม่มีปัญหา</dd>

    <dt>ประวัติโรคในครอบครัว</dt>
    <dd>
        <ol>
            <li>Hypertension</li>
            <li>Stroke</li>
        </ol>
    </dd>

    <h4 class="uk-heading-divider">ส่วนที่ 3 สรุปข้อมูลปัญหาผู้ป่วย</h4>

    <dt>รหัสการวินิจฉัยปัญหา</dt>
    <dd>
        <ol>
            <li>B07 Viral warts</li>
            <li>E117 Non-insulin-dependent diabetes mellitus ,with multiple complications</li>
        </ol>
    </dd>

    <hr>

    <dt>ผู้บันทึกข้อมูล</dt>
    <dd>
        <?php echo $user ?>
<!--        นพ.ประสงค์ ทรงธรรม (013651) เมื่อวันที่ 24/09/2559-->
    </dd>
</dl>