<?php
require_once "http://taketake0506.boo.jp/2023Dev3Early/back/app/dao/threadDAO.php";
$dbm = new thread_main();

try {
    $dbm->thread_get();
} catch (Exception $e) {
    echo "エラー";
}
