<?php
function dbconnect()
{
    $pdo = new PDO('mysql:host=mysql217.phy.lolipop.lan;dbname=LAA1418145-rordb;charset=utf8', 'LAA1418145', 'tesmror');

    return $pdo;
}
