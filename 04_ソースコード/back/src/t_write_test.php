<?php
    require_once "../app/dao/threadDAO.php";
    $dbm = new thread_main();

    try{
        $dbm->write_in_comment("test_user_2","テストです",2);
        echo "接続は成功";

        
    }catch(Exception $e){
        echo $e->getMessage();

    }
?>