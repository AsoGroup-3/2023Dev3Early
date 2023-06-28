<?php
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

$ipAddress = getIpAddress();
echo $ipAddress;
?>