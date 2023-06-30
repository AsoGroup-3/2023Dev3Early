<?php
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
function getHashedIpAddress() {
    $ipAddress = getIpAddress();
    $hashedIpAddress = hash('sha256', $ipAddress);
    return $hashedIpAddress;
}

// セッションの有無を true/falseで返却する関数
function checkSession() {
    session_start();

    // セッションの有無を確認
    $sessionExists = isset($_SESSION['session_key']);

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
?>