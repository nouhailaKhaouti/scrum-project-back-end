<?php
require "connect.php";


    $req=mysqli_query($link,"DELETE FROM task");

    if(!$req){
        echo "error";
    }else{
        header("Location: http://localhost/SCRUM-PROJECT-BACK-END/starter/index.php");
    }