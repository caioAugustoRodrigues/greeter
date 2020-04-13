<?php 
    session_start();
	require('../../functions/validate-session.php');
	validateSession();
	
	require_once('../../db.class.php');

	require('../../functions/get_profile/index.php');

	$objDb = new db();
    $link = $objDb->connect_mysql();

	$user_id = $_SESSION['user_id'];

	$profile = new Profile;

	$userName = $profile->getName();
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
		<link rel="stylesheet" href="../../src/css/main.css">
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
	    	<div class="col-xs-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>
							<?= $_SESSION['user'] ?>
						</h4>
						<hr />
						<div class="col-xs-6" id="qnt-greets">
							<!--Value being passed by refresh_greet_numbers.js-->
						</div>

						<div class="col-xs-6" id="qnt-followers">
							<!--Value being passed by refresh_followers.js-->
						</div>
					</div>
				</div>
			</div>

	    	<div class="col-xs-6">
	    		<div class="panel panel-default">
                <div class="panel-body">
						<h4 id="person-name">
							<?php 
								echo $userName;
							?>
						</h4>
						<hr />
						<div class="col-xs-6" id="qnt-greets">
							<!--Value being passed by refresh_greet_numbers.js-->
                            2
						</div>

						<div class="col-xs-6" id="qnt-followers">
							<!--Value being passed by refresh_followers.js-->
                            3
						</div>
					</div>
				</div>

				<div id="person-greets" class="list-group">
					<?php 
						 //in get_profile/index.php
						echo $userName;
					?>
				</div>
			</div>

			<div class="col-xs-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>
							<a href="../search/">
								Look for People
							</a>
						</h4>
					</div>
				</div>
			</div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="../../js/home.js"></script>
		<script src="../../js/refresh_greet_numbers.js"></script>
		<script src="../../js/refresh_followers.js"></script>
		<script src="../../js/refresh_greet.js"></script>
		<script src="../../js/delete_greet.js"></script>
</html>