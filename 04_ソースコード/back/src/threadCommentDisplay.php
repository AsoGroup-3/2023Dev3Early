<?php
    require_once "./api/threadDAO.php";
    $dbm = new thread_main();

    try{
        $dbm->thread_comment_display(2);
        
    }catch(Exception $e){
        echo "エラー";
    }
?>