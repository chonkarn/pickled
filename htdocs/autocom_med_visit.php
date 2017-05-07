<?php
@include('db_connect.php');  
$pagesize = 50; 
$table_db="tbuser"; 
$find_field="f_user";  
if($_GET['term']!=""){  
    $q = $_GET["term"];  
    $sql = "select * from $table_db    
    where  locate('$q', $find_field) > 0   
    order by locate('$q', $find_field), $find_field limit $pagesize";  
}else{  
    $sql = "select * from $table_db  where 1 limit $pagesize";        
}  
$qr=mysql_query($sql);  
$total=mysql_num_rows($qr);  
while($rs=mysql_fetch_array($qr)) {  
    $json_data[]=array(    
        "id"=>$rs['user'],    
        "label"=>$rs['f_user']." ".$rs['l_user'],    
        "value"=>$rs['f_user']." ".$rs['l_user'],    
    );      
}    
$json= json_encode($json_data);    
echo $json;    
mysql_close();    
exit;  
?> 