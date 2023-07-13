<?php
require_once "../app/dao/threadDAO.php";
$dbm = new thread_main();

    try{
        echo $dbm->get_user_name("createTest");

        
    }catch(Exception $e){
        echo $e->getMessage();
    }
