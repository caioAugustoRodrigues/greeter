<?php 
    session_start();
	require('functions/validate-session.php');
	validateSession();
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
	            <li><a href="functions/exit">Sair</a></li>
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
						<div class="col-xs-6">
						GREETS <br> 1
						</div>
						<div class="col-xs-6">
						FOLLOWERS <br> 1
						</div>
					</div>
				</div>
			</div>

	    	<div class="col-xs-6">
	    		<div class="panel panel-default">
					<div class="panel-body">
						<form onsubmit="return false" id="greet_input" class="input-group" method="POST">
							<input type="text" name="greet_text" id="text_greet" placeholder="What is on your mind?" maxlength="140" class="form-control">
							<span class="input-group-btn" >
								<span class="btn btn-default" id="btn_greet">
								Greet!
								</span>
							</span>
						</form>
					</div>
				</div>

				<div id="greets" class="list-group">
				
				</div>
			</div>

			<div class="col-xs-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>
							<a href="pages/search/">
								Look for People
							</a>
						</h4>
					</div>
				</div>
			</div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="home.js"></script>
		<script src="js/refresh_greet.js"></script>
</html>