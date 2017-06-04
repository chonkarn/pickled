<h4 class="uk-heading-divider">ส่วนที่ 2 รายละเอียดปัญหา</h4>
<div class="uk-form-horizontal">
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Biological problem</label>
        <div class="uk-form-controls">
            <textarea name="bio_problem" class="uk-textarea uk-width-1-2@m" rows="3" placeholder="โปรดระบุ..."><?php echo $bio_problem ?></textarea>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Physical examination</h5>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Vital sign</label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-margin-right">
                    BP
                    <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="" name="bp1" value="<?php echo $bp1 ?>" /> /
                    <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="" name="bp2" value="<?php echo $bp2 ?>" /> mmHg
                </div>
                
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-margin-right">
                    HR
                    <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="" name="hr" value="<?php if($hr != NULL){ echo $hr; } ?>" /> /min
                </div>
                
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-margin-right">
                    RR
                    <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="" name="rr" value="<?php if($rr != NULL){ echo $rr; } ?>" /> /min
                </div>
        </div>
    </div>
    
    <div class="uk-margin">
        <div class="uk-form-controls">
            <div class="uk-width-1-2@s">
                Oxygen saturation
                <input class="uk-input uk-form-width-small uk-form-small" type="number" placeholder="" name="oxygen" value="<?php if($oxygen != NULL){ echo $oxygen; } ?>" /> %
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">HEENT</label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-6@s">
                    <input name="heent" value="1" class="uk-checkbox" type="checkbox" <?php if($heent == 1){ echo "checked"; } ?> /> ปกติ
                </div>
                <div class="uk-width-1-2@s">
                    <input name="heent_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php echo $heent_text ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Heart</label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-6@s">
                    <input name="heart" value="1" class="uk-checkbox" type="checkbox" <?php if($heart == 1){ echo "checked"; } ?> /> ปกติ
                </div>
                <div class="uk-width-1-2@s">
                    <input name="heart_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php if($heart_text != NULL){ echo $heart_text; } ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Lungs</label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-6@s">
                    <input name="lungs" value="1" class="uk-checkbox" type="checkbox" <?php if($lungs == 1){ echo "checked"; } ?> /> ปกติ
                </div>
                <div class="uk-width-1-2@s">
                    <input name="lungs_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php if($lungs_text != NULL){ echo $lungs_text; } ?>" />
                </div>
            </div>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Abdomen</label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-6@s">
                    <input name="abdomen" value="1" class="uk-checkbox" type="checkbox" <?php if($abdomen == 1){ echo "checked"; } ?> /> ปกติ
                </div>
                <div class="uk-width-1-2@s">
                    <input name="abdomen_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php if($abdomen_text != NULL){ echo $abdomen_text; } ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Extremities</label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-6@s">
                    <input name="extremities" value="1" class="uk-checkbox" type="checkbox" <?php if($extremities == 1){ echo "checked"; } ?> /> ปกติ
                </div>
                <div class="uk-width-1-2@s">
                    <input name="extremities_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php if($extremities_text != NULL){ echo $extremities_text; } ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Neuro</label>
        <div class="uk-form-controls">
            <div class="uk-grid">
                <div class="uk-width-1-6@s">
                    <input name="neuro" value="1" class="uk-checkbox" type="checkbox" <?php if($neuro == 1){ echo "checked"; } ?> /> ปกติ
                </div>
                <div class="uk-width-1-2@s">
                    <input name="neuro_text" class="uk-input uk-form-small" placeholder="คำอธิบายเพิ่มเติม..." value="<?php if($neuro_text != NULL){ echo $neuro_text; } ?>" />
                </div>
            </div>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Score assessment</h5>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">PPS</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" name="pps" value="<?php if($pps != NULL){ echo $pps; } ?>" />
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Geriatric depression scale</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" name="gds" value="<?php if($gds != NULL){ echo $gds; } ?>" />
        </div>
    </div>

    <h5 class="uk-heading-bullet">Mini mental state examination</h5>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Mini-cog</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" name="mini_cog" value="<?php echo $mini_cog ?>" />
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Cube test</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" name="mini_cube" value="<?php if($gds != NULL){ echo $gds; } ?>" />
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Clock drawing test</label>
        <div class="uk-form-controls">
            <input class="uk-input uk-form-width-small uk-form-small" type="number" name="mini_clock" value="<?php if($gds != NULL){ echo $gds; } ?>" />
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"> Psychological and Social problem</label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea uk-width-1-2@m" rows="3" placeholder="โปรดระบุ..." name="mini_psycho"><?php echo $mini_psycho ?></textarea>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Other problem</label>
        <div class="uk-form-controls">
            <textarea name="mini_other" class="uk-textarea uk-width-1-2@m" rows="3" placeholder="โปรดระบุ..."><?php echo $mini_other ?></textarea>
        </div>
    </div>

    <h5 class="uk-heading-bullet">Summarized</h5>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Assessment and Plan</label>
        <div class="uk-form-controls">
            <textarea name="summary_plan" class="uk-textarea uk-width-1-2@m" rows="3" placeholder="โปรดระบุ..."><?php echo $summary_plan ?></textarea>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Goal</label>
        <div class="uk-form-controls">
            <textarea name="summary_goal" class="uk-textarea uk-width-1-2@m" rows="3" placeholder="โปรดระบุ..."><?php echo $summary_goal ?></textarea>
        </div>
    </div>
</div>
