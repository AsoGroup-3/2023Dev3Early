<?php
require_once "../app/dao/threadDAO.php";
$dbm = new thread_main();

$thread_title = $_POST['thread_title'];
$thread_detail = $_POST['thread_detail'];
$create_date = $_POST['create_date'];

try {
    $dbm->create_thread($thread_title, $thread_detail, $create_date);
    
} catch (Exception $e) {
    echo "エラー";
}
