<!DOCTYPE html>
<html>
<?php
$username = $_GET["username"];
    ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <title>ระบบบริหารจัดการข้อมูลหน่วยบริการเยี่ยมบ้าน (Home visit service management system)</title>

    <!--mdl-->
    <link rel="stylesheet" href="lib/mdl/material.min.css">
    <link rel="stylesheet" href="lib/mdl-template-dashboard/styles.css">

    <!--uikit-->
    <link rel="stylesheet" href="lib/uikit/css/uikit.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
</head>

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
            <h3 class="uk-text-center uk-text-green">กำหนดรหัสผ่านใหม่</h3>
            <form method="post" action="forget_save.php?username='<?php echo $username; ?>'">
                <h3 class="uk-text-center uk-text-green">กำหนดรหัสผ่าน</h3>
                <div class="uk-margin">
                    <input class="uk-input" id="form-stacked-text" type="password" name="new_pwd" placeholder="กรอกรหัสผ่าน">
                </div>
                <div class="uk-margin uk-text-right">
                    <input class="uk-input" id="form-stacked-text" type="password" name="new_pwd_re"placeholder="กรอกรหัสผ่านอีกครั้ง">
                </div>
                <div class="uk-margin uk-text-center">
                    <button class="uk-button uk-button-default button-green">บันทึก</button>
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
