<?php

function checkLogin()
{
    if (!$_SESSION['user_id']) {
        header("Location: SignIn.php");
        session_destroy();
        exit();
    }
}
?>