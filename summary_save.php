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
    # STEP 1
    if(isset($_POST['summary_status'])){
        $summary_status = $_POST['summary_status'];
    }
    else {
        $summary_status = 0;
    }
    $reason_cancel = $_POST['reason_cancel'];
    $reason_visit = $_POST['reason_visit'];
    $med = $_POST['med'];

    # Basic activity
    if(isset($_POST['basic_act'])){
        $basic_act = $_POST['basic_act'];
    }
    if(isset($_POST['basic_act_dress'])){
        $basic_act_dress = $_POST['basic_act_dress'];
    }
    if(isset($_POST['basic_act_eat'])){
        $basic_act_eat = $_POST['basic_act_eat'];
    }
    if(isset($_POST['basic_act_ambu'])){
        $basic_act_ambu = $_POST['basic_act_ambu'];
    }
    if(isset($_POST['basic_act_toilet'])){
        $basic_act_toilet = $_POST['basic_act_toilet'];
    }
    if(isset($_POST['basic_act_hygine'])){
        $basic_act_hygine = $_POST['basic_act_hygine'];
    }

    # Instrument activity
    if(isset($_POST['instru_act'])){
        $instru_act = $_POST['instru_act'];
    }
    if(isset($_POST['instru_act_shop'])){
        $instru_act_shop = $_POST['instru_act_shop'];
    }
    if(isset($_POST['instru_act_house'])){
        $instru_act_house = $_POST['instru_act_house'];
    }
    if(isset($_POST['instru_act_med'])){
        $instru_act_med = $_POST['instru_act_med'];
    }
    if(isset($_POST['instru_act_fin'])){
        $instru_act_fin = $_POST['instru_act_fin'];
    }
    if(isset($_POST['instru_act_tech'])){
        $instru_act_tech = $_POST['instru_act_tech'];
    }
    
    # Nutrition
    if(isset($_POST['nutrition_status'])){
        $nutrition_status = $_POST['nutrition_status'];
    }
    else {
        $nutrition_status = 0;
    }
 
    # Home
    if(isset($_POST['home_risk'])){
        $home_risk = $_POST['home_risk'];
    }
    else {
        $home_risk = 0;
    }
    $home_place = $_POST['home_place'];
    if(isset($_POST['caregiver_burden'])){
        $caregiver_burden = $_POST['caregiver_burden'];
    }
    else {
        $caregiver_burden = 0;
    }
    $main_caregiver = $_POST['main_caregiver'];

    $healthinsure = $_POST['healthinsure'];
    
    # Medication
    $pre_drug = $_POST['pre_drug'];
    $pre_drug_text = $_POST['pre_drug_text'];
    $non_drug = $_POST['non_drug'];
    $non_drug_text = $_POST['non_drug_text'];
    $diet_sup = $_POST['diet_sup'];
    $diet_sup_text = $_POST['diet_sup_text'];
    $med_com = $_POST['med_com'];
    $med_com_text = $_POST['med_com_text'];
    
    # STEP 2
    $bio_problem = $_POST['bio_problem'];
    $bp1 = $_POST['bp1'];
    $bp2 = $_POST['bp2'];
    $hr = $_POST['hr'];
    $rr = $_POST['rr'];
    $oxygen = $_POST['oxygen'];
    
    if(isset($_POST['heent'])){
        $heent = $_POST['heent'];
    }
    else {
        $heent = 0;
    }
    $heent_text = $_POST['heent_text'];
    
    if(isset($_POST['heart'])){
        $heart = $_POST['heart'];
    }
    else {
        $heart = 0;
    }
    $heart_text = $_POST['heart_text'];
    
    if(isset($_POST['lungs'])){
        $lungs = $_POST['lungs'];
    }  
    else {
        $lungs = 0;
    }
    $lungs_text = $_POST['lungs_text'];
    
    if(isset($_POST['abdomen'])){
        $abdomen = $_POST['abdomen'];
    }
    else {
        $abdomen = 0;
    }
    $abdomen_text = $_POST['abdomen_text'];
    
    if(isset($_POST['extremities'])){
        $extremities = $_POST['extremities'];
    }
    else {
        $extremities =0;
    }
    $extremities_text = $_POST['extremities_text'];
    
    if(isset($_POST['neuro'])){
        $neuro = $_POST['neuro'];
    }
    else {
        $neuro = 0;
    }
    $neuro_text = $_POST['neuro_text'];
    
    $pps = $_POST['pps'];
    $gds = $_POST['gds'];

    $mini_cog = $_POST['mini_cog'];
    $mini_cube = $_POST['mini_cube'];
    $mini_clock = $_POST['mini_clock'];
    $mini_psycho = $_POST['mini_psycho'];
    $mini_other = $_POST['mini_other'];
    $summary_plan = $_POST['summary_plan'];
    $summary_goal = $_POST['summary_goal'];
    
    # STEP 3
//$icd10_main = $_POST['icd10_main'];
//$icd10_problem = $_POST['icd10_problem'];
    
    # Management
    if(isset($_POST['manage_assess'])){
        $manage_assess = $_POST['manage_assess'];
    }
    else {
        $manage_assess = 0;
    }
    $manage_assess_text	= $_POST['manage_assess_text'];
    
    if(isset($_POST['manage_pain'])){
        $manage_pain = $_POST['manage_pain'];
    }
    else {
        $manage_pain = 0;
    }
    $manage_pain_text = $_POST['manage_pain_text'];
    
    if(isset($_POST['manage_med'])){
        $manage_med = $_POST['manage_med'];
    }
    else {
        $manage_med = 0;
    }
    $manage_med_text = $_POST['manage_med_text'];
    
    if(isset($_POST['manage_procedure'])){
        $manage_procedure = $_POST['manage_procedure'];
    }
    else {
        $manage_procedure = 0;
    }
    $manage_procedure_text = $_POST['manage_procedure_text'];
    
    if(isset($_POST['manage_fammeet'])){
        $manage_fammeet = $_POST['manage_fammeet'];
    }
    else {
        $manage_fammeet = 0;
    }
    $manage_fammeet_text = $_POST['manage_fammeet_text'];
    
    if(isset($_POST['manage_social'])){
        $manage_social = $_POST['manage_social'];
    }
    else {
        $manage_social = 0;
    }
    $manage_social_text = $_POST['manage_social_text'];
    
    if(isset($_POST['manage_psycho'])){
        $manage_psycho = $_POST['manage_psycho'];
    }
    else {
        $manage_psycho = 0;
    }
    $manage_psycho_text = $_POST['manage_psycho_text'];
    
    if(isset($_POST['manage_rehab'])){
        $manage_rehab = $_POST['manage_rehab'];
    }
    else {
        $manage_rehab = 0;
    }
    $manage_rehab_text = $_POST['manage_rehab_text'];
    
    if(isset($_POST['manage_choice'])){
        $manage_choice = $_POST['manage_choice'];
    }
    else {
        $manage_choice = 0;
    }
    $manage_choice_text = $_POST['manage_choice_text'];
    
    if(isset($_POST['manage_dying'])){
        $manage_dying = $_POST['manage_dying'];
    }
    else {
        $manage_dying = 0;
    }
    $manage_dying_text = $_POST['manage_dying_text'];
    
    if(isset($_POST['manage_other'])){
        $manage_other = $_POST['manage_other'];
    }
    else {
        $manage_other = 0;
    }
    $manage_other_text = $_POST['manage_other_text'];
    
    $suggestion = $_POST['suggestion'];

    # UPDATE
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sumSQL = "UPDATE summary SET summary_edit_status = '2',
        summary_status = '$summary_status',
        reason_cancel = '$reason_cancel',
        reason_visit = '$reason_visit',
        med ='$med',
        
        basic_act='$basic_act',
        basic_act_dress='$basic_act_dress',
        basic_act_eat='$basic_act_eat',
        basic_act_ambu='$basic_act_ambu',
        basic_act_toilet='$basic_act_toilet',
        basic_act_hygine='$basic_act_hygine',
        
        instru_act='$instru_act',
        instru_act_shop='$instru_act_shop',
        instru_act_house='$instru_act_house',
        instru_act_med='$instru_act_med',
        instru_act_fin='$instru_act_fin',
        instru_act_tech='$instru_act_tech',
        
        nutrition_status = '$nutrition_status',
        
        home_risk = '$home_risk',
        home_place = '$home_place',
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
       
        bio_problem='$bio_problem',
        bp1='$bp1',
        bp2='$bp2',
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
        
        mini_cog='$mini_cog',
        mini_cube='$mini_cube',
        mini_clock='$mini_clock',
        mini_psycho='$mini_psycho',
        mini_other='$mini_other' ,
        summary_plan='$summary_plan',
        summary_goal='$summary_goal',

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
        
        suggestion = '$suggestion'

        WHERE calendar_id = '$calendar_id'";
    $conn->query($sumSQL);
    mysql_db_query($dbname, $sumSQL) or die (mysql_error());
    mysql_close();
    header("location: summary.php?cal=".$calendar_id);
?>

    