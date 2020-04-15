<?php 
    require_once('../../db.class.php');

    $user_id = $_GET['id'];
    $logged_id = $_SESSION['user_id'];

    $objDb = new db();
    $link = $objDb->connect_mysql();
    
    //date: DATE_FORMAT(g.date, '%d %b %Y %T') AS date or g.date for US time
    $sql = "SELECT DATE_FORMAT(g.date, '%d %b %Y %T') AS date, g.greet, g.id_user, g.id_greet, u.user, u.id FROM greets AS g ";
    $sql.= "JOIN users AS u ON (g.id_user = u.id) ";
    $sql.= "WHERE id_user = '$user_id' ";
    $sql.= "OR id_user IN (SELECT user_to_follow FROM `followers` WHERE user_id = '$user_id')";
    $sql.= "ORDER BY date ASC";

    $sqlName = "SELECT user FROM `users` WHERE id = $user_id";

    //query for greet counts
    $sqlCount = "SELECT COUNT(*) as qnt_greets FROM greets where id_user = $user_id";


    //query for followers
    $sqlFollowers = "SELECT COUNT(*) as qnt_followers FROM followers where user_to_follow = $user_id";
    $sqlFollowing = "SELECT COUNT(*) as qnt_following FROM followers where user_id = $user_id";
    
    //SELECT DATE_FORMAT(g.date, '%d %b %Y %T'), user_id AS date, g.greet, u.user FROM greets AS g JOIN users AS u ON (g.id_user = u.id) WHERE id_user = '$user_id' OR id_user IN (SELECT user_to_follow FROM `followers` WHERE user_id = '$user_id') ORDER BY date DESC
    
    $result_id = mysqli_query($link, $sql);
    $result_count = mysqli_query($link, $sqlCount);
    $result_followers = mysqli_query($link, $sqlFollowers);
    $result_following = mysqli_query($link, $sqlFollowing);
    $result_names = mysqli_query($link, $sqlName);
    
    $qnt_greets = 0;
    $qnt_followers = 0;
    $qnt_following = 0;
    $userName = 0;

    $registerQnt = mysqli_fetch_array($result_count, MYSQLI_ASSOC);
    $qnt_greets = $registerQnt['qnt_greets'];
    
    $registerFollowers = mysqli_fetch_array($result_followers, MYSQLI_ASSOC);
    $qnt_followers = $registerFollowers['qnt_followers'];

    $registerFollowing = mysqli_fetch_array($result_following, MYSQLI_ASSOC);
    $qnt_following = $registerFollowing['qnt_following'];

    $registerName = mysqli_fetch_array($result_names, MYSQLI_ASSOC);
    $userName = $registerName['user'];

    

    if (!$registerName['user']) {
        header('Location: ../home/index.php?error=3');
    }
    
    


    /*function getGreet($result_id) {
        if ($result_id) {
            while ($registerName = mysqli_fetch_array($result_id, MYSQLI_ASSOC)) {
                if ($registerName['id_user'] == $_GET['id']) {
                    echo '<div class="list-group-item">';
                    echo '<h4 class="list-group-item-heading">'
                            .'<a href="../profile/index.php?id='.$registerName['id'].'" class="user">'
                                .$registerName['user'].
                            '</a>'.'<small> - You - '.$registerName['date'].'</small>
                        </h4>';
                    echo '<p class="list-group-item-text">'.$registerName['greet'].'</p>';
                    echo '</div>';
                }
            }
        } else {
            echo 'Request error';
        }
    }
        
    $getGreet = 'getGreet';
    $getGreet = getGreet($result_id);*/
    
?>