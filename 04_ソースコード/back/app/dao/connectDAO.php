<?php
function dbconnect()
{
    $pdo = new PDO('mysql:host=localhost;dbname=LAA1418145-rordb;charset=utf8', 'LAA1418145', 'teamror');

    return $pdo;
}
