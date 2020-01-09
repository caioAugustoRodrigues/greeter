<?php 
    session_start();
    require('../validate-session.php');
    validateSession();

    require_once('../../db.class.php');
    
    $user_id = $_SESSION['user_id'];
    $user_to_follow = $_POST['user_to_follow_id'];

    if ($user_id == '' || $user_to_follow == '') {
        die();
    }

    $objDb = new db();
    $link = $objDb->connect_mysql();

    $sql = "INSERT INTO followers(user_id, user_to_follow)values($user_id, $user_to_follow)";

    mysqli_query($link, $sql);
?>