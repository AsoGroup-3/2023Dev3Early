<?php
require_once "../app/dao/threadDAO.php";
$dbm = new thread_main();

    try{
        print_r($dbm->search_thread_get($_GET["key"]));
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
