<!DOCTYPE html>
<html>

<?php include "head.html"; ?>

    <body>
        <header class="mdl-color--primary mdl-color-text--white">
            <div class="mdl-layout__header-row">
                <img src="img/logo-rama.png" width="50px" style="margin-right: 20px;">
                <div class="mdl-layout-title" style="margin-top: 20px;">
                    <h6 class="mdl-typography--title mdl-color-text--white">
                        ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน
                        <p>ภาควิชาเวชศาสตร์ครอบครัว คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี มหาวิทยาลัยมหิดล</p>
                    </h6>
                </div>
            </div>
        </header>
        <main class="mdl-grid demo-content">
            <div id="login">
                <form method="post" action="login_check.php">
                    <h3 class="uk-text-center text-green">ลงชื่อเข้าใช้งาน</h3>
                    <h5 class="uk-text-center text-red">คุณใส่รหัสผู้ใช้งานหรือรหัสผ่านผิดพลาด<br>กรุณาลองอีกครั้ง</h5>
                    <div class="uk-margin">
                        <input class="uk-input" id="form-stacked-text" name="username" type="text" placeholder="ผู้ใช้งาน">
                    </div>
                    <div class="uk-margin uk-text-right">
                        <input class="uk-input" type="password" id="form-stacked-text" name="pwd" type="text" placeholder="รหัสผ่าน">
                        <a href="forget_pwd_step1_usr.html"><small>ลืมรหัสผ่าน?</small></a>
                    </div>
                    <div class="uk-margin uk-text-center">
                        <button class="uk-button uk-button-default button-green">เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
        </main>

        <!--jquery-->
        <script src="js/jquery-3.1.1.min.js"></script>

        <!--js-->
        <script src="lib/mdl/material.min.js"></script>
        <script src="lib/uikit/js/uikit.min.js"></script>
    </body>

</html>
