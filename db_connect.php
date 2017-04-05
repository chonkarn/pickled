<?php  
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);         
   
mysql_connect("localhost","hvmsdb","1234") or die("Cannot connect the Server");    
mysql_select_db("homevisit") or die("Cannot select database");    
mysql_query("set character set utf8");    
?>