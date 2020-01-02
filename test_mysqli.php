<?php 
    require_once('db.class.php');

    $sql = " SELECT * FROM users WHERE user = '$login' AND password = '$password' ";
    
    $objDb = new db();
    $link = $objDb->connect_mysql();

    $id_result = mysqli_query($link, $sql);

    if ($id_result) {
        $user_data = mysqli_fetch_array($id_result);

    } else {
        echo 'Erro na execução da consulta, favor entrar em contato com o suporte';
    }
?>