<?php

require_once "../app/dao/threadDAO.php";

if(checkSession('user')){
    print json_encode($_SESSION['user']['user_name']);
}else{
    print json_encode("風吹けば名無し");
}
?>