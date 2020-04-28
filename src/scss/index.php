<?php 
	$error = isset($_GET['error']) ? $_GET['error'] : 0;
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Greeter</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 	<link rel="stylesheet" href="./src/css/main.css">
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
	          <div class="logo">
			  	<a href="index.php">
				  <img src="img/greeter.png" class="logo__content" />  
				</a>
			  </div>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="pages/sign-up">Sign-up!</a></li>
	            <li class="<?= $error == 1 ? 'open' : '' ?>">
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Already have an account?</h3>
				    		<br />
							<form method="post" action="validate.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="User" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Password" />
								</div>
								
								<button type="submit" class="btn btn-primary" id="btn_login">Login</button>

								<br /><br />
								
							</form>

							<?php 
								if($error == 1) {
									echo '<p class="error">Usuário ou senha inválidos</p>';
								}
							?>

						</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h1>Welcome to Greeter!</h1>
	        <p>Check out what's happening now</p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
		$(document).ready( function() {
			$('#btn_login').click(function() {
				var empty_field = false;

				if ($('#campo_usuario').val() == '') {
					$('#campo_usuario').css({'border-color': '#A94442'});
					empty_field = true;
				} else {
					$('#campo_usuario').css({'border-color': '#CCC'});
				}
				
				if ($('#campo_senha').val() == '') {
					$('#campo_senha').css({'border-color': '#A94442'});
					empty_field = true;
				} else {
					$('#campo_senha').css({'border-color': '#CCC'});
				}

				if(empty_field) return false;
			})
		})
		</script>
	</body>
</html>