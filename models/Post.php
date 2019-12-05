<?php
    include_once 'Conexao.php';
    
    class Post extends Conexao{
        // Metodo para adicionar um novo post
        public function criarPost($img,$desc,$usuario){
            $db = parent::criarConexao(); //Sintaxe para chamar um metodo da classe pai
            $query = $db->prepare("INSERT INTO posts (img,descricao,id_usuario) VALUES (?,?,?)"); //Prepara query para inserir dados no BD
            return $query->execute([$img,$desc,$usuario]); //Executa query para inserir no BD
        }

        // Metodo para listar todos os posts
        public function listarPost(){
            $db = parent::criarConexao(); //Sintaxe para chamar um metodo da classe pai
            $query = $db->query("SELECT posts.id, usuarios.nome, usuarios.sobrenome, posts.img, posts.descricao FROM posts INNER JOIN usuarios ON posts.id_usuario=usuarios.id ORDER BY posts.id DESC"); //Prepara e executa query para pegar todos os posts do bd ja colocando em ordem descrescente para que nosso posts venham do ultimo pro primeiro
            $resultado = $query->fetchAll(PDO::FETCH_OBJ); //Transforma dados do BD em um array de Objetos
            return $resultado;
        }

        public function recuperaLikes($id_post){
            $db = parent::criarConexao();
            $query = $db->query('SELECT likes FROM posts WHERE id = $id_post');
            $resultado = $query->fetch(PDO::FETCH_OBJ);
            return $resultado;
        }

        public function dislike($id_post){
            $likes = recuperaLikes($id_post);
            $likes['likes'] -= 1;
            $query = $db->prepare("INSERT INTO posts (likes) VALUES (?) WHERE id = $id_post");
            return $query->execute([$likes]);
        }

        public function like($id_post){
            $likes = recuperaLikes($id_post);
            $likes['likes'] += 1;
            $query = $db->prepare("INSERT INTO posts (likes) VALUES (?) WHERE id = $id_post");
            return $query->execute([$likes]);
        }
    }
?>