<?php
$host = 'localhost';
$db = 'instagramdatabase';
$user = 'root';
$password = 'root';
$dsn = '';

try {
    $dsn = 'mysql:host='.$host. ';db='.$db;
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    //echo "Connection succeeded!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
