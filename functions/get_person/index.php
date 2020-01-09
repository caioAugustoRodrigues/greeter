<?php 
    session_start();
    require('../validate-session.php');
    validateSession();

    require_once('../../db.class.php');

    $user_name = $_POST['person'];
    $user_id = $_SESSION['user_id'];

    $objDb = new db();
    $link = $objDb->connect_mysql();
    
    $sql = "SELECT * from users WHERE user = '$user_name' and id != $user_id ";

    $result_id = mysqli_query($link, $sql);

    if ($result_id) {
        while ($register = mysqli_fetch_array($result_id, MYSQLI_ASSOC)) {
            echo '<a href="#" class="list-group-item">
                    <strong>Nome</strong> <small> - email</small>       
                </a>';
                
        }

    } else {
        echo 'Request error';
    }
?>