<?php
require 'dbh.php'; //require connection script

session_start();
session_destroy();

if (isset($_POST['submit'])) {
    $dsn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT user_id, username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $username);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user === false) {
        echo '<script>alert("invalid username or password")</script>';
    } else {
        $validPassword = password_verify($passwordAttempt, $user['password']);
        if ($validPassword) {
            session_start();
            $_SESSION['users'] = $username;
            $_SESSION['user_id'] = $user['user_id'];
            echo '<script>window.location.replace("index.php");</script>';
            exit;
        } else {
            //$validPassword was FALSE. Passwords do not match.
            echo '<script>alert("invalid username or password")</script>';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form class="zen" action="signin.php" method="post">     
    <div class="signup-row">  
        <div class="row-1">
            <input type="text" name="username" placeholder="Username">
        </div>             
        <div class="row-1">
            <input type="password" name="password" placeholder="Password">    
        </div>
        <div class="row-1">
            <button name="submit" type="submit">logga in</button>
        </div>  
    </div>
</form>
<a href="Signup.php">sign up hääääääääääääär</a>
</body>
</html>

