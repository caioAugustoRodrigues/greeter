<?php 
    session_start();
    require('../validate-session.php');
    validateSession();

    require_once('../../db.class.php');

    $user_id = $_SESSION['user_id'];

    $objDb = new db();
    $link = $objDb->connect_mysql();
    
    //date: DATE_FORMAT(g.date, '%d %b %Y %T') AS date or g.date for US time
    $sql = "SELECT DATE_FORMAT(g.date, '%d %b %Y %T') AS date, g.greet, g.id_user, g.id_greet, u.user, u.id FROM greets AS g ";
    $sql.= "JOIN users AS u ON (g.id_user = u.id) ";
    $sql.= "WHERE id_user = '$user_id' ";
    $sql.= "OR id_user IN (SELECT user_to_follow FROM `followers` WHERE user_id = '$user_id')";
    $sql.= "ORDER BY date DESC";

    //SELECT DATE_FORMAT(g.date, '%d %b %Y %T'), user_id AS date, g.greet, u.user FROM greets AS g JOIN users AS u ON (g.id_user = u.id) WHERE id_user = '$user_id' OR id_user IN (SELECT user_to_follow FROM `followers` WHERE user_id = '$user_id') ORDER BY date DESC

    $result_id = mysqli_query($link, $sql);

    if ($result_id) {
        while ($register = mysqli_fetch_array($result_id, MYSQLI_ASSOC)) {
            if ($register['id_user'] == $user_id) {
                echo '<div class="list-group-item">';
                echo '<h4 class="list-group-item-heading">'
                        .'<a href="../profile/index.php?id='.$register['id'].'" class="user">'
                            .$register['user'].
                        '</a>'.'<small> - You - '.$register['date'].'</small>
                    </h4>';
                echo '<p class="list-group-item-text">'.$register['greet'].'</p>';
                echo '
                        <button 
                            data-greet="'.$register['id_greet'].'"
                            id="btn-delete"
                            onclick="handleDelete()"
                        >
                            Delete
                        </button>
                ';
                echo '</div>';
            } else  {
                echo '<div class="list-group-item">';
                echo '<h4 class="list-group-item-heading">'.
                '<a href="../profile/index.php?id='.$register['id'].'">'.$register['user'].'</a>'
                .'<small> - '.$register['date'].'</small></h4>';
                echo '<p class="list-group-item-text">'.$register['greet'].'</p>';
                echo '</div>';
            }
        }

        

    } else {
        echo 'Request error';
    }
?>