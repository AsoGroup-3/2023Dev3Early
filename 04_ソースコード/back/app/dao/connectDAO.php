<?php
function dbconnect()
{
    $pdo = new PDO('mysql:host=localhost;dbname=rordb;charset=utf8', 'user', 'abccsd2');
    return $pdo;
}
