<?php

session_start();

require_once 'dbh.php';
$userId = $_SESSION['user_id']; 

$errMessage = '';


if(isset($_POST['submit']))
{
    if(move_uploaded_file($tmpFile, $target_file)){
        $content = $_POST['caption'];
        $filename = $_FILES['filename']['name'];
        $target_directory = "user_image/";
        $tmpFile = $_FILES['filename']['tmp_name'];
        $target_file = $target_directory . $filename;
        $sql = $pdo->prepare("INSERT INTO photos (URL, user_id, caption) VALUES (:URL, :user_id, :caption)");
        $sql->bindValue(':URL', $target_directory.$filename);
        $sql->bindValue(':user_id', $userId);
        $sql->bindValue(':caption', $content);
        $sql->execute();
        echo 'Uploaded file valid';
    }else {
        $errMessage = 'No file';
    echo $errMessage;
    }


}