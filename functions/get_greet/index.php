<?php 
    session_start();
    require('../validate-session.php');
    validateSession();

    require_once('../../db.class.php');

    $user_id = $_SESSION['user_id'];

    $objDb = new db();
    $link = $objDb->connect_mysql();
    
    //date: DATE_FORMAT(g.date, '%d %b %Y %T') AS date or g.date for US time
    $sql = "SELECT DATE_FORMAT(g.date, '%d %b %Y %T') AS date, g.greet, u.user FROM greets AS g ";
    $sql.= "JOIN users AS u ON (g.id_user = u.id) ";
    $sql.= "WHERE id_user = $user_id ORDER BY date DESC";

    $result_id = mysqli_query($link, $sql);

    if ($result_id) {
        while ($register = mysqli_fetch_array($result_id, MYSQLI_ASSOC)) {
            echo '<a href="#" class="list-group-item">';
                echo '<h4 class="list-grou-item-heading">'.$register['user'].'<small> - '.$register['date'].'</small></h4>';
                echo '<p class="list-grou-item-text">'.$register['greet'].'</p>';
            echo '</a>';
        }

    } else {
        echo 'Request error';
    }
?>