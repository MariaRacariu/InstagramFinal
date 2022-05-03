<?php
require 'dbh.php'; //require connection script

//--------------- ADD COMMENTS --------------- \\
//run when form has been submitted - submit_comment == submit button
if (isset($_POST['submit_comment'])) {  
    //query dbh.php
    try {
        //connect to database
        $dsn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //get POST values from form once submitted
        $photosId = $_POST["photos_id"];
        $comments = $_POST["comment_section"];
        $user_id = $_POST["user_id"];
        
        //prepare and define sql, pdo variable from dbh.php
        $stmtAddComment = $pdo->prepare("INSERT INTO comments(photo_id, comment, user_id)
                                          VALUES (:photosId, :comments, :user_id)");

        //bind :photosId & :comments to POSTed variables above
        $stmtAddComment->bindParam(':photosId', $photosId);
        $stmtAddComment->bindParam(':comments', $comments);
        $stmtAddComment->bindParam(':user_id', $user_id);
        
        //run code
        if ($stmtAddComment->execute()) {
            //if code HAS ran: display alert to say it has
            echo '<script> alert("Comment Added."); </script>';
            //redirect once alert is clicked
            echo '<script> window.location.replace("index.php"); </script>';
        } else {
            //if code HASN'T ran: display alert to say it hasn't
            echo '<script> alert("Comment Failed"); </script>';
        }
    } catch (PDOException $e) {
        //if querying dbh.php fails - run

        //get error message
        $error = "Error: " . $e->getMessage();
        //display error message in frontend alert
        echo '<script type="text/javascript"> alert("' . $error . '"); </script>';
    }
}


//--------------- DELETE COMMENTS --------------- \\
if (isset($_POST["deleteButton"])) {
    //query dbh.php
    try {
        //connect to database
        $dsn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //if POSTed id is NOT empty
        if (!empty($_POST['commentId'])) {
            //trims value for characters
            $commentId = trim($_POST['commentId']);
        } else {
            //if value is empty, set to null for database entry
            $commentId = null;
        }

        //prepare and define sql, pdo variable from dbh.php
        $stmtDeleteComment = $pdo->prepare("UPDATE comments
                                            SET deleted=true
                                            WHERE comment_id=:commentsDeleted");

        //set :commentsDeleted to $commentId value
        $stmtDeleteComment->bindParam(':commentsDeleted', $commentId);

        //run code
        if ($stmtDeleteComment->execute()) {
            //if code HAS ran: display alert to say it has
            echo '<script> alert("Comment Deleted."); </script>';
            //redirect once alert is clicked
            echo '<script> window.location.replace("index.php"); </script>';
        } else {
            //if code HASN'T ran: display alert to say it hasn't
            echo '<script> alert("Comment Failed Deleting"); </script>';
        }
    } catch (PDOException $e) {
        //if querying dbh.php fails - run

        //get error message
        $error = "Error: " . $e->getMessage();
        //display error message in frontend alert
        echo '<script type="text/javascript"> alert("' . $error . '"); </script>';
    }
}