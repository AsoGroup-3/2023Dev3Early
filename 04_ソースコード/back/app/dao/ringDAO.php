<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');
require_once 'connectDAO.php';
require_once 'versatility.php';
require_once 'userDAO.php';

class ring_main
{
    // リング登録メソッド
    function create_ring($ring_title, $ring_detail, $create_user, $invitation_user, $res_num, $create_date, $thread_id)
    {
        $pdo = dbconnect();
        $sql = 'INSERT INTO rings (ring_name, ring_detail, create_user, invitation_user, res_num, ring_create_date, thread_id)
                VALUES (?, ?, ?, ?, ?, ?, ?)';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $ring_title, PDO::PARAM_STR);
        $ps->bindValue(2, $ring_detail, PDO::PARAM_STR);
        $ps->bindValue(3, $create_user, PDO::PARAM_STR);
        $ps->bindValue(4, $invitation_user, PDO::PARAM_STR);
        $ps->bindValue(5, $res_num, PDO::PARAM_INT);
        $ps->bindValue(6, $create_date, PDO::PARAM_INT);
        $ps->bindValue(7, $thread_id, PDO::PARAM_INT);
        $ps->execute();
    }
}
