<?php
require "connect.php";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["save"])) {
    print_r($_POST);
    if (isset($_POST["title"]) && isset($_POST["type"]) && isset($_POST["status"])) {
        $title = test_input($_POST["title"]);
        $type = test_input($_POST["type"]);
        $priority = test_input($_POST["priority"]);
        $status = test_input($_POST["status"]);
        if (isset($_POST["date"])) {
            $date = test_input($_POST["date"]);
        } else {
            $date = "";
        }
        $description = test_input($_POST["description"]);
    }
    $req = mysqli_query($link, "insert into task (task_id, task_title, status_id, type_id, priority_id, task_date, task_description) values ('','$title','$status','$type','$priority','$date','$description')");

    if ($req) {
        $_SESSION["message"] = "you successfuly added a new task";
        header("Location: http://localhost/SCRUM-PROJECT-BACK-END/starter/index.php");
        die();
    } else {
        echo "error";
    }
}
if (isset($_POST["update"])) {
    print_r($_POST);
    $id = test_input($_POST["id"]);
    if (isset($_POST["title"]) && isset($_POST["type"]) && isset($_POST["status"])) {
        $title = test_input($_POST["title"]);

        $type = test_input($_POST["type"]);
        $priority = test_input($_POST["priority"]);
        $status = test_input($_POST["status"]);
        if (isset($_POST["date"])) {
            $date = test_input($_POST["date"]);
        } else {
            $date = "";
        }
        $description = test_input($_POST["description"]);
    }

    $query = mysqli_query($link, "UPDATE task SET task_title='$title', status_id=$status, type_id=$type, priority_id=$priority, task_date='$date', task_description='$description' WHERE task_id=$id");

    if ($query) {
        $_SESSION["message"] = "you successfuly updated your task";
        header("Location: http://localhost/SCRUM-PROJECT-BACK-END/starter/index.php");
        die();
    } else {
        echo "error";
    }
}
