<?php 
    session_start();
	require('../../functions/validate-session.php');
	validateSession();

	require_once('../../db.class.php');

	$objDb = new db();
    $link = $objDb->connect_mysql();

	$user_id = $_SESSION['user_id'];

	//how many greets
	$sql = "SELECT COUNT(*) as qnt_greets FROM greets where id_user = $user_id";
	$result_id = mysqli_query($link, $sql);

	$qnt_greets = 0;

	if ($result_id) {
		$register = mysqli_fetch_array($result_id, MYSQLI_ASSOC);
		$qnt_greets = $register['qnt_greets'];
	} else {
		echo 'Error on fetching user id';
	}
	
	//how many followers
	$sql = "SELECT COUNT(*) as qnt_followers FROM followers where user_id = $user_id";
	$result_id = mysqli_query($link, $sql);

	$qnt_followers = 0;

	if ($result_id) {
		$register = mysqli_fetch_array($result_id, MYSQLI_ASSOC);
		$qnt_followers = $register['qnt_followers'];
	} else {
		echo 'Error on fetching user id';
	}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Home - Greeter</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="../home/">Home</a></li>
	            <li><a href="../../functions/exit">Exit</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>
							<?= $_SESSION['user'] ?>
						</h4>
						<hr />
						<div class="col-xs-6">
						<h4>GREETS</h3>
						<p><?= $qnt_greets ?></p>
						</div>
						<div class="col-xs-6">
						<h4>FOLLOWERS</h3>
						<p><?= $qnt_followers ?></p>
						</div>
					</div>
				</div>
			</div>

	    	<div class="col-md-6">
	    		<div class="panel panel-default">
					<div class="panel-body">
						<form onsubmit="return false" id="search_form" name="search_people" class="input-group" method="POST">
							<input type="text" name="person" id="person" placeholder="Who are you looking for?" maxlength="140" class="form-control">
							<span class="input-group-btn" >
								<span type="submit" class="btn btn-default" id="btn_search">
                                    Search
								</span>
							</span>
						</form>
					</div>
				</div>

				<div id="search_results" class="list-group">
				
				</div>
			</div>

			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						
					</div>
				</div>
			</div>
		</div>


	    </div>
	
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="../../js/search.js"></script>
		<script src="../js/refresh_greet_numbers.js"></script>
		<script src="../js/refresh_followers.js"></script>
</html>