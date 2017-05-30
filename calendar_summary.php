<form method="post" action="calendar_summary_db.php">
        <div class="uk-margin">
            <label class="uk-form-label">สรุปผลเยี่ยมบ้าน </label>
            <div class="uk-form-controls uk-form-controls-text">
                <label class="uk-margin-top" for="sumreason">
                    <input class="uk-radio" type="radio" name="sumreason" id="sumreason1" value="1"> ได้เยี่ยมบ้าน </label>
                <br>
                <label class="uk-margin-top" >
                    <input class="uk-radio" type="radio" name="sumreason" id="sumreason2" value="2"> ยกเลิกเยี่ยมบ้าน
                    <br>
                    <label class="uk-margin-right" >
                        <input class="uk-radio" type="radio" name="sumreason" id="sumreason3" value="3"> ปิดเยี่ยมบ้าน </label>
                    <?php 
                            $goback = explode("/",$_SERVER['REQUEST_URI']);
                            $previous = $goback[2];
//                            echo $previous;
                    ?>
                    <input name="previous" value="<?php echo $previous;?>" style="visibility:hidden">
                    <input name="sum_hn" value="<?php echo $row['patient_hn'];?>" style="visibility:hidden">
                    <input name="sum_id" value="<?php echo $row['Id_app'];?>" style="visibility:hidden">
                   
                    <div id="div_sum">
                        <br> <small>ถ้าไม่ได้เยี่ยมบ้าน โปรดระบุเหตุผล</small>
                        <input class="uk-input uk-form-width-medium uk-form-small" type="text" placeholder="ระบุเหตุผล" name="reason_cancel"> </div>
            </div>
        </div>
            
        <div class="uk-modal-footer">
            <!--    <div class="uk-align-right uk-margin-remove-vertical"> <a class="uk-button uk-button-default button-green uk-button-small">บันทึก</a> </div>-->
            <div class="uk-align-right uk-margin-remove-vertical" >
                <button class="uk-button uk-button-default button-green uk-button-small"> บันทึก</button>
            </div>
        </div>
    </form>

