<?php 
$test = explode(" ",$_POST["search_doc"]);
//echo $test[0];
header("location:admin_edit.php?myuser=".$test[0]);
?>