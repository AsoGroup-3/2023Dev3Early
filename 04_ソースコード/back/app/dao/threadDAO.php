<?php

//JSON形式で返却すること、文字形式がUTF-8だということの宣言

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');
require_once 'connectDAO.php';
require_once 'userDAO.php';
require_once 'versatility.php';

class thread_main
{
    // スレッド登録メソッド
    function create_thread($thread_title, $thread_detail, $create_date)
    {
        $pdo = dbconnect();
        $sql = 'INSERT INTO threads (thread_name, thread_detail, thread_create_date)
                VALUES (?, ?, ?)';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $thread_title, PDO::PARAM_STR);
        $ps->bindValue(2, $thread_detail, PDO::PARAM_STR);
        $ps->bindValue(3, $create_date, PDO::PARAM_STR);
        $ps->execute();

        $id = $pdo->lastInsertId();
        print json_encode($id);
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
            array_push($com_data, array(
                'thread_comment_id' => $row['thread_comment_id'],
                'comment' => $row['comments'],
                'create_at' => $row['create_at'],
                'user_id' => $row['user_id'],
                'user_name' => $row['user_name'],
                'thread_id' => $row['thread_id']
            ));
        }
        //arrayの中身をJSON形式に変換している
        $json_array = json_encode($com_data);

        print $json_array;
    }

    //スレッド取得機能
    function thread_get()
    {
        $pdo = dbconnect();
        $sql = 'SELECT * FROM threads LIMIT 8';
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $thread = $ps->fetchAll();

        $thread_data = array();

        $currentDateTime = date('Y-m-d H:i:s');

        //データベースから持ってきたデータをforeachを利用してデータの数だけ$thr_dataに追加している
        foreach ($thread as $row) {

            array_push($thread_data, array(
                'thread_id' => $row['thread_id'],
                'thread_name' => $row['thread_name'],
                'thread_bytes' => $row['thread_bytes'],
                'thread_create_date' => $row['thread_create_date'],
                'created_date_time' => getDateDiff($currentDateTime, $row['thread_create_date']),
                'thread_url' => 'http://taketake0506.boo.jp/2023Dev3Early//front/src/threadMain.php' . '?thread_id=' . $row['thread_id'],
            ));
        }
        //arrayの中身をJSON形式に変換している
        $json_array = json_encode($thread_data);

        print $json_array;
    }

    //スレッドIDからスレッド名を取得
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

    // 書き込み機能
    function write_in_comment($user_id, $comment_detail, $thread_id)
    {
        $pdo = dbconnect();
        $sql = 'INSERT INTO thread_comments VALUE(null,?,?,?,?,?)';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $comment_detail, PDO::PARAM_STR);
        $ps->bindValue(2, date("Y/m/d H:i:s"), PDO::PARAM_STR);
        $ps->bindValue(3, $user_id, PDO::PARAM_STR);
        $ps->bindValue(4, get_user_name($user_id), PDO::PARAM_STR);
        $ps->bindValue(5, $thread_id, PDO::PARAM_INT);

        $ps->execute();
    }

    //スレッド検索・取得機能
    function search_thread_get($keyword)
    {
        $pdo = dbconnect();
        $sql = 'SELECT * FROM threads WHERE thread_name LIKE ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, '%' . $keyword . '%', PDO::PARAM_STR);
        $ps->execute();
        $thread = $ps->fetchAll();

        $thread_data = array();

        $currentDateTime = date('Y-m-d H:i:s');

        //データベースから持ってきたデータをforeachを利用してデータの数だけ$thr_dataに追加している
        foreach ($thread as $row) {

            array_push($thread_data, array(
                'thread_id' => $row['thread_id'],
                'thread_name' => $row['thread_name'],
                'thread_bytes' => $row['thread_bytes'],
                'thread_create_date' => $row['thread_create_date'],
                'created_date_time' => getDateDiff($currentDateTime, $row['thread_create_date']),
                'thread_url' => 'http://taketake0506.boo.jp/2023Dev3Early//front/src/threadMain.php' . '?thread_id=' . $row['thread_id'],
                'thread_count' => $this->count_thread($row['thread_id']),
            ));
        }
        //arrayの中身をJSON形式に変換している
        $json_array = json_encode($thread_data);

        print $json_array;
    }

    // スレッド件数取得
    function count_thread($thread_id)
    {
        $pdo = dbconnect();
        $sql = 'SELECT COUNT(*) FROM thread_comments WHERE thread_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $thread_id, PDO::PARAM_INT);
        $ps->execute();
        $thread_count = $ps->fetch();

        return $thread_count[0];
    }
}
