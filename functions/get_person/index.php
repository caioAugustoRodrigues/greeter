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
    $sql = " SELECT * from users WHERE user like '%$searched_user%' ";

    $result_id = mysqli_query($link, $sql);

    if ($result_id) {
        while ($register = mysqli_fetch_array($result_id, MYSQLI_ASSOC)) {
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
                                    class="btn btn-default btn_follow"
                                    data-searched_id="'.$register['id'].'"
                                >
                                    Follow
                                </button>
                                <p class="list-group-item-text pull-right">
                                <button
                                    id="btn_unfollow'.$register['id'].'"
                                    type="button"
                                    style="display:none"
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