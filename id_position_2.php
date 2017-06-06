<?php
    $qq = "SELECT * from tbuser_position ";
    
    $link = mysqli_connect("localhost", "hvmsdb", "1234", "homevisit");
    mysqli_query($link,"SET NAMES UTF8");
    mysqli_query($link,"SET character_set_results=utf8");
    mysqli_query($link,"SET character_set_client=utf8");
    mysqli_query($link,"SET character_set_connection=utf8");
    $show = mysqli_query($link,$qq);

    


    
?>

