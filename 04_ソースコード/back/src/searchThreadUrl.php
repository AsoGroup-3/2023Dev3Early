<?php
    require_once "../app/dao/threadDAO.php";
    $dbm = new thread_main();

    try{
        $dbm->search_thread_get($_GET['keyword']);
        
    }catch(Exception $e){
        echo "エラー";
    }
?>