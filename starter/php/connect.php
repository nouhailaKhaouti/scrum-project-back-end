<?php  
session_start();

$typeErr = $titleErr = $statusErr = "";
    $link=mysqli_connect("localhost","root","","scrumboard");

    if($link===false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
       
    }else{ 
        echo "database is connected". mysqli_get_host_info($link);
    }
