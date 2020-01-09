<?php 
    session_start();
    require('../validate-session.php');
    validateSession();

    require_once('../../db.class.php');
    
    $user_id = $_SESSION['user_id'];
    $user_to_unfollow = $_POST['user_to_unfollow_id'];

    if ($user_id == '' || $user_to_unfollow == '') {
        die();
    }

    $objDb = new db();
    $link = $objDb->connect_mysql();

    $sql = "DELETE FROM followers WHERE user_id = $user_id AND user_to_follow = $user_to_unfollow";

    mysqli_query($link, $sql);
?>