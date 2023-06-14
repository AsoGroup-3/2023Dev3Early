<?php
    require_once "./api/threadDAO.php";
    $dbm = new thread_main();

    try{
        $dbm->thread_comment_display();
        
    }catch(Exception $e){

    }
?>