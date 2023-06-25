<?php
require_once "../app/dao/threadDAO.php";
$dbm = new thread_main();

    try{
        $dbm->thread_comment_display($_GET['thread_id']);
        
    }catch(Exception $e){
        echo "エラー";
    }
