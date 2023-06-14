<?php

class thread{
    function get_pdo(){
        $pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'webuser','abccsd2');
        return $pdo;
    }

    function thread_comment_display(){
        
    }
}

?>