<?php
defined('BASE_PATH') or die("permision denied ! ");

/*** Folder Functions ***/
function deleteFolder($folder_id)
{
    global $pdo;
    $sql = "DELETE FROM folders WHERE id = $folder_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}
function addFolder($folder_name)
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "INSERT INTO folders (name,user_id) VALUES (:folder_name , :user_id);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':folder_name' => $folder_name, ':user_id' => $current_user_id]);
    return $pdo->lastInsertId();
}

function getFolders()
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "SELECT * FROM `folders` WHERE user_id = $current_user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

/*** Tasks Functions ***/

function deleteTask($task_id)
{
    global $pdo;
    $sql = "DELETE FROM tasks WHERE id = $task_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}
function addTask($taskTitle, $folderId)
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "INSERT INTO tasks (title,user_id,folder_id) VALUES (:title , :user_id , :folder_id);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title' => $taskTitle, ':user_id' => $current_user_id, ':folder_id' => $folderId]);
    return $pdo->lastInsertId();
}
function getTasks()
{
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;
    $folderCondition = '';
    if (isset($folder) and is_numeric($folder)) {
        $folderCondition = " AND folder_id = $folder ";
    }
    $current_user_id = getCurrentUserId();
    $sql = "SELECT * FROM `tasks` WHERE user_id = $current_user_id $folderCondition";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}
