<?php
    include_once 'Conexao.php';
    
    class Post extends Conexao{
        public function criarPost($img,$desc){
            $db = parent::criarConexao();
            $query = $db->prepare("INSERT INTO posts (img,descricao) VALUES (?,?)");
            return $query->execute([$img,$desc]);
        }
    }
?>