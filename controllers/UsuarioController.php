<?php
    session_start();

    include_once "models/Usuario.php";

    class UsuarioController{

        // Direcionando para a pagina correta
        public function acao($rotas){
            switch($rotas){
                case "cadastrar-usuario": //Cadastro de novo usuário
                    $this->cadastrarUsuario();
                break;
                case "registrar-usuario": //Cadastro de novo usuário
                    $this->registrarUsuario();
                break;
                case "login-usuario": //Login de usuario
                    $this->loginUsuario();
                break;
                case "logar-usuario": //Login de usuario
                    $this->logarUsuario();
                break;
                case "deslogar-usuario": //Login de usuario
                    $this->deslogarUsuario();
                break;
            }
        }

        // Metodo que direciona para pagina de cadastro novo usuario
        private function cadastrarUsuario(){
            include "views/cadastro.php";
        }

        // Metodo que direciona para pagina de login de usuario
        private function loginUsuario(){
            include "views/login.php";
        }

        //Metodo para cadastrar usuario
        private function registrarUsuario(){
            //Pegando dados do usuario
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            $db = new Usuario(); //instancia usuario

            $cadastro = $db->cadastrarUsuario($nome,$sobrenome,$email,$senha); //cadastra usuario no BD

            if($cadastro){
                $_SESSION['usuario'] = $db->recuperaUsuario($email); //Coloca dados do usuario na superglobal
                header('Location:/FakeInstagram/posts'); //direciona pra pagina de posts
            }else{
                echo "não foi possivel cadastrar o usuario! Verifique os dados e tente novamente."; //Mensagem de erro de cadastro
            }
        }

        private function logarUsuario(){
            //Pegando dados do usuario
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if($this->validaUsuario($email,$senha)){
                $db = new Usuario(); //instancia usuario
                $_SESSION['usuario'] = $db->recuperaUsuario($email); //Coloca dados do usuario na superglobal
                header('Location:/FakeInstagram/posts'); //direciona pra pagina de posts
            }else{
                echo "Email e/ou senha incorretos!";
            }
        }

        private function validaUsuario($email,$senha){
            $db = new Usuario(); //instancia usuario

            $usuario = $db->recuperaUsuario($email); //Pega dados do usuario

            return password_verify($senha,$usuario->senha) ? true : false; //Valida se a senha esta correta

        }

        private function deslogarUsuario(){
            session_destroy(); //destroi sessão
            header('Location:/FakeInstagram'); //direciona pra pagina de login
        }
    }
?>