<dl class="dl-horizontal">
    <h4 class="uk-heading-divider">ส่วนที่ 1 ข้อมูลทั่วไป</h4>

    <dt>ชื่อผู้ป่วย</dt>
    <dd>
        <?php echo $patient_name ?>
    </dd>

    <dt>รหัสโรงพยาบาล</dt>
    <dd>HN
        <?php echo $hn ?>
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
    <dd>20 มิถุนายน พ.ศ. 2559</dd>

    <dt>เวลาที่ไปเยี่ยม</dt>
    <dd>ภาคเช้า (9.00-12.00 น)</dd>

    <dt>เยี่ยมบ้านครั้งที่</dt>
    <dd>5</dd>

    <dt>เหตุผลการเยี่ยมบ้าน</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="reason" checked> Assessment</label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-radio" type="radio" name="reason" disabled> Illness management</label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-radio" type="radio" name="reason" disabled> Palliative</label>
        <label class="uk-margin-right uk-text-muted"><input class="uk-radio" type="radio" name="reason" disabled> Post hospitalized</label>
    </dd>

    <dt>ยาที่ใช้ปัจจุบัน<br>และยาที่ซื้อกินเอง</dt>
    <dd>
        <b>ยาชนิดที่ 1:</b>
        <br> ชื่อยา: ยาลดไข้
        <hr>
        <b>ยาชนิดที่ 2:</b>
        <br> ชื่อยา: ยาลดน้ำมูก
    </dd>

    <!--
    <div class="uk-margin">
        <label class="uk-form-label">ยาที่ใช้ปัจจุบันและยาที่ซื้อกินเอง</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-auto">
                    <label class="uk-margin-right uk-text-bold">ชื่อยา</label> ยาลดไข้
                </div>
                <div>
                    <label class="uk-margin-right uk-text-bold">ลักษณะ</label>
                    <label class="uk-margin-right"><input class="uk-radio" type="radio" name="unit-1" checked> ยาเม็ด
                                                    </label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-radio" type="radio" name="unit-1" disabled> ยาน้ำ
                                                    </label>
                </div>
                <div>
                    <label class="uk-margin-right uk-text-bold">โดส</label> 1 เม็ด
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-auto">
                    <label class="uk-margin-right uk-text-bold">วิธีใช้ยา</label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-radio" type="radio" name="method-1" disabled> ก่อนอาหาร</label>
                    <label class="uk-margin-right">
                                                        <input class="uk-radio" type="radio" name="method-1" checked> หลังอาหาร</label>
                </div>
                <div>
                    <label class="uk-margin-right uk-text-bold">ช่วงเวลา</label>
                    <label class="uk-margin-right">
                                                        <input class="uk-checkbox" type="checkbox" checked> เช้า
                                                    </label>
                    <label class="uk-margin-right">
                                                        <input class="uk-checkbox" type="checkbox" checked> กลางวัน
                                                    </label>
                    <label class="uk-margin-right">
                                                        <input class="uk-checkbox" type="checkbox" checked> เย็น
                                                    </label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-checkbox" type="checkbox" disabled> ก่อนนอน
                                                    </label>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-auto">
                    <label class="uk-margin-right uk-text-bold">ชื่อยา</label> ยาลดน้ำมูก
                </div>
                <div>
                    <label class="uk-margin-right uk-text-bold">ลักษณะ</label>
                    <label class="uk-margin-right">
                                                        <input class="uk-radio" type="radio" name="unit" checked> ยาเม็ด
                                                    </label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-radio" type="radio" name="unit" disabled> ยาน้ำ
                                                    </label>
                </div>
                <div>
                    <label class="uk-margin-right uk-text-bold">โดส</label> 1 เม็ด
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-auto">
                    <label class="uk-margin-right uk-text-bold">วิธีใช้ยา</label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-radio" type="radio" name="method-2" disabled> ก่อนอาหาร</label>
                    <label class="uk-margin-right">
                                                        <input class="uk-radio" type="radio" name="method-2" checked> หลังอาหาร</label>
                </div>
                <div>
                    <label class="uk-margin-right uk-text-bold">ช่วงเวลา</label>
                    <label class="uk-margin-right">
                                                        <input class="uk-checkbox" type="checkbox" checked> เช้า
                                                    </label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-checkbox" type="checkbox" disabled> กลางวัน
                                                    </label>
                    <label class="uk-margin-right">
                                                        <input class="uk-checkbox" type="checkbox" checked> เย็น
                                                    </label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-checkbox" type="checkbox" disabled> ก่อนนอน
                                                    </label>
                </div>
            </div>
        </div>
    </div>
-->

    <h5 class="uk-heading-bullet">Impairment / Immobility</h5>
    <dt>Basic activities<br>of daily living</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio " type="radio" name="basic" checked> Yes</label>
        <label class="uk-text-muted"><input class="uk-radio" type="radio" name="basic" disabled> No</label>
        <hr>
        <label class="uk-margin-right"><b>Problem</b></label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Dressing</label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Eating</label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Ambulating</label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Toileting</label>
        <label class="uk-margin-right"><input class="uk-checkbox" type="checkbox"> Hygine</label>
    </dd>

    <dt>Instrumental activities<br>of daily living</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio " type="radio" name="basic" checked> Yes</label>
        <label class="uk-text-muted"><input class="uk-radio" type="radio" name="basic" disabled> No</label>
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
    <dd>ห้องน้ำ</dd>

    <h5 class="uk-heading-bullet">Social support</h5>
    <dt>Caregiver burden</dt>
    <dd>
        <label class="uk-margin-right"><input class="uk-radio" type="radio" name="caregiver" checked> Yes</label>
        <label class="uk-text-muted"><input class="uk-radio" type="radio" name="caregiver" disabled> No</label>
    </dd>

    <dt>Main caregiver</dt>
    <dd>?</dd>

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
    <dd>
        <input class="uk-checkbox" type="checkbox" checked> Assessment
    </dd>

    <dt></dt>
    <dd>
        <input class="uk-checkbox" type="checkbox" checked> Pain & Symptom management
        <span>: ตัวตน ซาร์สแตนดาร์ดเซ็นเซอร์บร็อกโคลี</span>
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
        <span>: ตัวตน ซาร์สแตนดาร์ดเซ็นเซอร์บร็อกโคลี</span>
    </dd>

    <dt></dt>
    <dd><input class="uk-checkbox" type="checkbox" disabled> Other specify</dd>

    <h4 class="uk-heading-divider">ส่วนที่ 2 รายละเอียดปัญหา</h4>

    <dt>Biological problem</dt>
    <dd>
        <?php echo $bio_problem ?>
    </dd>

    <h5 class="uk-heading-bullet">Physical examination</h5>
    <dt>Vital sign</dt>
    <dd>
        <div class="uk-grid">
            <div class="uk-margin-right">
                <b class="uk-margin-right">BP</b> 200 mmHg
            </div>
            <div class="uk-margin-right">
                <b class="uk-margin-right">HR</b> 20 /min
            </div>
            <div class="uk-margin-right">
                <b class="uk-margin-right">RR</b> 200 /min
            </div>
            <div class="uk-margin-right">
                <b class="uk-margin-right">Oxygen saturation</b> 50 %
            </div>
        </div>
    </dd>

    <dt>HEENT</dt>
    <dd><input class="uk-checkbox" type="checkbox" checked> ปกติ</dd>

    <dt>Heart</dt>
    <dd>
        <input class="uk-checkbox" type="checkbox" checked> ปกติ
        <span>: แอคทีฟอัลบั้มทำงานเบบี้</span>
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
    <dd><input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""></dd>

    <dt>Geriatric depression scale</dt>
    <dd><input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""></dd>

    <h5 class="uk-heading-bullet">Mini mental state examination</h5>

    <dt>Orientation to time</dt>
    <dd><input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder=""></dd>

    <dt>Orientation to place</dt>
    <dd>
        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
    </dd>

    <dt>Registration</dt>
    <dd>
        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
    </dd>

    <dt>Attention / Calculation <span class="uk-text-warning">*</span></dt>
    <dd>
        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
    </dd>

    <dt>Recall</dt>
    <dd>
        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
    </dd>

    <dt>Naming</dt>
    <dd>
        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
    </dd>

    <dt>Repetition</dt>
    <dd>
        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
    </dd>

    <dt>Verbal command</dt>
    <dd>
        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
    </dd>

    <dt>Written command <span class="uk-text-warning">*</span></dt>
    <dd>
        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
    </dd>

    <dt>Writing <span class="uk-text-warning">*</span></dt>
    <dd>
        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
    </dd>

    <dt>Visuoconstruction</dt>
    <dd>
        <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
    </dd>

    <dt>Psychological<br>and Social peroblem</dt>
    <dd>
        แฮนด์ อัตลักษณ์คอมพ์ฮันนีมูน รอยัลตี้นายแบบเช็กเพลย์บอยแครอท แจ๊กพอตเช็กถูกต้อง เบิร์นธรรมาภิบาล อึมครึมโมเดิร์น เปราะบางบอยคอตฮันนีมูน มินต์ลามะแบ็กโฮ สติ๊กเกอร์ ควิก แฟนตาซี ยนตรกรรมภควัมบดีเทรลเลอร์เทรลเลอร์ เปปเปอร์มินต์โทรธัมโม เบิร์ดแจ๊กพ็อตดั๊มพ์แมคเคอเรลซีน แจ๊กพอต ริคเตอร์นิวกระดี๊กระด๊า
    </dd>

    <dt>Other problem</dt>
    <dd>
        ไฮไลท์ไมค์ไมค์ คอมพ์โยเกิร์ตภารตะโต๋เต๋โก๊ะ มาร์กซีดานไอซียูอึมครึม มือถือสตรอเบอรีติงต๊องคอนเทนเนอร์ ป๊อปโชห่วยไทยแลนด์ โพสต์เพาเวอร์ไวอากร้า สกรัม บึมปาสกาล แรงใจโคโยตี้ตุ๊กตุ๊กพาร์มอคค่า บัสเอ๊าะแรงดูดเซี้ยว สะเด่า จูเนียร์ม้านั่งป่าไม้แฟรี หมวย ภควัมปติคีตกวีอิสรชน ฮวงจุ้ยซีอีโอไฮแจ็ค เที่ยงวันไทเฮาเฟรชชี่
    </dd>

    <h5 class="uk-heading-bullet">Summarized</h5>

    <dt>Assessment and Plan</dt>
    <dd>
        แมกกาซีนแคนู พะเรอสแตนดาร์ดควิกสหรัฐแรลลี ออร์แกนดีไซน์เนอร์ สามช่าเปโซรุมบ้าพะเรอ ฟลุกติวพันธกิจ แตงกวา สปาโกะโอเปร่าเซี้ยว เคลียร์โครนารีพอร์ทโกลด์เทค เสือโคร่งฮิตอัลไซเมอร์ดีพาร์ตเมนต์พุดดิ้ง
    </dd>

    <dt>Goal</dt>
    <dd>
        ป่ายิ้งฉุบดีเจ แฟ็กซ์สตรอเบอร์รีแมมโบ้อินดอร์ ท็อปบู๊ทอัลตราแฟนตาซีไมเกรน ตรวจสอบร็อคแอปพริคอททาวน์บัลลาสต์ บัลลาสต์ชะโนดซิตีออร์แกน เฟรมกาญจนาภิเษกเอสเพรสโซเทวาธิราช เย้วริคเตอร์ซิงจิ๊กซอว์ แจมเก๊ะ คอนโดเปียโนดีมานด์คอรัปชันแหวว
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
        เทคออร์แกนิก อิเหนาวีซ่ากุมภาพันธ์ไพลิน ไฮเวย์ซูโม่วิลล์ทาวน์ งี้ไอติมว้าว เนิร์สเซอรี ชินบัญชรฮิปฮอปสถาปัตย์ ปักขคณนาแพลน คณาญาติยอมรับช็อปมยุราภิรมย์พิซซ่า วโรกาส ซีนีเพล็กซ์ ขั้นตอนเอาต์เนิร์สเซอรีสเตเดียมโอยัวะ เจี๊ยวออยล์บาร์บีคิว บร็อคโคลีธุหร่ำแฮปปี้ปิยมิตร พาสเจอร์ไรส์เบิร์นโลโก้ชาร์ปอมาตยาธิปไตย โชห่วยปิยมิตรเซอร์ไพรส์บึ้ม เบิร์ดบูม
    </dd>

    <dt>วางแผนครั้งต่อไป</dt>
    <dd>
        เยี่ยมบ้านต่อ
        <span class="text-green">วันที่ 31 พฤษภาคม 2560</span>
    </dd>
</dl>
