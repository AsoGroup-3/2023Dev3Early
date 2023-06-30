<?php
require_once "../app/dao/threadDAO.php";
$dbm = new thread_main();

$thread_title = $_POST['thread_title'];
$thread_detail = $_POST['thread_detail'];

try {
    $dbm->create_thread($thread_title, $thread_detail);
} catch (Exception $e) {
    echo "エラー";
}
