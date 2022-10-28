<?php

$select = "SELECT * FROM task where status_id=(select status_id from status where status_label='To Do')";
$to_do = $link->query($select);

$select = "SELECT * FROM task where status_id=(select status_id from status where status_label='In Progress')";
$in_progress = $link->query($select);

$select = "SELECT * FROM task where status_id=(select status_id from status where status_label='Done')";
$done = $link->query($select);

$select="SELECT * FROM type";
$type=$link->query($select);

$select="SELECT * FROM status";
$status=$link->query($select);


$select="SELECT * FROM priority";
$priority=$link->query($select);


function getPriority($id){
    $select="SELECT * FROM priority WHERE priority_id=$id";
    $priority_label=$GLOBALS['link']->query($select);
    while($row=$priority_label->fetch_object()){
    echo "$row->priority_label.<tr>";
}
}

function getTaskType($id){
    $select="SELECT type_label FROM type WHERE type_id=$id";
    $type_label=$GLOBALS['link']->query($select);
    while($row=$type_label->fetch_object()){
        echo "$row->type_label.<tr>";
    }
}
