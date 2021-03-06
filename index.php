<?php 
	$error = isset($_GET['error']) ? $_GET['error'] : 0;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./src/css/main.css">
<title>Greeter</title>
</head>

<body id="light">
 <!-- <header>
    <nav class="navbar fixed-top navbar-expand-md navbar-light bg-greeter">
        <div class="logo">
            <a href="./"><span>G</span>reeter</a>
        </div>

        <button class="navbar-toggler <?= $error == 1 ? '' : 'collapsed' ?>" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="<?= $error == 1 ? 'true' : 'false' ?>" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse <?= $error == 1 ? 'show' : '' ?>" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    
                </li>
                <li class="nav-item dropdown <?= $error == 1 ? 'show' : '' ?>">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="<?= $error == 1 ? 'true' : 'false' ?>">
                    Enter
                    </a>

                    <div class="dropdown-menu <?= $error == 1 ? 'show' : '' ?>" aria-labelledby="navbarDropdownMenuLink">
                        <h2>Already have an account?</h2>

                        <form method="post" action="validate.php" id="formLogin">
                            <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="User" />
                            <input type="password" class="form-control" id="campo_senha" name="senha" placeholder="Password" />
                            <button type="submit" class="btn btn-primary" id="btn_login">Login</button>
                        </form>
                    <?php 
                        if($error == 1) {
                            echo '<p class="error">Usuário e/ou senha inválidos</p>';
                        }
                    ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
  </header>-->
    <main>
        <section class="hero">
            <div class="hero__panel"></div>

            <div class="hero__inner">
                <div class="logo">
                    <a href="./"><span>G</span>reeter</a>
                </div>

                <p>Check out what's happening now</p>

                <a class="sign-up" href="pages/sign-up">Sign-up!</a>

                <p>or</p>
                
                <div class="hero__inner__login <?= $error == 1 ? 'show' : '' ?>" id="enter">
                    <h2 id="enter-toggle">Enter <span></span></h2>
                    
                    <form method="post" action="validate.php" id="formLogin">
                        <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="User" />
                        <input type="password" class="form-control" id="campo_senha" name="senha" placeholder="Password" />
                        <button type="submit" id="btn_login">Login</button>
                        <?php 
                            if($error == 1) {
                                echo '<p class="error">Invalid user and/or password</p>';
                            }
                        ?>
                    </form>

                </div>
            </div>
        </section>
    </main>


	    </div>
	
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

		<script src="js/menu.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js" ></script>
    <script src="./js/enter.js"></script>
    <script src="./js/removewatermark.js"></script>
</body>
</html>