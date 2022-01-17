<?php
$host = 'localhost';
$db = 'instagramdatabase';
$user = 'root';
$password = '';
$dsn = '';

try {
    $dsn = 'mysql:host='.$host. ';db='.$db;

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    echo "Woho!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username` LIKE ? OR `email` LIKE ?");
$stmt->execute(["%".$_POST["search"]."%", "%".$_POST["search"]."%"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
