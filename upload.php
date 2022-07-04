<?php 
session_start();

include 'dbh.php';
require_once 'file_upload.php';
require "checksLogin.php";


checkLogin();

$userId = $_SESSION['user_id'];
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