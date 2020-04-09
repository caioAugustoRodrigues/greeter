<?php 
    session_start();
    require('../validate-session.php');
    validateSession();

    require_once('../../db.class.php');
    
    $user_id = $_SESSION['user_id'];
    $greet = $_POST['greet_id'];

    if ($user_id == '') {
        die();
    }

    $objDb = new db();
    $link = $objDb->connect_mysql();
    $sql = "DELETE FROM greets WHERE id_user = $user_id AND id_greet = '$greet'";

    mysqli_query($link, $sql);
?>