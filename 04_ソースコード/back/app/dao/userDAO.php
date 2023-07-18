<?php

//JSON形式で返却すること、文字形式がUTF-8だということの宣言

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');
require_once 'connectDAO.php';
require_once 'versatility.php';

    //ユーザー名登録
    function create_user($user_id,$user_name){
        $pdo = dbconnect();
        $sql = 'INSERT INTO users VALUE(?,?,?)';
        $ps = $pdo->prepare($sql);

        if($user_name==""){
            $user_name="風吹けば名無し";
        }
        $ps->bindValue(1, $user_id, PDO::PARAM_STR);
        $ps->bindValue(2, $user_name, PDO::PARAM_STR);
        $ps->bindValue(3, date("Y/m/d H:i:s"), PDO::PARAM_STR);

        $ps->execute();
    }

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

        $user_name = $user_name["user_name"];
        return $user_name;
    }

    //ユーザー名更新
    function update_user_name($user_id,$user_name){
        $pdo = dbconnect();
        $sql = 'UPDATE users SET user_name = ? WHERE user_id = ?';
        $ps = $pdo->prepare($sql);

        $ps->bindValue(1, $user_name, PDO::PARAM_STR);
        $ps->bindValue(2, $user_id, PDO::PARAM_STR);

        $ps->execute();
    }

    //セッションで保持しているIDの作成日が一日経過しているかを確認
    function update_user_id($user_id){
        $pdo = dbconnect();
        $sql = 'SELECT create_at FROM users WHERE user_id = ?';
        $ps = $pdo->prepare($sql);

        $ps->bindValue(1, $user_id, PDO::PARAM_STR);

        $ps->execute();

        $user_create_day = $ps->fetch();

        return checkSession($user_create_day["create_at"]);
    }

    //指定したuser_idが存在するかどうかをチェックする
    function user_id_checker($user_id){
        $pdo = dbconnect();
        $sql = 'SELECT user_id FROM users WHERE user_id = ?';
        $ps = $pdo->prepare($sql);

        $ps->bindValue(1, $user_id, PDO::PARAM_STR);

        $ps->execute();

        $check_result = $ps->fetch();

        if(count($check_result) === 0){
            return true;
        }else{
            return false;
        }
    }
?>