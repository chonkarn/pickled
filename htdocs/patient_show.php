<!DOCTYPE html>
<html>
<?php 
    include 'patient_step1_variable_manage.html';
	session_start();
	if($_SESSION['id'] == "")
	{
		echo "Please Login!";
		exit();
	}
    
    $dbhost = 'localhost';
                                    $dbuser = 'hvmsdb';
                                    $dbpass = '1234';
                                    $dbname = 'homevisit';
mysql_connect($dbhost,$dbuser,$dbpass) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
$hn = $_GET["hn"];
$sql20="SELECT * from patientinfo where patient_hn like '$hn' ";

mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
$result = mysql_db_query($dbname,$sql20) or die (mysql_error());
$row = mysql_fetch_array($result); 
$insure = $row["insure"];    
$insureid = "SELECT insure_name FROM healthinsure where insure_id ='$insure'";
$q=mysql_query($insureid);   
$r=mysql_fetch_array($q);
$ins = $r['insure_name'];
    
$type = $row["patient_visit_type"];
switch ($type) {
case 1:
    $type = "Home visit care"; break;
case 2:
    $type = "Geriatric case"; break;
case 3:
    $type = "Palliative case"; break;
}    
    
    
    
    $hn = $row["patient_hn"]; 
    $l1 = $row["patient_p_name"]." ".$row["patient_name"]." ".$row["patient_surname"];
    $doc = $row["patient_doctor_owner"];
    $add = $row["patient_p_name"]." ".$row["patient_name"]." ".$row["patient_surname"];
    $addd = "เลขที่ ".$row["patient_add_no"]." หมู่ที่ ".$row["patient_add_mhoo"]." อาคาร/หมู่บ้าน ".$row["patient_add_village"]." ซอย ".$row["patient_add_soi"]." ถนน ".$row["patient_add_road"]." แขวง/ตำบล ".$row["patient_add_subdis"]." เขต/อำเภอ ".$row["patient_add_dis"]." จังหวัด ".$row["patient_add_province"]." รหัสไปรษณีย์ ".$row["patient_add_zip"];
    $gender = $row["patient_gender"];
    $l2 = "วันที่ ".$row["patient_dateofbirth"]." เดือน ".$row["patient_monthofbirth"]." ปี ".$row["patient_yearofbirth"];
    $id = $row["patient_id"];
    
    $a = $row["patient_yearofbirth"];
$tel = $row["patient_no_mobile"];
$status = $row["patient_status"];
$religion = $row["patient_religion"];
$edu = $row["patient_education"];
$occ = $row["patient_occupation"];
$r1 = $row["relate_name"]; 
$r2 = $row["relate_def"];
$r3 = $row["relate_tel"];
$sur = $row["surgery"];
$al = $row["alternative"];
$b = $row["alcohol"];
$p = $row["alcohol_input"];
$ll = $row["problem"];
$ci = $row["cigarette"];
$cia = $row["cigarette_amout"];
$ciy = $row["cigarette_period"];
$money = $row["money"];
$hyper = $row["hypertansion"];
$nani = $row["diabetes_mellitus"];
$naani = $row["dyslipidemia"];
$stroke = $row["stroke"];
$cad = $row["cad"];
$can = $row["cancer"];
$other = $row["other"];
$lov = $row["allergic"];

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

    <!--font-->
    <link href="https://fonts.googleapis.com/css?family=Prompt&subset=thai" rel="stylesheet">

    <!--icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="lib/font-awesome-4.6.3/css/font-awesome.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/breadcrumb.css">
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
           <?php include "header.html";?>
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">
                    <ul class="breadcrumb">
                        <li><a href="patient.html">ผู้ป่วยเยี่ยมบ้าน</a></li>
                        <li>ข้อมูลผู้ป่วย HN
                            <?php echo $hn;?>
                        </li>
                    </ul>
                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                        <div class="mdl-card__menu">
                            <button id="menu-function" class="mdl-button mdl-js-button mdl-button--icon"> <i class="material-icons">more_vert</i> </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-function">
                                <li class="mdl-menu__item"><a href="<?php echo "patient_edit.php?hn=".$hn?>"><i class="material-icons">edit</i> แก้ไข</a></li>
                                <li class="mdl-menu__item"><a href="<?php echo "patient_print.html"?>" target="_blank"><i class="material-icons">print</i> พิมพ์</a></li>
                                <li class="mdl-menu__item"><a id="dialog-delete"><i class="material-icons">delete</i> ลบ</a></li>
                            </ul>
                            <dialog class="mdl-dialog">
                                <h4 class="mdl-dialog__title">ต้องการลบหรือไม่?</h4>
                                <div class="mdl-dialog__content">
                                    <p>
                                        <?php echo $l1;?>
                                            <br>HN
                                            <?php echo $hn;?>
                                    </p>
                                </div>
                                <div class="mdl-dialog__actions">
                                    <a href="patient.html">
                                        <button type="button" class="mdl-button">ลบ</button>
                                    </a>
                                    <button type="button" class="mdl-button close">ยกเลิก</button>
                                </div>
                            </dialog>
                        </div>
                        <div class="mdl-card__supporting-text mdl-color-text--grey-900 mdl-cell--12-col">
                            <div class="mdl-grid mdl-typography--subhead">
                                <div><img class="logo-report" src="img/logo-report.jpg">
                                    <p class="mdl-typography--body-2">FAM-MED</p>
                                </div>
                                <div> แบบบันทึกสุขภาพผู้ป่วยและครอบครัว
                                    <br> ภาควิชาเวชศาสตร์ครอบครัว คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี
                                    <p class="mdl-typography--title">Department of Family Medicine</p>
                                </div>
                            </div>
                            <dl class="dl-horizontal mdl-typography--subhead"> <dt>รหัสโรงพยาบาล</dt>
                                <dd>HN
                                    <?php echo $hn;?>
                                </dd> <dt>สถานะการเยี่ยมบ้าน</dt>
                                <dd>เยี่ยมต่อ</dd> <dt>ประเภทการเยี่ยมบ้าน</dt>
                                <dd>
                                    <?php echo $type;?>
                                </dd> <dt>แพทย์เจ้าของไข้</dt>
                                <dd>
                                    <?php echo $doc;?>
                                        <//dd>
                                        <hr>
                                        <h1 class="mdl-typography--title mdl-color-text--green">ส่วนที่ 1 ข้อมูลทั่วไป</h1> <dt>เลขที่บัตรประชาชน</dt>
                                        <dd>
                                            <?php echo $id;?>
                                        </dd> <dt>ชื่อ-นามสกุล</dt>
                                        <dd>
                                            <?php echo $add;?>
                                        </dd> <dt>ที่อยู่ปัจจุบัน</dt>
                                        <dd>
                                            <?php echo $addd;?>
                                                <!--                                เลขที่ 270 หมู่ที่ 1 อาคาร/หมู่บ้าน สุขนคร ซอย สามัคคี ถนน พระรามหก แขวง/ตำบล ทุ่งพญาไท เขต/อำเภอ ราชเวที จังหวัด กรุงเทพมหานคร 10400-->
                                        </dd> <dt>เพศ</dt>
                                        <dd>
                                            <?php 
                                $mars = "fa fa-mars";
                                $venus = "fa fa-venus";
                                if ($gender == "male"){
                                    echo "<i class={$mars}></i> ชาย</dd>;";
                                }
                                else
                                    echo "<i class={$venus}></i> หญิง</dd>;";
                                ?> </dd> <dt>วัน เดือน ปีเกิด</dt>
                                        <dd>
                                            <?php  echo $l2; ?>
                                        </dd> <dt>อายุ</dt>
                                        <dd>
                                            <?php 
                                $age = 2560 - $a;
                                echo $age;
                                ?>
                                        </dd> <dt>โทรศัพท์</dt>
                                        <dd><i class="fa fa-phone"></i>
                                            <?php echo $tel;?>
                                        </dd> 
                            <dt>สถานภาพ</dt>
                                        <dd>
                                            <?php  switch($status){
    case 0:
        echo "โสด" ; break;
        case 1:
        echo "สมรส" ; break;
            case 2:
        echo "หม้าย" ; break;
            case 3:
        echo "หย่าร้าง" ; break;
            case 4:
        echo "แยกกันอยู่" ; break;
                            };
                                ?>
                                        </dd> <dt>ศาสนา</dt>
                                        <dd>
                                            <?php  
                                
                                if ($religion  == 1) echo "พุธ" ;
                                else if ($religion  == 2)echo "คริสต์" ;
                                else if ($religion  == 3)echo "อิสลาม" ;
                                else echo $religion ;
                                ?>
                                        </dd> <dt>ระดับการศึกษา</dt>
                                        <dd>
                                            <?php  switch($edu){
   
            case 0:
        echo "ประถมศึกษา" ; break;
            case 1:
        echo "มัธยมศึกษา" ; break;
            case 2:
        echo "ปวส / ปวท" ; break;
        case 3:
        echo "ปริญญาตรี" ; break;
        case 4:
        echo "ปริญญาโท" ; break;
        case 5:
        echo "ปริญญาเอก" ; break;
        default:
        echo $edu;
                            };
                                ?>
                                        </dd> <dt>อาชีพ</dt>
                                        <dd>
                                            <?php  switch($occ){
   
            
            case 1:
        echo "นักเรียน/นักศึกษา" ; break;
            case 2:
        echo "รับราชการ" ; break;
        case 3:
        echo "รัฐวิสาหกิจ" ; break;
        case 4:
        echo "พนักงานมหาวิทยาลัย" ; break;
        case 5:
        echo "พนักงานบริษัท" ; break;
        case 6:
        echo "รับจ้าง" ; break;
        case 7:
        echo "ค้าขาย" ; break;
        case 8:
        echo "เกษตรกร" ; break;
        case 9:
        echo "แม่บ้าน/ว่างงาน" ; break;
        case 10:
        echo "ธุรกิจส่วนตัว" ; break;
        case 11:
        echo "นักบวช" ; break;
        case 12:
        echo "เกษียณอายุ" ; break;
        default:
        echo $occ;
                            };
                                ?>
                                        </dd> <dt>สิทธิการรักษา</dt>
                                        <dd>
                                            <?php 
                                echo $ins;
                                ?>
                                        </dd>
                                        <hr> <dt>ข้อมูลญาติที่ติดต่อได้</dt>
                                        <dd> <b>ญาติ:</b>
                                            <br>ชื่อ-นามสกุล: <?php $r1; ?>
                                            <br>เกี่ยวข้องเป็น <?php $r2; ?>
                                            <br>เบอร์ติดต่อ: <i class="fa fa-phone"></i> <?php $tel; ?>
                                            
                                        
                                        <hr>
                                        <h1 class="mdl-typography--title mdl-color-text--green">ส่วนที่ 2 ข้อมูลสุขภาพ</h1>
                                        <h3 class="mdl-typography--title">ประวัติการรักษา</h3> <dt>การผ่าตัด</dt>
                                        <dd>
                                            <?php  
    
                                if ($sur ==0) echo "ไม่เคยผ่าตัด";
                                else echo "เคยผ่าตัด ".$sur;
                                
                                ?>
                                        </dd> <dt>การแพ้ยา/แพ้อาหาร</dt>
                                        <dd>
                                            <?php 
                                    if ($lov ===0) {echo "ไม่แพ้ยาและไม่แพ้อาหาร".$row["allergic"];}
                                
                                    else {
                                     echo    "แพ้ ".$lov;}
                                ?>
                                        </dd> <dt>แพทย์ทางเลือก</dt>
                                        <dd>
                                            <?php  if($al==0) echo "ไม่มีแพทย์ทางเลือก";
                                    else echo "มีแพทย์ทางเลือก ".$al;
                                ?>
                                        </dd>
                                        <h3 class="mdl-typography--title">พฤติกรรมเสี่ยงในปัจจุบัน</h3> <dt>สุรา</dt>
                                        <dd>
                                            <?php 
                                
   
                                        if ($b == "NO"){
                                             echo "ไม่เคยดื่ม" ;
                                        }
                                        else if ($b == "NOW"){
                                            echo "ดื่มอยู่ตอนนี้" ;
                                            if ($p == 0) echo " และมีปัญหาการดื่ม";
                                            else echo " และไม่มีปัญหาการดื่ม";
                                        }
                                        else {
                                            echo "เคยดื่ม" ;
                                            if ($p == 0) echo " และมีปัญหาการดื่ม";
                                            else echo " และไม่มีปัญหาการดื่ม";
                                        }
                             
                                
                                ?>
                                        </dd> <dt>บุหรี่</dt>
                                        <dd>
                                            <?php 
                                
   
                                        if ($ci == "NO"){
                                             echo "ไม่เคยสูบ" ;
                                        }
                                        else if ($ci == "NOW"){
                                            echo "สูบอยู่ตอนนี้ ".$cia." ต่อวัน เป็นเวลา ".$ciy ." ปี" ;
                                        }
                                        else {
                                            echo "เคยสูบ ".$cia." ต่อวัน เป็นเวลา ".$ciy ." ปี" ;
                                        }
                             
                                
                                ?>
                                        </dd>
                                        <h3 class="mdl-typography--title">ประวัติครอบครัว</h3> <dt>สถานะทางการเงิน</dt>
                                        <dd>
                                            <?php  switch($money){
   
            
            case 1:
        echo "มีปัญหา" ; break;
            case 2:
        echo "ไม่มีปัญหา" ; break;
}
                                ?>
                                        </dd> <dt>ประวัติโรคในครอบครัว</dt>
                                        <dd>
                                            <ul class="mdl-typography--subhead">
                                                <br>
                                                <?php 
                                        if ($hyper == 1) echo "<li>hypertansion</li>";
                                        if ($nani ==1) echo "<li>diabetes mellitus</li>";
                                        if ($naani==1) echo "<li>dyslipidemia</li>";
                                        if ($stroke==1) echo "<li>stroke</li>";
                                        if ($cad==1) echo "<li>cad</li>";
                                        if ($can!=0) echo "<li>".$row["cancer"]."</li>";
                                        if ($other!=0) echo "<li>".$row["other"]."</li>";

                                    
                                    ?>
                                            </ul>
                                        </dd>
                                        <hr>
                                        <h1 class="mdl-typography--title mdl-color-text--green">ส่วนที่ 3 สรุปข้อมูลปัญหาผู้ป่วย</h1> <dt>รหัสการวินิจฉัยปัญหา</dt>
                                        <dd>
                                            <ul class="mdl-typography--subhead">
                                                <?php $test = $ll;
                                            $mind = explode (",",$test);
                                            $a = 0;
                                                while ($a < sizeof($mind)){
                                                    $s="SELECT * from icd10 where icd10_id like '$mind[$a]' ";
                                                    $r = mysql_db_query($dbname,$s) or die (mysql_error());
                                                    $ro = mysql_fetch_array($r);
                                                echo "<li>".$ro["icd10_id"]." ".$ro["icd10_name"]."</li>";
                                                $a++;
                                                }?>
                                            </ul>
                                        </dd>
                                        <hr> <dt> ผู้บันทึกข้อมูล </dt>
                                        <dd> นพ.ประสงค์ ทรงธรรม (013651) เมื่อวันที่ 24/09/2559 </dd>
                            </dl>
                        </div>
                    </div>
                    <!--/.mdl-card-->
                </div>
            </main>
        </div>
        <script src="lib/mdl/material.min.js"></script>
        <script src="js/dialog.js"></script>
    </body>

</html>