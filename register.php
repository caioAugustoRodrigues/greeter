<?php 
    require_once('db.class.php');

    $user = $_POST['usuario'];
    $email = $_POST['email'];
    $password = md5($_POST['senha']);

    $objDb = new db();
    $link = $objDb->connect_mysql();

    $user_exists = false;
    $email_exists = false;

    //check if user exists
    $sql = " select * from users where user = '$user' ";

    if ($result_id = mysqli_query($link, $sql)) {
        $user_data = mysqli_fetch_array($result_id);

        if (isset($user_data['user'])) {
            $user_exists = true;
        }
    }   else {
        echo "Error: could not find if user is already registered(server error?)";
    }
    
    //check if email already exists
    $sql = " select * from users where email = '$email' ";

    if ($result_id = mysqli_query($link, $sql)) {
        $user_data = mysqli_fetch_array($result_id);
        
        if (isset($user_data['email'])) {
            $email_exists = true;
        }
    }   else {
        echo "Error: could not find if user is already registered(server error?)";
    }

    if ($user_exists || $email_exists) {
        $return_get = '';

        if ($user_exists) {
            $return_get.= "user_error=1&";
        }

        if ($email_exists) {
            $return_get.= "email_error=1&";
        }

        header('Location: inscrevase.php?'.$return_get);
        die();
    }

    
    $sql = "insert into users(user, email, password) values('$user', '$email', '$password')";

    //executar a query
    if ( mysqli_query($link, $sql) ) {
        echo 'Usuario Registrado com Sucesso';
    } else {
        echo 'Erro!';
    }; //first parameter: conection, second parameter: query
?>