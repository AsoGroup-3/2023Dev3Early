<?php
session_start();
require_once "../app/dao/ringDAO.php";
$dbm = new ring_main();

$thread_id = $_POST['thread_id'];
$ring_title = $_POST['ring_title'];
$ring_detail = $_POST['ring_detail'];
$invitation_user = $_POST['invitation_user'];
$res_num = $_POST['res_num'];
$create_date = $_POST['create_date'];

try {
    if (!checkSession('user')) {
        $userId = create_user_id();
        $userName = null;
        $_SESSION['user'] = [
            'user_id' => $userId,
            'user_name' => $userName,
        ];

        create_user($userId, $userName);
    }




    $create_user = $_SESSION['user']['user_id'];

    $dbm->create_ring($ring_title, $ring_detail, $create_user, $invitation_user, $res_num, $create_date, $thread_id);
} catch (Exception $e) {
    echo $e->getMessage();
}
