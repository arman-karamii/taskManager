<?php

include "bootstrap/init.php";

if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    $deletedCountFolders = deleteFolder($_GET['delete_folder']);
    // echo "$deletedCount folders successfully deleted ";
}
if (isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])) {
    $deletedCountTasks = deleteTask($_GET['delete_task']);
    // echo "$deletedCountTasks tasks successfully deleted ";
}
//connetct to db and get tasks
$folders = getFolders();
$tasks = getTasks();

// dd(getTasks());

include "tpl/tpl-index.php"

?>
