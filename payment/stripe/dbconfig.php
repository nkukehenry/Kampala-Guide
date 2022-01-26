<?php

include '../../admin/config.php';

$db = new mysqli($database['host'], $database['user'], $database['pass'], $database['db']);

//Display error if failed to connect
if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}

?>