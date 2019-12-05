<?php
    include_once 'Conexao.php';
    
    class Usuario extends Conexao{
        // Metodo para cadastrar novo usuario
        public function cadastrarUsuario($nome,$sobrenome,$email,$senha){
            $db = parent::criarConexao(); //Sintaxe para chamar um metodo da classe pai
            $query = $db->prepare("INSERT INTO usuarios (nome,sobrenome,email,senha) VALUES (?,?,?,?)"); //Prepara query para inserir dados no BD
            return $query->execute([$nome,$sobrenome,$email,$senha]); //Executa query para inserir no BD
        }

        // Metodo para pegar dados do usuario
        public function recuperaUsuario($email){
            $db = parent::criarConexao(); //Sintaxe para chamar um metodo da classe pai
            $query = $db->query("SELECT * FROM usuarios WHERE email = $email"); //Prepara e executa query para pegar todos os dados do usuario
            $resultado = $query->fetchAll(PDO::FETCH_OBJ); //Transforma dados do BD em um array de Objetos
            return $resultado;
        }
    }
?>