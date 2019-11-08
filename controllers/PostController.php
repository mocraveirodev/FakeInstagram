<?php
    include_once "models/Post.php";
    class PostController{

        // Direcionando para a pagina correta
        public function acao($rotas){
            switch($rotas){
                case "posts":
                    $this->viewPosts();
                break;
                case "formulario-post":
                    $this->viewFormularioPost();
                break;
                case "cadastrar-post":
                    $this->viewCadastroPost();
                break;
            }
        }

        private function viewPosts(){
            include "views/posts.php";
        }

        private function viewFormularioPost(){
        include "views/newPost.php";
        }

        private function viewCadastroPost(){
            $desc = $_POST['descricao'];
            $nomeArquivo = $_FILES['img']['name'];
            $linkTemp = $_FILES['img']['tmp_name'];
            $caminhoSalvar = "views/img/$nomeArquivo";

            move_uploaded_file($linkTemp,$caminhoSalvar);

            $post = new Post();
            $resultado = $post->criarPost($caminhoSalvar,$desc);

            if($resultado){
                header('Location:/FakeInstagram/posts');
            }
        }
    }
?>