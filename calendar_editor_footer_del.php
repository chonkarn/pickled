<?php 
$id_app = $_GET['id_app'];
$del = "DELETE FROM calendar_info WHERE Id_app=$id_app";
$del2 = "DELETE FROM calendar_members_status WHERE Id_app=$id_app";
// transaction management
//turn autocommit off
mysqli_autocommit($link, false);
//start transcation

$link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit") or die("ติดต่อไม่ได้");
mysqli_query($link, "START TRANSACTION");
$flag = true;
$result = mysqli_query($link,$del) or die(mysqli_error()."[".$del."]");
$result2 = mysqli_query($link,$del2) or die(mysqli_error()."[".$del2."]");
if (!$result && $result2) {
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
mysqli_autocommit($link, true);
header("location:calendar.php");
?>
