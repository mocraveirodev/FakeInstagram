<?php
    // Pegando qual rota o usuario digitou no endereço
    $rotas = key($_GET)?key($_GET):"login-usuario";

    // Direcionando as rotas e decidindo qual controller vai ser chamado
    switch($rotas){
        case "posts": //Direciona para pagina com todos os posts
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
        break;
        case "formulario-post": //Direciona para pagina de cadastro do posts
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
        break;
        case "cadastrar-post": //Armazena o novo post no BD
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
        break;
        case "curtir-post": //curte post no BD
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
        break;
        case "cadastrar-usuario": // Pagina de Cadastro de novo usuário
            include "controllers/UsuarioController.php";
            $controller = new UsuarioController();
            $controller->acao($rotas);
        break;
        case "registrar-usuario": //Cadastro de novo usuário
            include "controllers/UsuarioController.php";
            $controller = new UsuarioController();
            $controller->acao($rotas);
        break;
        case "login-usuario": //pagina de Login
            include "controllers/UsuarioController.php";
            $controller = new UsuarioController();
            $controller->acao($rotas);
        break;
        case "logar-usuario": //Login de usuario
            include "controllers/UsuarioController.php";
            $controller = new UsuarioController();
            $controller->acao($rotas);
        break;
        case "deslogar-usuario": //Deslogar de usuario
            include "controllers/UsuarioController.php";
            $controller = new UsuarioController();
            $controller->acao($rotas);
        break;
    }
?>