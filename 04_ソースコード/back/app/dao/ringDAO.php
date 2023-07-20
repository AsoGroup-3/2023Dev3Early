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
        $sql = 'INSERT INTO rings (ring_name, ring_detail, create_user, invitation_user, res_num, create_date, thread_id)
                VALUES (?, ?, ?, ?, ?, ?, ?)';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $ring_title, PDO::PARAM_STR);
        $ps->bindValue(2, $ring_detail, PDO::PARAM_STR);
        $ps->bindValue(3, $create_user, PDO::PARAM_STR);
        $ps->bindValue(4, $invitation_user, PDO::PARAM_STR);
        $ps->bindValue(5, $res_num, PDO::PARAM_INT);
        $ps->bindValue(6, $create_date, PDO::PARAM_STR);
        $ps->bindValue(7, $thread_id, PDO::PARAM_INT);
        $ps->execute();
    }

    function ring_comment_display($thread_id)
    {
        $pdo = dbconnect();
        $sql = 'SELECT * 
                FROM ring_comments as RC
                INNER JOIN rings as RG
                ON RC.ring_id = RG.ring_id
                WHERE RG.thread_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $thread_id, PDO::PARAM_INT);
        $ps->execute();
        $ring_comments = $ps->fetchAll();

        // var_dump($ring_comments);

        // 配列の宣言（無いとエラーが発生した）
        $com_data = array();

        // データベースから取得したデータをforeachを利用して$com_dataに挿入
        foreach ($ring_comments as $row) {
            array_push($com_data, array(
                'ring_comment_id' => $row['ring_comment_id'],
                'comment' => $row['ring_comment'],
                'create_at' => $row['create_date'],
                'user_id' => $row['user_id'],
                'user_name' => get_user_name($row['user_id']),
                'ring_id' => $row['ring_id'],
            ));
        }

        $json_array = json_encode($com_data);

        print $json_array;
    }

    function get_ring_name_to_thread_id($thread_id)
    {
        $pdo = dbconnect();
        $sql = 'SELECT ring_name FROM rings WHERE thread_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $thread_id, PDO::PARAM_INT);
        $ps->execute();
        $ring_name = $ps->fetch();

        print json_encode($ring_name[0]);
    }
}
