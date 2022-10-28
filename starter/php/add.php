<?php
 require "connect.php";

if(isset($_POST["title"]) && isset($_POST["type"])&& isset($_POST["status"]) ){
   $title=$_POST["title"];
   $type=$_POST["type"];
   $priority=$_POST["priority"];
   $status=$_POST["status"];
   if(isset($_POST["date"])){
    $date=$_POST["date"];
   }else{
    $date="";
   }
   $description=$_POST["description"];
}
$req=mysqli_query($link,"insert into task values ('','$date','$description','$title','$status','$type','$priority')");

if(isset($req)){
    header("Location: http://localhost/SCRUM-PROJECT/starter/index.php");
    die();
}