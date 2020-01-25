<?php 
    session_start();
    require('../validate-session.php');
    validateSession();

    require_once('../../db.class.php');

    $user_id = $_SESSION['user_id'];

    $objDb = new db();
    $link = $objDb->connect_mysql();
    
    //date: DATE_FORMAT(g.date, '%d %b %Y %T') AS date or g.date for US time
    $sql = "SELECT COUNT(*) as qnt_greets FROM greets where id_user = $user_id";
	$result_id = mysqli_query($link, $sql);

	$qnt_greets = 0;

	if ($result_id) {
		$register = mysqli_fetch_array($result_id, MYSQLI_ASSOC);
        $qnt_greets = $register['qnt_greets'];
        
        echo '<h4>GREETS</h1>';
        echo '<p>'.$qnt_greets.'</p>';
	} else {
		echo "Error on fetching user's number of greets";
	}
?>