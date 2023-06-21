<?php
    require_once "../app/dao/threadDAO.php";
    $dbm = new thread_main();

    try{
        $dbm->thread_comment_display(2);
        
    }catch(Exception $e){
        echo "エラー";
    }
