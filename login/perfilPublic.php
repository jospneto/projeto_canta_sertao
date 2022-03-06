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
            echo "<img>";
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
        <div>
            <?php
                $sql_code = "SELECT * FROM bio_musico";
                if(mysqli_query($conexao, $sql_code)){
                    echo $sql_code;
                }else{
                    echo "Erro".mysqli_connect_error($conexao);
                }
                mysqli_close($conexao);
            ?>
        </div>
        <h1 class="infoM">Midias dos trabalhos</h1>
        <div class="mural2">
            <ul class="midiasMusic">
                <li><a href=><img src="/img/Spotify.png" alt=""></a>Spotify</li>
                <li><a href=""><img src="/img/YouTube.png" alt=""></a>YouTube</li>
            </ul>
        <div>
    </div>
    <?php
        include("rodape.php");
    ?>
</body>
</html>