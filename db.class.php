<?php 

    class db {
        //host
        private $host = 'localhost';

        //usuario
        private $user = 'root';

        //senha
        private $pass = '';

        //banco de dados
        private $database = 'db_twitter';

        public function connect_mysql() {
            //cria conexão
            $connect = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

            //ajustar o charset entre ambas as partes
            mysqli_set_charset($connect, 'utf8');

            //teste conexão
            if( mysqli_connect_errno() ) {
                echo 'Houve um erro ao conectar com o DataBase: '.mysqli_connect_error();
            }

            return $connect;
        }
    }

?>