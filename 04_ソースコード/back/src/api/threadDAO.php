<?php

//JSON形式で返却すること、文字形式がUTF-8だということの宣言

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');

class thread_main{
    //DB接続
    function dbconnect(){
        $pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'webuser','abccsd2');
        return $pdo;
    }

    //ユーザーIDからユーザー名取得
    function get_user_name($user_id){
        $pdo = $this->dbconnect();
        // 修正箇所
        $sql = 'SELECT user_name FROM users WHERE user_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_id, PDO::PARAM_STR);
        $ps->execute();
        $user_name = $ps->fetch();

        return $user_name;
    }

    //コメント表示機能
    function thread_comment_display($thread_id){
        $pdo = $this->dbconnect();
        $sql = 'SELECT * FROM thread_comments WHERE thread_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $thread_id, PDO::PARAM_INT);
        $ps->execute();
        $thread_comment = $ps->fetchAll();

        //配列の宣言（無いとエラーが発生した）
        $com_data = array();

        //データベースから持ってきたデータをforeachを利用してデータの数だけ$dataに追加している
        foreach ($thread_comment as $row) {

            $user_name = self::get_user_name($row['user_id']);

            array_push($com_data, array(
                'thread_comment_id' => $row['thread_comment_id'],
                'comment' => $row['comment'],
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

}

?>