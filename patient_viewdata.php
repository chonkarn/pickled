<dl class="dl-horizontal">
    <dt>รหัสโรงพยาบาล</dt>
    <dd><?php echo $patient_hn ?></dd>

    <dt>สถานะการเยี่ยมบ้าน</dt>
    <dd><?php echo $patient_visit_status ?></dd>

    <dt>ประเภทการเยี่ยมบ้าน</dt>
    <dd><?php echo $patient_visit_type ?></dd>

    <dt>แพทย์เจ้าของไข้</dt>
    <dd><?php echo $doctor_owner." (".$doctor_owner_id.")" ?><br></dd>

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
        <?php echo $patient_age ?>
    </dd>

    <dt>โทรศัพท์ที่บ้าน</dt>
    <dd><i class="material-icons">phone</i> <?php echo $patient_tel_home ?></dd>


    <dt>โทรศัพท์มือถือ</dt>
    <dd><i class="material-icons">phone</i> <?php echo $patient_tel_mobile ?></dd>

    <dt>โทรศัพท์ที่ทำงาน</dt>
    <dd><i class="material-icons">phone</i> <?php echo $patient_tel_work ?></dd>

    <dt>สถานภาพ</dt>
    <dd><?php echo $patient_status ?><br></dd>

    <dt>ศาสนา</dt>
    <dd><?php echo $patient_religion ?><br></dd>

    <dt>ระดับการศึกษา</dt>
    <dd><?php echo $patient_education ?><br></dd>

    <dt>อาชีพ</dt>
    <dd><?php echo $patient_occupation ?><br></dd>

    <dt>สิทธิการรักษา</dt>
    <dd><?php echo $healthinsure ?><br></dd>


    <dt>ข้อมูลญาติที่ติดต่อได้</dt>
    <dd>
<!--        <b>ญาติคนที่ 1:</b><br> -->
        <label class="uk-margin-right"><b>ชื่อ-นามสกุล </b><?php echo $relate_name ?> </label>
        <label class="uk-margin-right"><b>เกี่ยวข้องเป็น </b><?php echo $relate_def ?></label>
        <label class="uk-margin-right"><b>เบอร์โทรศัพท์ </b><i class="material-icons">phone</i> <?php echo $relate_tel ?></label>
<!--
        <hr>
        <b>ญาติคนที่ 2:</b>
        <br> ชื่อ-นามสกุล: นาง ปราณี เกียรติขจร เกี่ยวข้องเป็น น้องสาว
        <br> เบอร์ติดต่อ: <i class="fa fa-phone"></i> 094 456 1234
-->
    </dd>


    <dt>แผนผังครอบครัว</dt>
    <dd>
      <a href="<?php echo "img/geno/".$genogram ?>" target="_blank">
      <img src="<?php echo "img/geno/".$genogram ?>" style="border: 1px solid #ccc;" width="50%">
    </a>
    </dd>


    <h4 class="uk-heading-divider">ส่วนที่ 2 ข้อมูลสุขภาพ</h4>
    <h5 class="uk-heading-bullet">ประวัติการรักษา</h5>

    <dt>การผ่าตัด</dt>
    <dd>
        <?php
            if($surgery == 0){
                echo "ไม่เคยผ่าตัด";
            }
            else if($surgery == 1) {
                echo $surgery." ".$surgery_input;
            }
            else {
              echo "ไม่มีข้อมูล";
            }
        ?>
    </dd>

    <dt>การแพ้ยา/แพ้อาหาร</dt>
    <dd>
      <?php
          if($allergic == 0){
              echo "ไม่เคยผ่าตัด";
          }
          else if($allergic == 1) {
              echo $allergic." ".$allergic_input;
          }
          else {
            echo "ไม่มีข้อมูล";
          }
      ?>
      </dd>

    <dt>แพทย์ทางเลือก</dt>
    <dd>
      <?php
          if ($alternative == 0){
            echo "ไม่มีแพทย์ทางเลือก";
          }
          else if ($alternative == 1) {
              echo $alternative." ".$alternative_input;
          }
          else {
            echo "ไม่มีข้อมูล";
          }
        ?>
    </dd>

    <h5 class="uk-heading-bullet">พฤติกรรมเสี่ยงในปัจจุบัน</h5>
    <dt>สุรา</dt>
    <dd>
      <?php
          if($alcohol == NULL){
              echo "ไม่มีข้อมูล";
          }
          else {
              echo $alcohol." ".$alcohol_problem;
          }
        ?>
        <!-- เลิกดื่มแล้ว และ ไม่มีปัญหาเกี่ยวกับการดื่ม -->
    </dd>

    <dt>บุหรี่</dt>
    <dd>
      <?php
          if($cigarette == NULL){
              echo "ไม่มีข้อมูล";
          }
          else {
              echo $cigarette." ".$cigarette_amount." ".$cigarette_period;
          }
        ?>
    </dd>

    <h5 class="uk-heading-bullet">ประวัติครอบครัว</h5>

    <dt>สถานะทางการเงิน</dt>
    <dd>
      <?php
          if($money_problem == 0){
            echo "ไม่มีปัญหา";
          }
          else if($money_problem == 1) {
              echo "มีปัญหา";
          } else {
            echo "ไม่มีข้อมูล";
          }
        ?>
    </dd>

    <dt>ประวัติโรคในครอบครัว</dt>
    <dd>
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
    </dd>

    <h4 class="uk-heading-divider">ส่วนที่ 3 สรุปข้อมูลปัญหาผู้ป่วย</h4>

    <dt>รหัสการวินิจฉัยปัญหา</dt>
    <dd>
        <ol>
            <?php
                $problems = explode(",", $problem);
                foreach ($problems as $icd10){
                    $qicd10 = "SELECT * FROM icd10 WHERE icd10_id='$icd10'";
                    $qicd10_val = mysqli_query($conn, $qicd10);
                    $qicd10_test = mysqli_fetch_assoc($qicd10_val);
                    echo "<li><b>".$icd10."</b> ".$qicd10_test["icd10_name"]."</li>";
                }
            ?>
        </ol>
<!--
        <ol>
            <li>B07 Viral warts</li>
            <li>E117 Non-insulin-dependent diabetes mellitus ,with multiple complications</li>
        </ol>
-->
    </dd>

    <hr>

    <dt>ผู้บันทึกข้อมูล</dt>
    <dd>
        <?php
            $tbuserSQL = "SELECT * FROM tbuser WHERE user='$user'";
            $tbuserQuery = mysqli_query($conn, $tbuserSQL);
            $tbuserData = mysqli_fetch_assoc($tbuserQuery);
            echo $tbuserData['f_user']." ".$tbuserData['l_user']." (".$tbuserData['user'].") เมื่อวันที่ "
        ?>
        <!--นพ.ประสงค์ ทรงธรรม (013651) เมื่อวันที่ 24/09/2559-->
    </dd>
</dl>
