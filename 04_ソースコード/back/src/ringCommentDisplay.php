<?php
require_once "../app/dao/ringDAO.php";
$dbm = new ring_main();

try {
    $dbm->ring_comment_display(1);
} catch (Exception $e) {
    echo $e;
}
