<?php
    require_once "../app/dao/threadDAO.php";
    $dbm = new thread_main();

    try{
        $dbm->thread_get();
        
    }catch(Exception $e){
        echo "エラー";
    }
?>