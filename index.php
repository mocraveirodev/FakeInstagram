<?php
    // Pegando qual rota o usuario digitou no endereço
    $rotas = key($_GET)?key($_GET):"posts";

    // Direcionando as rotas e decidindo qual controller vai ser chamado
    switch($rotas){
        case "posts":
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
        break;
        case "formulario-post":
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
        break;
        case "cadastrar-post":
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
        break;
    }
?>