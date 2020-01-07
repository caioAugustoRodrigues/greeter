<?php 
    session_start();
    require('../../functions/validate-session.php');
    validateSession();

    require_once('../../db.class.php');
    
    $greet_text = $_POST['greet_text'];
    $user_id = $_SESSION['user_id'];

    if ($greet_text == '' || $user_id == '') {
        die();
    }

    $objDb = new db();
    $link = $objDb->connect_mysql();

    $sql = "INSERT INTO greets(id_user, greet)values($user_id, '$greet_text')";

    mysqli_query($link, $sql);
?>