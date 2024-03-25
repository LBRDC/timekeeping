<?php
    session_start();
    /* Check Session */
    // check if there is an existing session
    if (isset($_SESSION['user_id'])) {
        // if there is an existing session, redirect to dashboard
        header("Location: home.php");
        exit();
    } else {
        // if there is no existing session, redirect to login page
        include("login.php");
        exit();
    }