<?php

function display($taskStatus){
 global $link;

$select="SELECT a.task_id , a.task_title ,a.task_description , a.task_date ,a.priority_id, priority.priority_label ,a.status_id,status.status_label ,a.type_id,type.type_label FROM task AS a JOIN priority ON priority.priority_id=a.priority_id JOIN type ON type.type_id=a.type_id JOIN status ON status.status_id=a.status_id";
$status = $link->query($select);

if(!$status){
    echo"error";
}
$i = 1;
foreach ($status as $row) {

    $id = $row["task_id"];
    $title = $row["task_title"];
    $type = $row["type_label"];
    $type_id = $row["type_id"];
    $status = $row["status_label"];
    $status_id = $row["status_id"];
    $priority = $row["priority_label"];
    $priority_id = $row["priority_id"];
    $description = $row["task_description"];
    $date = $row["task_date"];
    if ($taskStatus=="To_Do" && $status == "To Do") {
        echo
        '<button class="card d-flex flex-row justify-content-around align-items-center border-bottom border-muted p-2 border rounded-2 mb-2 cart shadow-sm" >
    <div class="col-1">
          <i class="bi bi-question-circle fs-3"></i>
    </div>
    <div class="col-11 d-flex justify-content-around align-items-center">
        <div class=" col-9 card-body text-start">
        <div class="card-title fs-5 "><strong>' . $title . '</strong></div>
        <div class="card-subtitle mb-2 text-muted">#' . $i . 'created in ' . $date .
            '</div>
        <div class="card-text" title=" ' . $description . '">' . substr($description, 0, 20) . '...</div>
        <div class="update_task">
            <i class="bi bi-trash text-danger  me-1" onClick="deletement('.$id.')" ></i>
            <i class="bi bi-pen text-yellow me-1" task_id="'.$id.'" title="'. $title.'"  date="'.$date.'" description="'. $description.'" priority="'. $priority_id.'"  type="'. $type_id.'" status="'. $status_id.'"  onClick="editTask(event)"  ></i>
        </div>
    </div>
    <div class="col-3 d-flex flex-column align-content-center">
        <span class="btn  mb-1 text-white p-2 w-100 high">' . $priority . '
            </span>
        <span class="btn btn-white bg-white p-2 border text-black w-100 bug">' . $type . '
            </span>
    </div>
</div>
</button>';

        $i++;
    }else if($taskStatus=="In_Progress" && $status == "In Progress"){
        echo
        '<button class="card  d-flex flex-row justify-content-around align-items-center border-bottom border-muted p-2 border rounded-2 mb-2 cart shadow-sm">
    <div class="col-1">
    <i class="spinner-border spinner-border-sm text-green me-1"></i>
    </div>
    <div class="col-11 d-flex justify-content-around align-items-center">
        <div class=" col-9 card-body text-start">
        <div class="card-title fs-5 "><strong>' . $title . '</strong></div>
        <div class="card-subtitle mb-2 text-muted">#' . $i . 'created in ' . $date .
            '</div>
        <div class="card-text" title=" ' . $description . '">' . substr($description, 0, 20) . '...</div>
        <div>
        <i class="bi bi-trash text-danger  me-1" onClick="deletement('.$id.')" ></i>
        <i class="bi bi-pen text-yellow me-1" task_id="'.$id.'" title="'. $title.'"  date="'.$date.'" description="'. $description.'" priority="'. $priority_id.'"  type="'. $type_id.'" status="'. $status_id.'"  onClick="editTask(event)"  ></i>
        </div>
    </div>
    <div class="col-3 d-flex flex-column align-content-center">
        <span class="btn  mb-1 text-white p-2 w-100 high">' . $priority . '
            </span>
        <span class="btn btn-white bg-white p-2 border text-black w-100 bug">' . $type . '
            </span>
    </div>
</div>
</button>';
$i++;
    }else if($taskStatus=="Done" && $status == "Done"){
        echo
        '<button class="card  d-flex flex-row justify-content-around align-items-center border-bottom border-muted p-2 border rounded-2 mb-2 cart shadow-sm">
    <div class="col-1">
    <i class="bi bi-check2-square fs-3"></i>
    </div>
    <div class="col-11 d-flex justify-content-around align-items-center">
        <div class=" col-9 card-body text-start">
        <div class="card-title fs-5 "><strong>' . $title . '</strong></div>
        <div class="card-subtitle mb-2 text-muted">#' . $i . 'created in ' . $date .
            '</div>
        <div class="card-text" title=" ' . $description . '">' . substr($description, 0, 20) . '...</div>
        <div>
        <i class="bi bi-trash text-danger  me-1" onClick="deletement('.$id.')" ></i>
        <i class="bi bi-pen text-yellow me-1" task_id="'.$id.'" title="'. $title.'"  date="'.$date.'" description="'. $description.'" priority="'. $priority_id.'"  type="'. $type_id.'" status="'. $status_id.'"  onClick="editTask(event)"  ></i>
        </div>
    </div>
    <div class="col-3 d-flex flex-column align-content-center">
        <span class="btn  mb-1 text-white p-2 w-100 high">' . $priority . '
            </span>
        <span class="btn btn-white bg-white p-2 border text-black w-100 bug">' . $type . '
            </span>
    </div>
</div>
</button>';
$i++;
    }
}
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
