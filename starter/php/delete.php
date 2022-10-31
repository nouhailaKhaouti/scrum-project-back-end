<?php
require "connect.php";
$id=$_GET["id"];

$req=mysqli_query($link,"DELETE FROM task WHERE task_id=$id");

if(!$req){
    echo "error";
}else{
    header("Location: http://localhost/SCRUM-PROJECT-BACK-END/starter/index.php");
}

