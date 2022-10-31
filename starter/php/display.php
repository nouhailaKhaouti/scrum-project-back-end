<?php

require "connect.php";

$select="SELECT a.task_id , a.task_title ,a.task_description , a.task_date ,priority_label ,status.status_label ,type.type_label FROM task AS a JOIN priority ON priority.priority_id=a.priority_id JOIN type ON type.type_id=a.type_id JOIN status ON status.status_id=a.status_id";
$status = $link->query($select);

if(!$status){
    echo"error";
}

$select="SELECT * FROM type";
$type=$link->query($select);

$select="SELECT * FROM status";
$status=$link->query($select);

$select="SELECT * FROM priority";
$priority=$link->query($select);


// function getPriority($id){
//     $select="SELECT * FROM priority WHERE priority_id=$id";
//     $priority_label=$GLOBALS['link']->query($select);
//     while($row=$priority_label->fetch_object()){
//     echo "$row->priority_label.<tr>";
// }
// }

// function getTaskType($id){
//     $select="SELECT type_label FROM type WHERE type_id=$id";
//     $type_label=$GLOBALS['link']->query($select);
//     while($row=$type_label->fetch_object()){
//         echo "$row->type_label.<tr>";
//     }
// }
