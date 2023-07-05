<?php
    require_once "../app/dao/threadDAO.php";
    $dbm = new thread_main();

    try{
        $dbm->create_user_id();
        
    }catch(Exception $e){
        echo $e->getMessage();

    }
?>