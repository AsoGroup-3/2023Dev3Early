<?php
    require_once "../app/dao/threadDAO.php";
    $dbm = new thread_main();

    try{
        $dbm->get_thread_name($_GET['thread_id']);
        
    }catch(Exception $e){
        echo $e->getMessage();

    }
?>