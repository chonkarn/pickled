<!DOCTYPE html>
<html>

<?php
	session_start();
	if($_SESSION['id'] == "")
	{
		header( "location:login.php");
		exit();
	}
    include 'dbname.php';
    mysql_connect($servername, $username, $password) or die(mysql_error());
    mysql_select_db($dbname) or die(mysql_error());
    mysql_query("set character set utf8"); 
    
    # GET
    $patient_hn = $_GET['hn'];
    $calendar_id = $_GET['calendar_id'];
    
    # POST
    if(isset($_POST['summary_status'])){
        $summary_status = $_POST['summary_status'];
    }
    $reason_cancel = $_POST['reason_cancel'];
    $reason_visit = $_POST['reason_visit'];
    $med = $_POST['med'];
//    $basic_act = $_POST['basic_act'];
//    $basic_act_dress = $_POST['basic_act_dress'];
//    $basic_act_eat = $_POST['basic_act_eat'];
//    $basic_act_ambu = $_POST['basic_act_ambu'];
//    $basic_act_toilet = $_POST['basic_act_toilet'];
//    $basic_act_hygine = $_POST['basic_act_hygine'];
//    $instru_act = $_POST['instru_act'];
//    $instru_act_shop = $_POST['instru_act_shop'];
//    $instru_act_house = $_POST['instru_act_house'];
//    $instru_act_med = $_POST['instru_act_med'];
//    $instru_act_fin = $_POST['instru_act_fin'];
//    $instru_act_tech = $_POST['instru_act_tech'];
    $nutrition_status = $_POST['nutrition_status'];
    $home_risk = $_POST['home_risk'];
    $home_place = $_POST['home_place'];
    $caregiver_burden = $_POST['caregiver_burden'];
    $main_caregiver = $_POST['main_caregiver'];
    $healthinsure = $_POST['healthinsure'];
    $pre_drug = $_POST['pre_drug'];
$pre_drug_text = $_POST['pre_drug_text'];
$non_drug = $_POST['non_drug'];
$non_drug_text = $_POST['non_drug_text'];
$diet_sup = $_POST['diet_sup'];
$diet_sup_text = $_POST['diet_sup_text'];
$med_com = $_POST['med_com'];
$med_com_text = $_POST['med_com_text'];
        $manage_assess = $_POST['manage_assess'];
        $manage_assess_text	t = $_POST['manage_assess_text	t'];
        $manage_pain = $_POST['manage_pain'];
        $manage_pain_text = $_POST['manage_pain_text'];
        $manage_med = $_POST['manage_med'];
        $manage_med_text = $_POST['manage_med_text'];
        $manage_procedure = $_POST['manage_procedure'];
        $manage_procedure_text = $_POST['manage_procedure_text'];
        $manage_fammeet = $_POST['manage_fammeet'];
        $manage_fammeet_text = $_POST['manage_fammeet_text'];
        $manage_social = $_POST['manage_social'];
        $manage_social_text = $_POST['manage_social_text'];
        $manage_psycho = $_POST['manage_psycho'];
        $manage_psycho_text = $_POST['manage_psycho_text'];
        $manage_rehab = $_POST['manage_rehab'];
        $manage_rehab_text = $_POST['manage_rehab_text'];
        $manage_choice = $_POST['manage_choice'];
        $manage_choice_text = $_POST['manage_choice_text'];
        $manage_dying = $_POST['manage_dying'];
        $manage_dying_text = $_POST['manage_dying_text'];
        $manage_other = $_POST['manage_other'];
        $manage_other_text = $_POST['manage_other_text'];
$bio_problem = $_POST['bio_problem'];
$bp = $_POST['bp'];
$hr = $_POST['hr'];
$rr = $_POST['rr'];
$oxygen = $_POST['oxygen'];
$heent = $_POST['heent'];
$heent_text = $_POST['heent_text'];
$heart = $_POST['heart'];
$heart_text = $_POST['heart_text'];
$lungs = $_POST['lungs'];
$lungs_text = $_POST['lungs_text'];
$abdomen = $_POST['abdomen'];
$abdomen_text = $_POST['abdomen_text'];
$extremities = $_POST['extremities'];
$extremities_text = $_POST['extremities_text'];
$neuro = $_POST['neuro'];
$neuro_text = $_POST['neuro_text'];
$pps = $_POST['pps'];
$gds = $_POST['gds'];
$mini_time = $_POST['mini_time'];
$mini_place = $_POST['mini_place'];
$mini_reg = $_POST['mini_reg'];
$mini_cal = $_POST['mini_cal'];
$mini_recall = $_POST['mini_recall'];
$mini_naming = $_POST['mini_naming'];
$mini_repetition = $_POST['mini_repetition'];
$mini_verbal = $_POST['mini_verbal'];
$mini_written = $_POST['mini_written'];
$mini_writing = $_POST['mini_writing'];
$mini_vis = $_POST['mini_vis'];
$mini_psycho = $_POST['mini_psycho'];
$mini_other = $_POST['mini_other'];
$summary_plan = $_POST['summary_plan'];
$summary_goal = $_POST['summary_goal'];
//$icd10_main = $_POST['icd10_main'];
//$icd10_problem = $_POST['icd10_problem'];
$suggestion = $_POST['suggestion'];
//$next_visit
    
    

    
    
    #update data
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sumSQL = "UPDATE summary SET summary_edit_status = '2',
        summary_status = '$summary_status',
        reason_cancel = '$reason_cancel',
        reason_visit = '$reason_visit',
        med ='$med',
        nutrition_status = '$nutrition_status';
        home_risk = '$home_risk';
        home_place = '$home_place';
        caregiver_burden = '$caregiver_burden',
        main_caregiver = '$main_caregiver',
        healthinsure = '$healthinsure',
        pre_drug = '$pre_drug',
        pre_drug_text='$pre_drug_text',
        non_drug='$non_drug',
        non_drug_text='$non_drug_text',
        diet_sup=  '$diet_sup',
        diet_sup_text= '$diet_sup_text',
        med_com= '$med_com',
        med_com_text = '$med_com_text',
        manage_assess='$manage_assess',
        manage_assess_text='$manage_assess_text',
        manage_pain='$manage_pain',
        manage_pain_text='$manage_pain_text' ,
        manage_med='$manage_med',
        manage_med_text='$manage_med_text',
        manage_procedure='$manage_procedure',
        manage_procedure_text='$manage_procedure_text',
        manage_fammeet='$manage_fammeet',
        manage_fammeet_text='$manage_fammeet_text',
        manage_social='$manage_social',
        manage_social_text='$manage_social_text',
        manage_psycho='$manage_psycho',
        manage_psycho_text='$manage_psycho_text',
        manage_rehab='$manage_rehab',
        manage_rehab_text='$manage_rehab_text',
        manage_choice='$manage_choice',
        manage_choice_text='$manage_choice_text',
        manage_dying='$manage_dying',
        manage_dying_text='$manage_dying_text',
        manage_other='$manage_other',
        manage_other_text='$manage_other_text',
        bio_problem='$bio_problem',
        bp='$bp',
        hr='$hr',
        rr='$rr',
        oxygen='$oxygen',
        heent='$heent',
        heent_text='$heent_text',
        heart='$heart',
        heart_text='$heart_text',
        lungs='$lungs',
        lungs_text='$lungs_text',
        abdomen='$abdomen',
        abdomen_text='$abdomen_text',
        extremities='$extremities',
        extremities_text='$extremities_text',
        neuro='$neuro',
        neuro_text='$neuro_text',
        pps='$pps',
        gds='$gds',
        mini_time= '$mini_time' ,
        mini_place='$mini_place' ,
        mini_reg='$mini_reg' ,
        mini_cal='$mini_cal' ,
        mini_recall='$mini_recall' ,
        mini_naming='$mini_naming' ,
        mini_repetition='$mini_repetition' ,
        mini_verbal='$mini_verbal',
        mini_written='$mini_written',
        mini_writing='$mini_writing',
        mini_vis='$mini_vis' ,
        mini_psycho='$mini_psycho',
        mini_other='$mini_other' ,
        summary_plan='$summary_plan',
        summary_goal='$summary_goal',

        suggestion = '$suggestion'
        
        
        
        
        
        
        
        
        WHERE calendar_id = '$calendar_id'";
    $conn->query($sumSQL);
    mysql_db_query($dbname, $sumSQL) or die (mysql_error());
    mysql_close();
    
    header("location: summary.php");
?>

    <head>
        <?php include "head.html"?>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php include "header.html"?>

                <main class="mdl-layout__content mdl-color--grey-100">
                    <div class="mdl-grid demo-content">

                        <!--breadcrumb-->
                        <ul class="uk-breadcrumb breadcrumb">
                            <li><a href="summary.php" class="uk-button-text"><i class="material-icons breadcrumb-icons">folder_shared</i> สรุปเยี่ยมบ้าน</a></li>
                            <li>เพิ่มสรุปเยี่ยมบ้าน</li>
                        </ul>

                        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                            <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col">
                                <div class="uk-text-center">
                                    <h4>กรุณารอสักครู่</h4>
                                    <div class="mdl-spinner mdl-js-spinner is-active"></div>
                                    <p>กำลังบันทึกสรุปเยี่ยมบ้านครั้งที่
                                        <?php echo $num_visit; ?> วันที่
                                            <?php echo $visit_date; ?>
                                    </p>
                                    ของ <span class="text-green"><?php echo $patient_name." (HN ".$patient_hn.")"; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.demo-content-->
                </main>
        </div>

        <!--custom js-->
        <script src="js/select.js"></script>
        <script src="js/stepper.js"></script>

    </body>

</html>
