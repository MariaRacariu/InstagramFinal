<?php 
require "dbh.php";
require "checksLogin.php";

$dsn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
$dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

checkLogin();

//--------------- SELECT Users --------------- \\
//pdo prepare sql string to select users from users table
$stmtFetchUsers = $pdo->prepare("SELECT username FROM users");

//run sql string after prepare
$stmtFetchUsers->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=, initial-scale=1.0" />

    <title>Instagräm followers</title>
</head>

<body>
<?php 
include "navbar.php";
?>

<section class="main">
<?php
while ($rowUsers = $stmtFetchUsers->fetch()) {
    $username = $rowUsers['username'];
    ?>
    <div class="wrapper">
        <div class="post">
        <p><?= $username; ?></p>
        <button type="button">Follow</button>
        </div>
    </div>
<?php 
} ?>
</section>
</body>
</html>