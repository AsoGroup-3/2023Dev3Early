<?php

//JSON形式で返却すること、文字形式がUTF-8だということの宣言

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');
require 'connectDAO.php';

class thread_main
{

    //ユーザーIDからユーザー名取得
    function get_user_name($user_id)
    {
        $pdo = dbconnect();
        // 修正箇所
        $sql = 'SELECT user_name FROM users WHERE user_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_id, PDO::PARAM_STR);
        $ps->execute();
        $user_name = $ps->fetch();

        return $user_name[0];
    }

    //コメント表示機能
    function thread_comment_display($thread_id)
    {
        $pdo = dbconnect();
        $sql = 'SELECT * FROM thread_comments WHERE thread_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $thread_id, PDO::PARAM_INT);
        $ps->execute();
        $thread_comment = $ps->fetchAll();

        //配列の宣言（無いとエラーが発生した）
        $com_data = array();

        //データベースから持ってきたデータをforeachを利用してデータの数だけ$com_dataに追加している
        foreach ($thread_comment as $row) {

            $user_name = $this->get_user_name($row['user_id']);

            array_push($com_data, array(
                'thread_comment_id' => $row['thread_comment_id'],
                'comment' => $row['comments'],
                'create_at' => $row['create_at'],
                'user_id' => $row['user_id'],
                'user_name' => $user_name,
                'thread_id' => $row['thread_id']
            ));
        }
        //arrayの中身をJSON形式に変換している
        $json_array = json_encode($com_data);

        print $json_array;
    }

    //スレッド取得昨日
    function thread_get()
    {
        $pdo = dbconnect();
        $sql = 'SELECT * FROM threads LIMIT 8';
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $thread = $ps->fetchAll();

        $thread_data = array();

        //データベースから持ってきたデータをforeachを利用してデータの数だけ$thr_dataに追加している
        foreach ($thread as $row) {

            array_push($thread_data, array(
                'thread_id' => $row['thread_id'],
                'thread_name' => $row['thread_name'],
                'thread_bytes' => $row['thread_bytes'],
                'thread_url' => 'http://localhost/2023Dev3Early/04_%E3%82%BD%E3%83%BC%E3%82%B9%E3%82%B3%E3%83%BC%E3%83%89/front/src/threadMain.html' . '?thread_id=' . $row['thread_id'],
            ));
        }
        //arrayの中身をJSON形式に変換している
        $json_array = json_encode($thread_data);

        print $json_array;
    }

    function get_thread_name($thread_id)
    {
        $pdo = dbconnect();
        $sql = 'SELECT thread_name FROM threads WHERE thread_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $thread_id, PDO::PARAM_INT);
        $ps->execute();
        $thread_name = $ps->fetch();

        print json_encode($thread_name[0]);
    }
}
