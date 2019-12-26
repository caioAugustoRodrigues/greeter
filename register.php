<?php 
    require_once('db.class.php');

    $user = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['senha'];

    $objDb = new db();
    $link = $objDb->connect_mysql();

    $sql = "insert into users(user, email, password) values('$user', '$email', '$password')";

    //executar a query
    if ( mysqli_query($link, $sql) ) {
        echo 'Usuario Registrado com Sucesso';
    } else {
        echo 'Erro!';
    }; //primeiro parametro: conexão, segundo parametro: query
?>