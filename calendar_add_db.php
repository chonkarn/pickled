<?php 
session_start();
$patient = $_GET['patient'];
$dmy = $_GET['datepicker'];
if(isset($_GET['visit-time'])){
        $time = $_GET['visit-time'];
           }
$id = $_SESSION['id'];
echo $id;
$copied = array();
$copied = $_GET['doctor'];

//foreach ($copied as $selectedOption)
//    echo $selectedOption."\n";
$getpre = explode("-",$dmy);

$link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");

$q = "SELECT patient_visit_status,patient_visit_type,patient_doctor_owner FROM patientinfo WHERE patient_hn = '$patient'";
$r = mysqli_query($link,$q) or die(mysqli_error()."[".$q."]");
$ro = mysqli_fetch_array($r);
$status = $ro['patient_visit_status'];
$type = $ro['patient_visit_type'];
$patient_doctor_owner = $ro['patient_doctor_owner'];
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


// transaction management
//turn autocommit off
mysqli_autocommit($link, false);
//start transcation
mysqli_query($link, "START TRANSACTION");
$flag = true;
mysqli_query($link,"SET NAMES UTF8");
mysqli_query($link,"SET character_set_results=utf8");
mysqli_query($link,"SET character_set_client=utf8");
mysqli_query($link,"SET character_set_connection=utf8");
$add_app = "INSERT INTO calendar_info SET ";
$add_app = $add_app."Id_own_calen ='$id',dmy='$dmy',time_calen='$time',patient_hn='$patient',patient_visit_status='$status',patient_visit_type='$type',patient_doctor_owner='$patient_doctor_owner',sum_chk=0";
$result = mysqli_query($link, $add_app);
$app_id = mysqli_insert_id($link); //get autoincrement
// queries errores
if (!$result) {
	$flag = false;
    echo "Error details: " . mysqli_error($link) . ".";
}
// queries done, commit
if ($flag) {
    mysqli_commit($link);
    echo "All queries were executed successfully";
} else { //concurrency
	mysqli_rollback($link);
    echo "All queries were rolled back";
} 
mysqli_close($link);

// send request to member
$request="";
foreach ($copied as $selectedOption){
    $request = $request."INSERT INTO calendar_members_status (Id_app,Id_members) VALUES ('$app_id','$selectedOption');"; 
}
$link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");
    mysqli_query($link,"SET NAMES UTF8");
    mysqli_query($link,"SET character_set_results=utf8");
    mysqli_query($link,"SET character_set_client=utf8");
    mysqli_query($link,"SET character_set_connection=utf8");
    if (mysqli_multi_query($link,$request)){

        header( "location: calendar.php?month=".$getpre[1]."&year=".$getpre[0]);
    }
    else {
        echo "Error: " . $request . "<br>" . mysqli_error($link);
    } 
        
    

?>