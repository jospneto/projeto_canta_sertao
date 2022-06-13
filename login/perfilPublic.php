<?php 
    require_once "../login/conexao.php";
    
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.11.0/build/cssnormalize/cssnormalize-min.css">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/css/stylePublic.css">
    <title>Painel</title>
</head>
<body>
    <section id="perfilUser">
        <div class="perfil">
            <nav id="logo">
                <img src="/img/Logo.png">
            </nav>
            <div id="imgUser">
                <img src="/img/music 1.png" alt="">
            </div>
            <h1><?php  
                echo $_SESSION['nome_fantasia'];
            ?></h1>
            <ul class="midias">
            <li><a href=""><img src="/img/WhatsApp.png" alt=""></a></li>
            <li><a href=""><img src="/img/msg.png" alt=""></a></li>
            <li><a href=""><img src="/img/Instagram (2).png" alt=""></a></li>
            <li><a href=""><img src="/img/Facebook (1).png" alt=""></a></li>
            </ul>
            <a href="../../index.php"><button type="button" class="btn btn-warning btn-lg text-light">Voltar</button></a>
        </div>
        <div class="mural">
            <h2>Sobre nós</h2>
            <div id="sobre">
            </div>
            <h2>Nossos trabalhos</h1>
            <div id="trabalhos">
            <div>
        </div>
    </section>
    <?php
        require_once "../rodape.php"
    ?>
</body>
</html>