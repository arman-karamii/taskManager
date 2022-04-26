<?php

include "bootstrap/init.php";
use Hekmatinasser\Verta\Verta;
var_dump(Verta::now());
//connetct to db and get tasks
$tasks = getTasks();

include "tpl/tpl-index.php"

?>
