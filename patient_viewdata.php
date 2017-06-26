<dl class="dl-horizontal">
    <dt>รหัสโรงพยาบาล</dt>
    <dd><?php echo $patient_hn ?></dd>

    <dt>สถานะการเยี่ยมบ้าน</dt>
    <dd><?php echo $patient_visit_status ?></dd>

    <dt>ประเภทการเยี่ยมบ้าน</dt>
    <dd><?php echo $patient_visit_type ?></dd>

    <dt>แพทย์เจ้าของไข้</dt>
    <dd><?php echo $patient_doctor_owner ?></dd>

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
    <dd>
      <?php echo $patient_gender; ?>
    </dd>

    <dt>วัน เดือน ปีเกิด</dt>
    <dd><?php echo $patient_bday." ".$patient_bmonth." ".$patient_byear ?></dd>

    <dt>อายุ</dt>
    <dd><?php echo $patient_age ?></dd>

    <dt>โทรศัพท์ที่บ้าน</dt>
    <dd>
      <?php
        if($patient_tel_home == NULL){
          echo "-";
        }
        else {
          echo $patient_tel_home;
        }
      ?>
    </dd>

    <dt>โทรศัพท์มือถือ</dt>
    <dd>
      <?php
      if($patient_tel_mobile == NULL){
        echo "-";
      }
        else {
          echo $patient_tel_mobile;
         }
         ?>
    </dd>

    <dt>โทรศัพท์ที่ทำงาน</dt>
    <dd>
      <?php if($patient_tel_work == NULL){
        echo "-";
       }
         else {
           echo $patient_tel_work;
         }
         ?>
       </dd>

    <dt>สถานภาพ</dt>
    <dd>
      <?php
      if($patient_status == NULL){
        echo "-";
      }
      else {
        echo $patient_status;
      }
      ?>
    </dd>

    <dt>ศาสนา</dt>
    <dd>
      <?php
        if($patient_religion == NULL){
          echo "-";
        }
        else {
          echo $patient_religion;
        }
     ?>
    </dd>

    <dt>ระดับการศึกษา</dt>
    <dd>
      <?php
        if($patient_education == NULL){
          echo "-";
        }
        else {
          echo $patient_education;
        }
     ?>
    </dd>

    <dt>อาชีพ</dt>
    <dd>
      <?php
        if($patient_occupation == NULL){
          echo "-";
        }
        else {
          echo $patient_occupation;
        }
     ?>
     </dd>

    <dt>สิทธิการรักษา</dt>
    <dd>
      <?php
        if($insure == NULL){
          echo "-";
        }
        else {
          echo $insure;
        }
      ?>
    </dd>

    <dt>ข้อมูลญาติที่ติดต่อได้</dt>
    <dd>
<!-- <b>ญาติคนที่ 1:</b><br> -->
        <label class="uk-margin-right"><b>ชื่อ-นามสกุล </b>
          <?php
          if($relate_name == NULL){
            echo "-";
          }
          else {
            echo $relate_name;
          }
          ?>
        </label>
        <label class="uk-margin-right"><b>เกี่ยวข้องเป็น </b>
          <?php
          if($relate_def == NULL){
            echo "-";
          }
          else {
            echo $relate_def;
          }
          ?>
        </label>
        <label class="uk-margin-right"><b>เบอร์โทรศัพท์ </b>
          <?php
          if($relate_tel == NULL){
            echo "-";
          }
          else {
            echo $relate_tel;
          }
          ?>
        </label>
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
        <img src="<?php if($genogram != NULL){ echo "img/geno/".$genogram; } else { echo "ไม่มีแผนผังครอบครัว"; } ?>" style="border: 1px solid #ccc;" max-width="75%">
      </a>
    </dd>

    <h4 class="uk-heading-divider">ส่วนที่ 2 ข้อมูลสุขภาพ</h4>
    <h5 class="uk-heading-bullet">ประวัติการรักษา</h5>

    <dt>การผ่าตัด</dt>
    <dd>
      <?php
        switch($surgery){
          case 1: echo "ไม่เคยผ่าตัด"; break;
          case 2: echo "เคยผ่าตัด ".$surgery_input; break;
          default: echo "ไม่มีข้อมูล";
        }
      ?>
    </dd>

    <dt>การแพ้ยา/แพ้อาหาร</dt>
    <dd>
      <?php
        switch($allergic){
          case 1: echo "ไม่มีอาการแพ้"; break;
          case 2: echo "มีอาการแพ้ ".$allergic_input; break;
          default: echo "ไม่มีข้อมูล";
        }
      ?>
      </dd>

    <dt>แพทย์ทางเลือก</dt>
    <dd>
      <?php
        switch($alternative){
          case 1: echo "ไม่มีแพทย์ทางเลือก"; break;
          case 2: echo "มีแพทย์ทางเลือก ".$alternative_input; break;
          default: echo "ไม่มีข้อมูล";
        }
      ?>
    </dd>

    <h5 class="uk-heading-bullet">พฤติกรรมเสี่ยงในปัจจุบัน</h5>
    <dt>สุรา</dt>
    <dd>
      <?php
        switch($alcohol) {
          case 1: echo "ไม่เคยดื่ม"; break;
          case 2: echo "ดื่มอยู่";
            if($alcohol_problem == 0) {
              echo " และ ไม่มีปัญหาเกี่ยวกับการดื่ม ";
            } else if($alcohol_problem == 1) {
              echo " และ มีปัญหาเกี่ยวกับการดื่ม ";
            }
            break;
          case 3: echo "เลิกดื่มแล้ว";
            if($alcohol_problem == 0) {
              echo " และ ไม่มีปัญหาเกี่ยวกับการดื่ม ";
            } else if($alcohol_problem == 1) {
              echo " และ มีปัญหาเกี่ยวกับการดื่ม ";
            }
            break;
          default: echo "ไม่มีข้อมูล";
        }
      ?>
    </dd>

    <dt>บุหรี่</dt>
    <dd>
      <?php
          if($cigarette == 1) {
              echo "ไม่สูบบุหรี่";
          }
          else if($cigarette == 2) {
            echo "สูบอยู่ จำนวน ".$cigarette_amount." มวน/วัน เป็นระยะเวลา ".$cigarette_period." ปี";
          }
          else if($cigarette == 3) {
            echo "เลิกสูบแล้ว จำนวน ".$cigarette_amount." มวน/วัน เป็นระยะเวลา ".$cigarette_period." ปี";
          }
          else {
            echo "ไม่มีข้อมูล";
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
      <div class="ui read-only checkbox">
        <input type="checkbox" tabindex="1" class="hidden" <?php if($hypertansion == 1){ echo "checked"; } ?> />
        <label>Hypertension</label>
      </div>
      <br>
      <div class="ui read-only checkbox">
        <input type="checkbox" tabindex="2" class="hidden" <?php if($diabetes_mellitus == 1){ echo "checked"; } ?> />
        <label>Diabetes mellitus</label>
      </div>
      <br>
      <div class="ui read-only checkbox">
        <input type="checkbox" tabindex="3" class="hidden" <?php if($dyslipidemia == 1){ echo "checked"; } ?> />
        <label>Dyslipidemia</label>
      </div>
      <br>
      <div class="ui read-only checkbox">
        <input type="checkbox" tabindex="4" class="hidden" <?php if($stroke == 1){ echo "checked"; } ?> />
        <label>Stroke</label>
      </div>
      <br>
      <div class="ui read-only checkbox">
        <input type="checkbox" tabindex="5" class="hidden" <?php if($cad == 1){ echo "checked"; } ?> />
        <label>CAD</label>
      </div>
      <br>
      <div class="ui read-only checkbox">
        <input type="checkbox" tabindex="6" class="hidden" <?php if($cancer == 1){ echo "checked"; } ?> />
        <label>Cancer:</label>
      </div>
      <?php echo $cancer_input ?>
      <br>
      <div class="ui read-only checkbox">
        <input type="checkbox" tabindex="7" class="hidden" <?php if($other == 1){ echo "checked"; } ?> />
        <label>Other:</label>
      </div>
      <?php echo $other_input ?>
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
            // $tbuserSQL = "SELECT * FROM tbuser WHERE user='$user'";
            // $tbuserQuery = mysqli_query($conn, $tbuserSQL);
            // $tbuserData = mysqli_fetch_assoc($tbuserQuery);
            // echo $tbuserData['f_user']." ".$tbuserData['l_user']." (".$tbuserData['user'].")"
        ?>
        <!-- นพ.ประสงค์ ทรงธรรม (013651) เมื่อวันที่ 24/09/2559 -->
    </dd>
</dl>
