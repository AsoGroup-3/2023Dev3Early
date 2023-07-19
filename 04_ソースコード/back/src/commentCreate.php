<?php
session_start();
require_once "../app/dao/threadDAO.php";
$dbm = new thread_main();

try{

    if (checkSession('user')) {
        $userData = $_SESSION['user'];
    
        if ($userData['user_name'] != null && $_POST['user_name'] == get_user_name($userData['user_id']) || $_POST['user_name'] == "") {
            $dbm->write_in_comment($userData['user_id'], $_POST["comment_detail"], $_POST["thread_id"]);
        } else {
            update_user_name($userData['user_id'], $_POST['user_name']);
            $_SESSION['user']['user_name'] = $_POST['user_name'];
            $dbm->write_in_comment($userData['user_id'], $_POST["comment_detail"], $_POST["thread_id"]);
        }
    } else {
        $userId = create_user_id();
        $userName = $_POST['user_name'];

        if($userName == ""){ $userName = "風吹けば名無し"; }

        $_SESSION['user'] = [
            'user_id' => $userId,
            'user_name' => $userName,
        ];
    
        if(user_id_checker($userId)){
            create_user($userId, $userName);
            $dbm->write_in_comment($userId, $_POST["comment_detail"], $_POST["thread_id"]);
        }else{
            $dbm->write_in_comment($userId, $_POST["comment_detail"], $_POST["thread_id"]);
        }
            // create_user($userId, $userName);
            // $dbm->write_in_comment($userId, $_POST["comment_detail"], $_POST["thread_id"]);
    }
}catch(Exception $e){
    echo $e->getMessage();
}

?>