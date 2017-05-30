<dl class="dl-horizontal">
    <?php echo $calendar_id ?>
    <h4 class="uk-heading-divider">ส่วนที่ 1 ข้อมูลทั่วไป</h4>
    
    <dt>ชื่อผู้ป่วย</dt>
    <dd>
        <?php echo $patient_name ?>
    </dd>

    <dt>รหัสโรงพยาบาล</dt>
    <dd>HN
        <?php echo $patient_hn ?>
    </dd>

    <dt>แพทย์เจ้าของไข้</dt>
    <dd>
        <?php echo $doctor_owner ?>
    </dd>

    <dt>ทีมแพทย์เยี่ยมบ้าน</dt>
    <dd>
        <ol>
            <li>นพ.นพกุล ทองทา</li>
            <li>นพ.ประสงค์ ทรงธรรม</li>
        </ol>
    </dd>

    <dt>วันที่ไปเยี่ยม</dt>
    <dd><?php echo $date_visit ?></dd>

    <dt>เวลาที่ไปเยี่ยม</dt>
    <dd><?php echo $time_visit ?></dd>

    <dt>เยี่ยมบ้านครั้งที่</dt>
    <dd><?php echo $num_visit ?></dd>

    <dt>เหตุผลการเยี่ยมบ้าน</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason" checked> Assessment</label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-radio" type="radio" name="reason" disabled> Illness management</label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-radio" type="radio" name="reason" disabled> Palliative</label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-radio" type="radio" name="reason" disabled> Post hospitalized</label>
    </dd>

    <dt>ยาที่ใช้ปัจจุบัน<br>และยาที่ซื้อกินเอง</dt>
    <dd><?php echo $med ?><br></dd>

    <h5 class="uk-heading-bullet">Impairment / Immobility</h5>
    <dt>Basic activities<br>of daily living</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio " type="radio" name="basic_act" checked> Yes</label>
        <label class="uk-text-muted"><input class="uk-radio" type="radio" name="basic_act" disabled> No</label>
        <hr>
        <label class="uk-margin-right"><b>Problem</b></label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" <?php if($basic_act_dress == 1){ echo "checked"; }else{ echo "disabled"; } ?> /> Dressing</label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Eating</label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Ambulating</label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Toileting</label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Hygine</label>
    </dd>

    <dt>Instrumental activities<br>of daily living</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio " type="radio" name="instu_act" checked> Yes</label>
        <label class="uk-text-muted"><input class="uk-radio" type="radio" name="instru_act" disabled> No</label>
        <hr>
        <label class="uk-margin-right"><b>Problem</b></label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-checkbox" type="checkbox" disabled> Shopping</label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" checked> Houskeeping</label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-checkbox" type="checkbox" disabled> Medication</label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-checkbox" type="checkbox" disabled> Financial</label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox" checked> Transpoting / Technology</label>
    </dd>

    <h5 class="uk-heading-bullet">Nutrition</h5>
    <dt>Nutritional status</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="nutrition_status" checked> Healthy</label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-radio" type="radio" name="nutrition_status" disabled> Obesity</label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-radio" type="radio" name="nutrition_status" disabled> Malnutrition</label>
    </dd>

    <h5 class="uk-heading-bullet">Home environment / Safety</h5>
    <dt>Risk</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio " type="radio" name="risk" checked> Yes</label>
        <label class=""><input class="uk-radio" type="radio" name="risk" disabled> No</label>
    </dd>

    <dt>Place at risk</dt>
    <dd><?php echo $home_place ?></dd>

    <h5 class="uk-heading-bullet">Social support</h5>
    <dt>Caregiver burden</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="caregiver" checked> Yes</label>
        <label class="uk-text-muted"><input class="uk-radio" type="radio" name="caregiver" disabled> No</label>
    </dd>

    <dt>Main caregiver</dt>
    <dd><?php echo $main_caregiver ?></dd>

    <dt>สิทธิ์การรักษา</dt>
    <dd>
        <?php echo $healthinsure ?>
    </dd>

    <h5 class="uk-heading-bullet">Medication</h5>

    <dt>Prescription drug</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="prescription" disabled> Yes</label>
        <label class="uk-text-muted"><input class="uk-radio" type="radio" name="prescription" checked> No</label>: ?
    </dd>
    <dt>Nonprescription drug</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio " type="radio" name="nonprescription" checked> Yes</label>
        <label class="uk-text-muted"><input class="uk-radio" type="radio" name="nonprescription" disabled> No</label>
    </dd>

    <dt>Dietary supplement</dt>
    <dd><label class="uk-margin-right"><input class="uk-radio " type="radio" name="supplement" checked> Yes</label>
        <label class="uk-text-muted"><input class="uk-radio" type="radio" name="supplement" disabled> No</label>
    </dd>

    <dt>Medication compliance</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio " type="radio" name="compliance" checked> Yes</label>
        <label class="uk-text-muted"><input class="uk-radio" type="radio" name="compliance" disabled> No</label>
    </dd>

    <h5 class="uk-heading-bullet">Management</h5>
    <dt></dt>
    <dd><input class="uk-checkbox" type="checkbox" checked> Assessment</dd>

    <dt></dt>
    <dd>
        <input class="uk-checkbox" type="checkbox" checked> Pain & Symptom management
        <span></span>
    </dd>
    <dt></dt>
    <dd>
        <input class="uk-checkbox" type="checkbox" checked> Medication management
    </dd>
    <dt></dt>
    <dd>
        <input class="uk-checkbox" type="checkbox" disabled> Procedure
    </dd>
    <dt></dt>
    <dd>
        <input class="uk-checkbox" type="checkbox" checked> Family meeting
    </dd>

    <dt></dt>
    <dd><input class="uk-checkbox" type="checkbox" disabled> Social support & Health insurance</dd>

    <dt></dt>
    <dd><input class="uk-checkbox" type="checkbox" disabled> Psychological care</dd>

    <dt></dt>
    <dd><input class="uk-checkbox" type="checkbox" disabled> Rehabilitation</dd>

    <dt></dt>
    <dd><input class="uk-checkbox" type="checkbox" disabled> Advance direction choice</dd>

    <dt></dt>
    <dd>
        <input class="uk-checkbox" type="checkbox" checked> Dying
        <span class="uk-text-meta text-small">Funeral plan / Grief bereavement care</span>
        <span></span>
    </dd>

    <dt></dt>
    <dd><input class="uk-checkbox" type="checkbox" disabled> Other specify</dd>

    <h4 class="uk-heading-divider">ส่วนที่ 2 รายละเอียดปัญหา</h4>

    <dt>Biological problem</dt>
    <dd>
        <?php echo $bio_problem ?><br>
    </dd>

    <h5 class="uk-heading-bullet">Physical examination</h5>
    <dt>Vital sign</dt>
    <dd>
        <div class="uk-grid">
            <div class="uk-margin-right">
                <b class="uk-margin-right">BP</b> <?php echo $bp ?> mmHg
            </div>
            <div class="uk-margin-right">
                <b class="uk-margin-right">HR</b> <?php echo $hr ?> /min
            </div>
            <div class="uk-margin-right">
                <b class="uk-margin-right">RR</b> <?php echo $rr ?> /min
            </div>
            <div class="uk-margin-right">
                <b class="uk-margin-right">Oxygen saturation</b> <?php echo $oxygen ?> %
            </div>
        </div>
    </dd>

    <dt>HEENT</dt>
    <dd><input class="uk-checkbox" type="checkbox" checked> ปกติ</dd>

    <dt>Heart</dt>
    <dd>
        <input class="uk-checkbox" type="checkbox" checked> ปกติ
        <span> <?php echo $heart_text ?></span>
    </dd>

    <dt>Lungs</dt>
    <dd><input class="uk-checkbox" type="checkbox" checked> ปกติ</dd>

    <dt>Abdomen</dt>
    <dd><input class="uk-checkbox" type="checkbox" disabled> ปกติ</dd>

    <dt>Extremities</dt>
    <dd><input class="uk-checkbox" type="checkbox" disabled> ปกติ</dd>

    <dt>Neuro</dt>
    <dd><input class="uk-checkbox" type="checkbox" checked> ปกติ</dd>

    <h5 class="uk-heading-bullet">Score assessment</h5>

    <dt>PPS</dt>
    <dd><?php echo $pps ?></dd>

    <dt>Geriatric depression scale</dt>
    <dd><?php echo $gds ?></dd>

    <h5 class="uk-heading-bullet">Mini mental state examination</h5>

    <dt>Orientation to time</dt>
    <dd><?php echo $mini_time ?></dd>

    <dt>Orientation to place</dt>
    <dd><?php echo $mini_place ?></dd>

    <dt>Registration</dt>
    <dd><?php echo $mini_reg ?></dd>

    <dt>Attention / Calculation</dt>
    <dd><?php echo $mini_cal ?></dd>

    <dt>Recall</dt>
    <dd><?php echo $mini_recall ?></dd>

    <dt>Naming</dt>
    <dd><?php echo $mini_naming ?></dd>

    <dt>Repetition</dt>
    <dd><?php echo $mini_repetition ?></dd>

    <dt>Verbal command</dt>
    <dd><?php echo $mini_verbal ?></dd>

    <dt>Written command</dt>
    <dd><?php echo $mini_written ?></dd>

    <dt>Writing</dt>
    <dd><?php echo $mini_writing ?></dd>

    <dt>Visuoconstruction</dt>
    <dd><?php echo $mini_vis ?></dd>

    <dt>Psychological<br>and Social peroblem</dt>
    <dd><br>
        <?php echo $summary_plan ?><br>
    </dd>

    <dt>Other problem</dt>
    <dd>
        <?php echo $summary_plan ?><br>
    </dd>

    <h5 class="uk-heading-bullet">Summarized</h5>

    <dt>Assessment and Plan</dt>
    <dd>
       <?php echo $summary_plan ?><br>
    </dd>

    <dt>Goal</dt>
    <dd>
       <?php echo $summary_goal ?><br>
    </dd>

    <h4 class="uk-heading-divider">ส่วนที่ 3 สรุปข้อมูลปัญหา</h4>
    <h5 class="uk-heading-bullet">รหัสการวินิจฉัยปัญหาผู้ป่วย</h5>

    <dt>วินิจฉัยหลัก</dt>
    <dd>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </dd>

    <dt>ปัญหา</dt>
    <dd>
        <ol>
            <li>Sed suscipit nibh a nisi feugiat, id vehicula nulla auctor.</li>
            <li>Nam sit amet tellus sit amet sem mollis blandit ut porta tortor.</li>
            <li>Vestibulum vitae ex fringilla, ultricies quam at, pretium libero.</li>
        </ol>
    </dd>

    <h4 class="uk-heading-divider">ส่วนที่ 4 สรุปหลังการประชุม</h4>

    <dt>สรุปคำแนะนำ</dt>
    <dd>
        <?php echo $suggestion ?><br>
    </dd>

    <dt>วางแผนครั้งต่อไป</dt>
    <dd>
        เยี่ยมบ้านต่อ
        <span class="text-green">วันที่ 31 พฤษภาคม 2560</span>
    </dd>
</dl>
