<?php
    session_start();
    require('../validate-session.php');
    validateSession();

    require_once('../../db.class.php');

    $user_id = $_SESSION['user_id'];

    $objDb = new db();
    $link = $objDb->connect_mysql();

    $sql = "SELECT COUNT(*) as qnt_followers FROM followers where user_to_follow = $user_id";
    $result_id = mysqli_query($link, $sql);

    $qnt_followers = 0;

    if ($result_id) {
        $register = mysqli_fetch_array($result_id, MYSQLI_ASSOC);
        $qnt_followers = $register['qnt_followers'];

        echo '<h4>FOLLOWERS</h1>';
        echo '<p>'.$qnt_followers.'</p>';
    } else {
        echo 'Error on fetching user id';
    }
?>