<?php
session_start();
require_once "../app/dao/threadDAO.php";
$dbm = new thread_main();

if(1==2){
    echo json_encode($_SESSION['user']['user_name']);
}else{
    echo json_encode("風吹けば名無し");
}
?>