<?php
session_start();
require_once "../app/dao/userDAO.php";
require_once "../app/dao/threadDAO.php";
$dbm_t = new thread_main();
$dbm_u = new user_main();

try{

    if (checkSession('user')) {
        $userData = $_SESSION['user'];
    
        if ($userData['user_name'] != null && $_POST['user_name'] == $dbm_u->get_user_name($userData['user_id'])) {
            $dbm_t->write_in_comment($userData['user_id'], $_POST["comment_detail"], $_POST["thread_id"]);
        } else {
            $dbm_u->update_user_name($userData['user_id'], $_POST['user_name']);
            $_SESSION['user']['user_name'] = $_POST['user_name'];
            $dbm_t->write_in_comment($userData['user_id'], $_POST["comment_detail"], $_POST["thread_id"]);
        }
    } else {
        $userId = create_user_id();
        $userName = $_POST['user_name'];
        $_SESSION['user'] = [
            'user_id' => $userId,
            'user_name' => $userName,
        ];
    
        $dbm_u->create_user($userId, $userName);
        $dbm_t->write_in_comment($userId, $_POST["comment_detail"], $_POST["thread_id"]);
    }
}catch(Exception $e){
    echo $e->getMessage();
}

?>