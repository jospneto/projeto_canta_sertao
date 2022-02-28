<?php 
    include('conexao.php');

    $msg = false;
    if(isset($_FILES['imagem'])){
        $imagem = $_FILES['imagem']['name'];
        $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));

        $novo_nome = md5(time()).".".$extensao;

        $diretorio = "imagens_bd/";

        $data = date("Y/m/d");

        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);

        $sql_code = "INSERT INTO imagens_musico (iMg, data_entrada) values ('$novo_nome', '$data')";

        if(mysqli_query($conexao, $sql_code)){
            $msg = "Arquivo enviado com sucesso!";
        }else{
            $msg = "Falha ao enviar o arquivo!";
        }
    }
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
        <form action="painel.php" method="POST" enctype="multipart/form-data">
            Selecione a imagem: <input type="file" name="imagem"/>
            <br/>
            <input type="submit" value="Enviar"/>
	    </form>
        <h2><?php echo $_SESSION['nome']; ?></h2>
        <ul class="midias">
        <li><a href=""><img src="/img/WhatsApp.png" alt=""></a></li>
        <li><a href=""><img src="/img/msg.png" alt=""></a></li>
        <li><a href=""><img src="/img/Instagram (2).png" alt=""></a></li>
        <li><a href=""><img src="/img/Facebook (1).png" alt=""></a></li>
        </ul>
        <p>
            <a href="logout.php"><button>Sair</button></a>
        </p>
    </div>
    <div class="mural">
        <?php
            include('conexao.php');
            $sql = "SELECT * FROM user_contrante WHERE cpf_cnpj";
            $buscar = mysqli_query($conexao, $sql);
            $dados = mysqli_fetch_array($buscar);
            $bio = $POST['bio'];
            $sql_code = "INSERT INTO bio_contratante (cpf_cnpj, bio) values ('$dados', '$bio')";
        ?>
        <p>Quem somos ?</p>
        <form action="" method="POST">
            <input type="text" name="bio" class="bio">
            <input type="submit" name="enviar" class="butEnviar">
        </form>
    </div>   
    <?phpinclude("rodape.php");?>
</body>
</html>