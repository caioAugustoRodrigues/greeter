<?php 
    session_start();
    require('../validate-session.php');
    validateSession();

    require_once('../../db.class.php');

    $searched_user = $_POST['person']; //field from search form in pages/search
    $user_id = $_SESSION['user_id'];

    $objDb = new db();
    $link = $objDb->connect_mysql();
    
    //% before and after search input variable means that it will look for what was searched, and it might have any number of chars before and after the searched text.
    $sql = "SELECT u.*, f.* from users as u
            LEFT JOIN followers as f on (f.user_id = 8 AND u.id = f.user_to_follow)
            WHERE u.user like '%$searched_user%'";

    $result_id = mysqli_query($link, $sql);

    if ($result_id) {
        while ($register = mysqli_fetch_array($result_id, MYSQLI_ASSOC)) {
        $is_following = isset($register['user_to_follow']) && !empty($register['user_to_follow']) ? 'S' : 'N';

        $btn_follow = 'block';
        $btn_unfollow = 'block';

        if ($is_following == 'N') {
            $btn_unfollow = 'none';
        } else {
            $btn_follow = 'none';
        }

        echo    '<a href="#" class="list-group-item">
                    <strong>'
                        .$register['user'].
                    '</strong>
                    <small>'
                    .$register['email'].
                    (
                        $register['id'] == $user_id ?
                            " - You." :
                            '<p class="list-group-item-text pull-right">
                                <button
                                    id="btn_follow'.$register['id'].'"
                                    type="button"
                                    style="display:'.$btn_follow.'" 
                                    class="btn btn-default btn_follow"
                                    data-searched_id="'.$register['id'].'"
                                >
                                    Follow
                                </button>
                                <p class="list-group-item-text pull-right">
                                <button
                                    id="btn_unfollow'.$register['id'].'"
                                    type="button"
                                    style="display:'.$btn_unfollow.'"
                                    class="btn btn-primary btn_unfollow"
                                    data-searched_id="'.$register['id'].'"
                                >
                                    Unfollow
                                </button>
                            </p>
                            <div class="clearfix"></div>'
                    )
                    .'</small>       
                </a>';      
        }
    } else {
        echo 'Request error';
    }
?>