<?php 
    session_start(); //aways use first

    require_once('db.class.php');

    $login = $_POST['usuario'];
    $password = $_POST['senha'];

    $sql = " SELECT * FROM users WHERE user = '$login' AND password = '$password' ";
    
    $objDb = new db();
    $link = $objDb->connect_mysql();

    $id_result = mysqli_query($link, $sql);

    $user_data = mysqli_fetch_array($id_result);
   
    if ($id_result) {
        $user_data;

        if (isset($user_data['user'])) {
            $_SESSION['user'] = $user_data['user'];
            $_SESSION['email'] = $user_data['email'];

            header('Location: home.php');
        } else {
            header('Location: index.php?error=1');
        }
    } else {
        echo 'Erro na execução da consulta, favor entrar em contato com o suporte';
    }

?>