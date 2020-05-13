<?php 
    session_start();
	require('../../functions/validate-session.php');
	validateSession();
	
	require_once('../../db.class.php');

	$objDb = new db();
    $link = $objDb->connect_mysql();

	$user_id = $_SESSION['user_id'];

	$error = isset($_GET['error']) ? $_GET['error'] : 0;
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home - Greeter</title>
		
		<!-- jquery - link cdn -->

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    	<link rel="stylesheet" href="../../src/css/main.css">
	</head>

	<body id="light">
		<header>
			<nav class="navbar navbar-expand-md navbar-light bg-greeter">
				<div class="logo">
					<a href="./"><span>G</span>reeter</a>
				</div>

				<button class="navbar-toggler <?= $error == 1 ? '' : 'collapsed' ?>" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="<?= $error == 1 ? 'true' : 'false' ?>" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse <?= $error == 1 ? 'show' : '' ?>" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item search">
							<a href="../search/" class="nav-link">
								Look for People
							</a>
						</li>
						<li class="nav-item">
							<a href="../../functions/exit" class="nav-link">
								Exit
							</a>	
						</li>	
					</ul>
				</div>
			</nav>
		</header>


		<?php 
			if ($error == 3) {
				echo '<p class="error">User not found.</p>';
			}
		?>

	    <section class="row main">
				<div class="col-md-3 main__logged-user">
					<div class="panel-body" id="logged-user">
						<h3 id="logged-trigger">
							Logged in as <span><?= $_SESSION['user'] ?></span>
						</h3>
						<div class="main__logged-user__details row">
							<div class="col-sm-6 main__logged-user__details__detail" id="qnt-greets">
								<!--Value being passed by refresh_greet_numbers.js-->
							</div>
							
							<div class="col-sm-6 main__logged-user__details__detail" id="qnt-followers">
								<!--Value being passed by refresh_followers.js-->
							</div>
						</div>
						<hr />
					</div>
				</div>

				<div class="col-md-6 main__greets">
					<div class="panel panel-default main__greets__input">
						<div class="panel-body">
							<form id="greet_input" class="input-group" method="POST">
								<input type="text" name="greet_text" id="text_greet" placeholder="What is on your mind?" maxlength="140" class="form-control">
								<span class="input-group-btn" >
									<span class="btn btn-default" id="btn_greet">
									Greet!
									</span>
								</span>
							</form>
						</div>
					</div>

					<div id="greets" class="list-group main__greets__greets">
					
					</div>
				</div>

				<div class="col-md-3 main__search">
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
		</section>


	    </div>
	
		<script src="../../js/jquery.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/99dd843032.js" crossorigin="anonymous"></script>
		<script src="../../js/removewatermark.js"></script>
		<script src="../../js/home.js"></script>
		<script src="../../js/refresh_greet_numbers.js"></script>
		<script src="../../js/refresh_followers.js"></script>
		<script src="../../js/refresh_greet.js"></script>
		<script src="../../js/delete_greet.js"></script>
</html>