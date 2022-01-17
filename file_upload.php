<?php
require_once 'dbh.php';

if(isset($_POST['submit'])) {
    //run when form in upload.php is submitted

    //define variables for file upload
    $tmpFile = $_FILES['filename']['tmp_name'];
    $filename = $_FILES['filename']['name'];
    $target_directory = "user_image/";
    $target_file = $target_directory . $filename;

    //attempt file upload
    if(move_uploaded_file($tmpFile, $target_file)){
        //if file uploaded successfully : get variables for sql statement
        $caption = $_POST['caption'];
        session_start();
        $userId = $_SESSION['user_id']; 

        $sql = $pdo->prepare("INSERT INTO photos (URL, user_id, caption) VALUES (:URL, :user_id, :caption)");
        $sql->bindValue(':URL', $target_directory.$filename);
        $sql->bindValue(':user_id', $userId);
        $sql->bindValue(':caption', $caption);
        $sql->execute();
        //if code HAS ran: display alert to say it has
        echo '<script> alert("File Uploaded."); </script>';
        //redirect once alert is clicked
        echo '<script> window.location.replace("index.php"); </script>';
    }else {
        //Removed variable from top because echo'ed here
        echo 'Error: Failed to upload';
    }
}