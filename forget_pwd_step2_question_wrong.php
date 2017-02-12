  <?php
    $username = $_GET["username"];
    $question = $_GET["question"];
    switch ($question) {
    case 1:
        $question = "บ้านเกิดคุณอยู่ที่จังหวัดใด";
        break;
    case 2:
        $question = "สัตว์เลี้ยงตัวแรกชื่ออะไร";
        break;
    case 3:
        $question = "โรงเรียนอนุบาลของคุณชื่ออะไร";
        break;
    case 4:
        $question = "หนังสือเล่มโปรดของคุณชื่ออะไร";
        break;        
    case 5:
        $question = "โทรศัพท์เครื่องแรกยี่ห้ออะไร";
        break;
}
    ?>
<html>

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
            <form method="post" action="forget_reset.php?username='<?php echo $username;?>'">
                <h2 class="uk-text-center uk-text-green">รีเซ็ตรหัสผ่าน</h3>
                <h3 class="uk-text-center uk-text-green" ><?php echo $question; ?></h3>
                <h3 class="uk-text-center uk-text-green" name="wrong_answer" ></h3>
                <h5 class="uk-text-center uk-text-green" style="color:grey">รีเซ็ตรหัสผ่านโดยการตอบคำถามที่เคยตั้งไว้</h3>
                <h5 class="uk-text-center uk-text-red" style="color:red;">คำตอบไม่ถูกต้อง กรุณาลองใหม่</h3>
                <div class="uk-margin">
                    <input class="uk-input" id="form-stacked-text" type="text" id="answer" name="answer" placeholder="คำตอบ">
                </div>
                <div class="uk-margin uk-text-right">
                    <button class="uk-button uk-button-primary uk-button-green">ยืนยัน</button>
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