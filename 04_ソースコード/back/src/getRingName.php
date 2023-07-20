<?php
require_once "../app/dao/ringDAO.php";
$dbm = new ring_main();

try {
    $dbm->get_ring_name_to_thread_id($_GET['thread_id']);
} catch (Exception $e) {
    echo $e->getMessage();
}
