<?php

//JSON形式で返却すること、文字形式がUTF-8だということの宣言

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');

class thread_main{
    function dbconnect(){
        $pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'webuser','abccsd2');
        return $pdo;
    }

    function thread_comment_display(){
        $pdo = $this->dbconnect();
        $sql = 'SELECT * FROM thread_test';
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $thread_comment = $ps->fetchAll();

        //配列の宣言（無いとエラーが発生した）
        $com_data = array();

        //データベースから持ってきたデータをforeachを利用してデータの数だけ$dataに追加している
        foreach ($thread_comment as $row) {
            array_push($com_data, array(
                'thread_comment_id' => $row['thread_comment_id'],
                'comment' => $row['comment'],
                'create_at' => $row['create_at'],
                'user_id' => $row['user_id'],
                'thread_id' => $row['thread_id']
            ));
        }
        //arrayの中身をJSON形式に変換している
        $json_array = json_encode($com_data);

        print $json_array;
    }
}

?>