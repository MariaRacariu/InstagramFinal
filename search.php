<?php
require 'dbh.php'; //linked to dbh, pdo variable already set, doesn't need to be repeated.

$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username` LIKE ?"); //removed email, why search email?
$stmt->execute(["%" . $_POST["search"] . "%"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { //ajax not set, are you trying to use ajax??
    echo json_encode($results);
}
