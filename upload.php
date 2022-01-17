<?php 
include 'dbh.php';
require_once 'file_upload.php';

session_start();
$userId = $_SESSION['user_id']; 


// maria: this will never work as this code runs when the page is loaded, add img tag in html and send values back through file_upload.php
// $stmt = $pdo->prepare('SELECT * FROM photos WHERE user_id = :user_id');
// $stmt->bindValue('user_id', $userId);
// $stmt->execute();

// $results = $stmt->fetchAll(PDO::FETCH_CLASS);

// foreach ($results as $photos){
//     echo "<img class='picsInstaFeed' width='280' height='280' src='".$photos->URL."'>";
//     echo "<p>$photos->caption</p>";
// }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="filename">
            <label for="caption">Caption</label>
            <input type="text" name="caption">
            <button type="submit" name="submit">Upload</button>
        </form>
    </body>
</html>