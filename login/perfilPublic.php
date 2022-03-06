<?php 
    session_start();
    include('conexao.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/stylePerfil.css">
    <title>Painel</title>
</head>
<body>
    <nav class="menu">
        <img src="/img/Logo.png">
    </nav>
    </div>
    <div class="perfil">
        <?php
            if(isset($msg) && $msg != false){
                echo "<p>$msg</p>";
            }
        ?>
        <h2><?php echo $_SESSION['nome_fantasia']; ?></h2>
        <ul class="midias">
        <li><a href=""><img src="/img/WhatsApp.png" alt=""></a></li>
        <li><a href=""><img src="/img/msg.png" alt=""></a></li>
        <li><a href=""><img src="/img/Instagram (2).png" alt=""></a></li>
        <li><a href=""><img src="/img/Facebook (1).png" alt=""></a></li>
        </ul>
    </div>
    <div class="mural">
        <p>Quem somos ?</p>
    </div>
    <div class="mural2">
        <ul>
            <p><h1>Midias dos trabalhos</h1></p>
            <li><a href=><img src="/img/Spotify.png" alt=""></a></li>
            <li><a href=""><img src="/img/YouTube.png" alt=""></a></li>
        </ul>
    </div>
    <?php
        include("rodape.php");
    ?>
</body>
</html>