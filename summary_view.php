<div class="uk-form-horizontal">
    <h4 class="uk-margin-top uk-text-green">ส่วนที่ 1 ข้อมูลทั่วไป</h4>
    <div class="uk-margin">
        <label class="uk-form-label">
                                  ชื่อผู้ป่วย
                                </label>
        <div class="uk-form-controls uk-form-controls-text">
            <?php echo $patient_name ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">
                                   รหัสโรงพยาบาล
                                </label>
        <div class="uk-form-controls uk-form-controls-text">
            HN
            <?php echo $patient_hn ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">
                                   แพทย์เจ้าของไข้
                                </label>
        <div class="uk-form-controls uk-form-controls-text">
            นพ.ประสงค์ ทรงธรรม
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">
                                            วันที่ไปเยี่ยม
                                        </label>
        <div class="uk-form-controls uk-form-controls-text">
            20 มิถุนายน พ.ศ. 2559
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">
                                            เวลาที่ไปเยี่ยม
                                        </label>
        <div class="uk-form-controls uk-form-controls-text">
            ภาคเช้า (9.00-12.00 น)
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">
                                            เยี่ยมบ้านครั้งที่
                                        </label>
        <div class="uk-form-controls uk-form-controls-text">
            5
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">เหตุผลการเยี่ยมบ้าน</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="reason" checked> Assessment
                                            </label>
            <label class="uk-margin-right uk-text-muted">
                                                <input class="uk-radio" type="radio" name="reason" disabled> Illness management
                                            </label>
            <label class="uk-margin-right uk-text-muted">
                                                <input class="uk-radio" type="radio" name="reason" disabled> Palliative
                                            </label>
            <label class="uk-margin-right uk-text-muted">
                                                <input class="uk-radio" type="radio" name="reason" disabled> Post hospitalized
                                            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ทีมแพทย์เยี่ยมบ้าน</label>
        <div class="uk-form-controls uk-form-controls-text">
            <ol>
                <li>นพ.นพกุล ทองทา</li>
                <li>นพ.ประสงค์ ทรงธรรม</li>
            </ol>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">ยาที่ใช้ปัจจุบันและยาที่ซื้อกินเอง</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-auto">
                    <label class="uk-margin-right uk-text-bold">ชื่อยา</label> ยาลดไข้
                </div>
                <div>
                    <label class="uk-margin-right uk-text-bold">ลักษณะ</label>
                    <label class="uk-margin-right">
                                                        <input class="uk-radio" type="radio" name="unit-1" checked> ยาเม็ด
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
    <hr>
    <p class="mdl-typography--title">Impairment / Immobility</p>
    <div class="uk-margin">
        <label class="uk-form-label">Basic activities of daily living</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right">
                                                <input class="uk-radio " type="radio" name="basic" checked> Yes
                                            </label>
            <label class="uk-text-muted">
                                                <input class="uk-radio" type="radio" name="basic" disabled> No
                                            </label>
        </div>
    </div>
    <div class="uk-margin uk-text-muted">
        <div class="uk-form-controls">
            <label class="uk-margin-right"><b>Problem</b></label>
            <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox"> Dressing
                                            </label>
            <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox"> Eating
                                            </label>
            <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox"> Ambulating
                                            </label>
            <label class="uk-margin-right">
                                                <input class="uk-checkbox" type="checkbox"> Toileting
                                            </label>
            <input class="uk-checkbox" type="checkbox"> Hygine
            <hr>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Instrumental activities of daily living</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-radio " type="radio" name="instrument" disabled> Yes
                                                    </label>
                    <label>
                                                        <input class="uk-radio" type="radio" name="instrument" checked> No
                                                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-width-1-1">
                    <label class="uk-margin-right"><b>Problem</b></label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-checkbox" type="checkbox" disabled> Shopping</label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-checkbox" type="checkbox" disabled> Houskeeping
                                                    </label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-checkbox" type="checkbox" disabled> Medication
                                                    </label>
                    <label class="uk-margin-right uk-text-muted">
                                                        <input class="uk-checkbox" type="checkbox" disabled> Financial
                                                    </label>
                    <input class="uk-checkbox" type="checkbox" checked> Transpoting / Technology
                    <br>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <p class="mdl-typography--title">Nutrition</p>
    <div class="uk-margin">
        <label class="uk-form-label">Nutritional status</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="nutrition" checked> Healthy
                                            </label>
            <label class="uk-margin-right uk-text-muted">
                                                <input class="uk-radio" type="radio" name="nutrition" disabled> Obesity
                                            </label>
            <label class="uk-text-muted">
                                                <input type="radio" name="nutrition" disabled> Malnutrition</label>
        </div>
    </div>
    <hr>
    <p class="mdl-typography--title">Home environment / Safety</p>
    <div class="uk-margin">
        <label class="uk-form-label">Risk</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right">
                                                <input class="uk-radio " type="radio" name="risk" checked> Yes
                                            </label>
            <label class="">
                                                <input class="uk-radio" type="radio" name="risk" disabled> No
                                            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Place at risk</label>
        <div class="uk-form-controls uk-form-controls-text">
            ห้องน้ำ
        </div>
    </div>
    <hr>
    <p class="mdl-typography--title">Social support</p>
    <div class="uk-margin">
        <label class="uk-form-label">Caregiver burden</label>
        <div class="uk-form-controls uk-form-controls-text">
            <label class="uk-margin-right">
                                                <input class="uk-radio" type="radio" name="caregiver" checked> Yes
                                            </label>
            <label class="uk-text-muted">
                                                <input class="uk-radio" type="radio" name="caregiver" disabled> No
                                            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Main caregiver</label>
        <div class="uk-form-controls uk-form-controls-text">
            sldkflsfkopk
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">สิทธิ์การรักษา</label>
        <div class="uk-form-controls uk-form-controls-text">
            เบิกได้ (เอกชน)
        </div>
    </div>
    <hr>
    <p class="mdl-typography--title">Medication</p>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Prescription drug</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right">
                                                        <input class="uk-radio" type="radio" name="prescription" checked> Yes
                                                    </label>
                    <label class="uk-text-muted">
                                                        <input class="uk-radio" type="radio" name="prescription" disabled> No
                                                    </label>
                </div>
                <div class="uk-width-1-2">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Nonprescription drug</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right">
                                                        <input class="uk-radio " type="radio" name="nonprescription" checked> Yes
                                                    </label>
                    <label class="uk-text-muted">
                                                        <input class="uk-radio" type="radio" name="nonprescription" disabled> No
                                                    </label>
                </div>
                <div class="uk-width-1-2">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Dietary supplement</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right">
                                                        <input class="uk-radio " type="radio" name="supplement" checked> Yes
                                                    </label>
                    <label class="uk-text-muted">
                                                        <input class="uk-radio" type="radio" name="supplement" disabled> No
                                                    </label>
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Medication compliance</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-5@s">
                    <label class="uk-margin-right">
                                                        <input class="uk-radio " type="radio" name="compliance" checked> Yes
                                                    </label>
                    <label class="uk-text-muted">
                                                        <input class="uk-radio" type="radio" name="compliance" disabled> No
                                                    </label>
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <hr>
    <p class="mdl-typography--title">Management</p>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-2">
                    <input class="uk-checkbox" type="checkbox" checked> Assessment
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-2">
                    <input class="uk-checkbox" type="checkbox" checked> Pain & Symptom management
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid uk-grid-small">
                <div class="uk-width-1-2">
                    <input class="uk-checkbox" type="checkbox" checked> Medication management
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-2 uk-text-muted">
                    <input class="uk-checkbox" type="checkbox" disabled> Procedure
                </div>
                <div class="uk-width-1-2">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-3">
                    <input class="uk-checkbox" type="checkbox" checked> Family meeting
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-2 uk-text-muted">
                    <input class="uk-checkbox" type="checkbox" disabled> Social support & Health insurance
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-2 uk-text-muted">
                    <input class="uk-checkbox" type="checkbox" disabled> Psychological care
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-2 uk-text-muted">
                    <input class="uk-checkbox" type="checkbox" disabled> Rehabilitation
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"></label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-2 uk-text-muted">
                    <input class="uk-checkbox" type="checkbox" disabled> Advance direction choice
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"></label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-2 uk-text-muted">
                    <input class="uk-checkbox" type="checkbox" disabled> Dying
                    <span class="uk-text-meta text-small">Funeral plan / Grief bereavement care</span>
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"></label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-2 uk-text-muted">
                    <input class="uk-checkbox" type="checkbox" disabled> Other specify
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <hr>
    <!--step2-->
    <h4 class="uk-margin-top uk-text-green">ส่วนที่ 2 </h4>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Biological problem</label>
        <div class="uk-form-controls uk-form-controls-text">
            Duis accumsan, quam nec faucibus consequat, lectus tellus pellentesque orci, eget sodales ex nunc a tellus. Praesent convallis, lacus vitae luctus iaculis, velit est venenatis est, eget convallis nisl urna sed nunc. Cras tempus et dui ac facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </div>
    </div>
    <hr>
    <p class="mdl-typography--title">Physical examination</p>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Vital sign</label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-4">
                    <b class="uk-margin-right">BP</b> 200 mmHg
                </div>
                <div class="uk-width-1-4">
                    <b class="uk-margin-right">HR</b> 20 /min
                </div>
                <div class="uk-width-1-4">
                    <b class="uk-margin-right">RR</b> 200 /min
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-width-1-3">
                <b class="uk-margin-right">Oxygen saturation</b> 50 %
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">HEENT</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-6@s">
                    <input class="uk-checkbox" type="checkbox" checked> ปกติ
                </div>
                <div class="uk-width-1-2">

                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Heart</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-6@s">
                    <input class="uk-checkbox" type="checkbox" checked> ปกติ
                </div>
                <div class="uk-width-1-2">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Lungs</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-6@s">
                    <input class="uk-checkbox" type="checkbox" checked> ปกติ
                </div>
                <div class="uk-width-1-2">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Abdomen</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-6@s uk-text-muted">
                    <input class="uk-checkbox" type="checkbox" disabled> ปกติ
                </div>
                <div class="uk-width-1-2"></div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Extremities</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-6@s uk-text-muted">
                    <input class="uk-checkbox" type="checkbox" disabled> ปกติ
                </div>
                <div class="uk-width-1-2">
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Neuro</label>
        <div class="uk-form-controls uk-form-controls-text">
            <div class="uk-grid">
                <div class="uk-width-1-6@s">
                    <input class="uk-checkbox" type="checkbox" checked> ปกติ
                </div>
                <div class="uk-width-1-2">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <p class="mdl-typography--title">Score assessment</p>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">PPS</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Geriatric depression scale</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        </div>
    </div>
    <hr>
    <p class="mdl-typography--title">Mini mental state examination</p>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Orientation to time</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Orientation to place</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Registration</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">
                                            Attention / Calculation <span class="uk-text-warning">*</span>
                                        </label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">

            <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Recall</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Naming</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Repetition</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Verbal command</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Written command
                                            <span class="uk-text-warning">*</span>
                                        </label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">

            <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Writing
                                            <span class="uk-text-warning">*</span>
                                        </label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">

            <span class="uk-text-muted uk-text-meta">(ไม่ต้องลงข้อมูล ถ้าหากผู้ป่วยไม่ได้เรียนหนังสือ)</span>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Visuoconstruction</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"> Psychological and Social peroblem</label>
        <div class="uk-form-controls uk-form-controls-text">
            Fusce et ipsum sollicitudin, aliquam neque ut, pulvinar nisi. 
            Morbi ut lectus tempus, imperdiet mi sit amet, malesuada purus. 
            Nam ut lectus non nisl sodales efficitur sit amet venenatis nisl.
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Other problem</label>
        <div class="uk-form-controls uk-form-controls-text">
            Vivamus quis diam pretium, pellentesque libero in, consectetur magna. 
            Vestibulum non pulvinar nisi. Ut eu iaculis dolor. Duis lorem metus, 
            sagittis a varius non, viverra non mi. Ut nisi nisl, ullamcorper vel 
        </div>
    </div>
    <p class="mdl-typography--title">Summarized</p>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Assessment and Plan</label>
        <div class="uk-form-controls uk-form-controls-text">
            Ut condimentum arcu tortor. Pellentesque quis elit sed risus imperdiet 
            eleifend eu eget metus. Maecenas tincidunt sollicitudin mattis. Cras 
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Goal</label>
        <div class="uk-form-controls uk-form-controls-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse 
            vestibulum erat at sapien blandit, id vehicula neque auctor. Aliquam 
        </div>
    </div>
    <hr>
    <!--step3-->
    <h4 class="uk-margin-top uk-text-green">ส่วนที่ 3 สรุปข้อมูลปัญหา</h4>
    <h5 class="uk-margin-top">รหัสการวินิจฉัยปัญหาผู้ป่วย</h5>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">วินิจฉัยหลัก</label>
        <div class="uk-form-controls uk-form-controls-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">ปัญหา</label>
        <div class="uk-form-controls uk-form-controls-text">
            <ol>
                <li>Sed suscipit nibh a nisi feugiat, id vehicula nulla auctor.</li>
                <li>Nam sit amet tellus sit amet sem mollis blandit ut porta tortor.</li>
                <li>Vestibulum vitae ex fringilla, ultricies quam at, pretium libero.</li>
            </ol>
        </div>
    </div>


    <hr>
    <!--step4-->
    <h4 class="uk-margin-top uk-text-green">ส่วนที่ 4 สรุปหลังการประชุม</h4>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">สรุปคำแนะนำ</label>
        <div class="uk-form-controls uk-form-controls-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet gravida neque
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">วางแผนครั้งต่อไป</label>
        <div class="uk-form-controls uk-form-controls-text">
            เยี่ยมบ้านต่อ ระยะเวลา 1 เดือน
            <span class="text-green">วันที่ 2/2/2560</span>
        </div>
    </div>
</div>
<!--/.uk-form-->