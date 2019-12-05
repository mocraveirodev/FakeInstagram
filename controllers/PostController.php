<?php
    session_start();

    include_once "models/Post.php";

    class PostController{

        // Direcionando para a pagina correta
        public function acao($rotas){
            switch($rotas){
                case "posts":
                    $this->listarPost(); //Alterando o metodo de chamadas para que traga todos os posts armazenados
                break;
                case "formulario-post":
                    $this->viewFormularioPost(); //Chama a view de cadastro de post
                break;
                case "cadastrar-post":
                    $this->cadastrarPost(); //Insere o post no BD
                break;
                case "curtir-post":
                    $this->curtirPost(); //Verifica curtidas do post no BD
                break;
            }
        }

        // Metodo para chamar a view dos posts 
        private function viewPosts(){
            include "views/posts.php"; //Se usuario logado mostra posts
        }

        // Metodo para chamar a view dos de cadastrar post 
        private function viewFormularioPost(){
            if(isset($_SESSION['usuario'])){
                include "views/newPost.php"; //Se usuario logado mostra pagina de cadastro de posts
            }else{
                header('Location:/FakeInstagram/login-usuario'); //Se usuario deslogado direciona pra pagina de login
            }
        }

        // Metodo para cadastrar o post no banco de dados
        private function cadastrarPost(){
            if(isset($_SESSION['usuario'])){
                $desc = $_POST['descricao']; //Pega a descrição
                $nomeArquivo = $_FILES['img']['name']; //Pega o nome da img
                $linkTemp = $_FILES['img']['tmp_name']; //Pega o caminho da img
                $caminhoSalvar = "views/img/$nomeArquivo"; //cria o caminho onde a img sera salva

                move_uploaded_file($linkTemp,$caminhoSalvar); //move a img da pasta temporaria para onde sera salva no projeto

                $id_usuario = $_SESSION['usuario']->id; //Pega id do usuario
                
                $post = new Post(); //Instancia e chama o metodo para armazenar os dados no BD
                $resultado = $post->criarPost($caminhoSalvar,$desc,$id_usuario);

                //Se inserir no BD com sucesso carrega a pagina com todos os posts, se der erro informa que deu ruim.
                if($resultado){
                    header('Location:/FakeInstagram/posts'); //Direciona pra pagina de posts
                }else{
                    echo "Deu ruim!"; //Dá mensagem de erro
                }
            }else{
                header('Location:/FakeInstagram/login-usuario'); //Se usuario deslogado direciona pra pagina de login
            }
        }

        //Novo metodo criado para chamar todos os posts e depois chamar o metodo pra chamar a view
        private function listarPost(){
            if(isset($_SESSION['usuario'])){            
                $post = new Post(); //Instancia e chama o metodo para pegar os posts do BD
                $listaPost = $post->listarPost();
                $_REQUEST['posts'] = $listaPost; //Usamos a suoer global para passar informações entre as camadas pois toda as paginas terao acesso
                $this->viewPosts(); //Chama a pagina com todos os posts
            }else{
                header('Location:/FakeInstagram/login-usuario'); //Se usuario deslogado direciona pra pagina de login
            }
        }

        public function curtirPost(){
            $post = new Post();
        }
    }
?>