<?php
    $usuario = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : [];
?>

<header>
        <nav class="navbar topo-instagran justify-content-between">
            <a class="navbar-brand" href="/FakeInstagram/posts"><img width="90" src="views/img/logo.png" alt="" srcset="">FakeInstagram</a>
            
            <div class="login">
                <?php if(isset($usuario) && $usuario != []){ ?>
                    Olá, <?= $usuario->nome." ".$usuario->sobrenome ?>
                    <a href="/FakeInstagram/deslogar-usuario">Sair</a>
                <?php }else { ?>
                    <a class="btn btn-primary" href="/FakeInstagram/cadastrar-usuario">Cadastre-se</a>
                    <a class="btn btn-secondary" href="/FakeInstagram/login-usuario">Login</a>
                <?php } ?>
            </div>
        </nav>
</header>