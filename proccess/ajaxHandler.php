<?php

include_once "../bootstrap/init.php";

if (!isAjaxRequest()) {
    diePage("Invalid Request!");
}

if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("Invalid Action!");
}

switch ($_POST['action']) {
    case "addFolder":
        if (!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3) {
            echo "Folder name must contain more than 2 character ";
            die();
        }
        echo addFolder($_POST['folderName']);
        break;
    case "addTask":
        $taskTitle = $_POST['taskTitle'];
        $folderId = $_POST['folderId'];
        if (!isset($folderId) || empty($folderId)) {
            echo "please choose a folder first ";
            die();
        }
        if (!isset($taskTitle) || strlen($taskTitle) < 3) {
            echo "Task title must contain more than 2 character ";
            die();
        }
        echo addTask($taskTitle, $folderId);
        break;

    default:
        diePage("Invalid Action");
        break;
}
