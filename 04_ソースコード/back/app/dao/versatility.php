<?php

//ユーザーID作成
function create_user_id() {
    $ipAddress = getIpAddress().date('Y/m/d');
    $user_id = hash('sha256', $ipAddress);
    
    return $user_id;
}

// IPアドレスを取得する関数
function getIpAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // プロキシを経由している場合
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // ロードバランサやプロキシを経由している場合
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // 直接接続している場合
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

//IPアドレスをハッシュ化して返す関数
// function create_user_id() {
//     $ipAddress = getIpAddress().date('Y/m/d');
//     $user_id = hash('sha256', $ipAddress);
//     return $user_id;
// }

// セッションの有無を true/falseで返却する関数
function checkSession($session_key) {
    session_start();

    // セッションの有無を確認
    $sessionExists = isset($_SESSION[$session_key]);

    // 結果を返す
    return $sessionExists;
}

// 取得した日付と現在の日付を比較する関数
function isOneDayBefore($date) {
    $previousDate = date('Y-m-d', strtotime('-1 day'));

    if ($date === $previousDate) {
        return true;
    } else {
        return false;
    }
}

//スレッド作成から現在までの経過日数を取得
function getDateDiff($date1, $date2) {
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $diff = $datetime2->diff($datetime1);
    $diffInDays = $diff->days + ($diff->h / 24) + ($diff->i / 1440) + ($diff->s / 86400);
    return round($diffInDays, 1);;
}
?>