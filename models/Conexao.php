<?php
    //Classe exclusiva ara conexao com o BD
    class Conexao{
        private $host = 'mysql:host=localhost;dbname=fakeinstagram;port=3306'; //Caminho do BD
        private $user = 'root'; //User name
        private $pass = ''; //senha

        //Metodo para realizar a conexao
        protected function criarConexao(){
            return new PDO($this->host,$this->user,$this->pass);
        }
    }
?>