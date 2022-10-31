<?php
 require "connect.php";

 
if(isset($_POST["save"])){
    print_r($_POST);
if(isset($_POST["title"]) && isset($_POST["type"]) && isset($_POST["status"]) ){
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
$req=mysqli_query($link,"insert into task (task_id, task_title, status_id, type_id, priority_id, task_date, task_description) values ('','$title','$status','$type','$priority','$date','$description')");

if($req){
    header("Location: http://localhost/SCRUM-PROJECT-BACK-END/starter/index.php");
    die();
}else{
    echo "error";
}
}
if(isset($_POST["update"])){
    if(isset($_POST["title"]) && isset($_POST["type"]) && isset($_POST["status"]) ){
       $title=$_POST["title"];
       $id=$_POST["id"];
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
    $query=mysqli_query($link,"UPDATE task SET task_title='$title', status_id=$status, type_id=$type, priority_id=$priority, task_date='$date', task_description='$description' WHERE task_id=$id");
    
    if($query){
        header("Location: http://localhost/SCRUM-PROJECT-BACK-END/starter/index.php");
        die();
    }else{
        echo "error";
    }
    }
