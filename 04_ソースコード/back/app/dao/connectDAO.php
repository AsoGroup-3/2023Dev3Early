<?php
function dbconnect()
{
    $pdo = new PDO('mysql:host=localhost;dbname=rordb;charset=utf8', 'webuser', 'abccsd2');
<<<<<<< HEAD
=======
    
>>>>>>> f0d3496a07735a4f66ec46ad498b51706be99925
    return $pdo;
}
