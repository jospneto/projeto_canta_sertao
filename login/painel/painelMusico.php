<?php 
    session_start();
    
    require_once "../conexao.php";

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
<?php
    $sql_code = "SELECT * FROM imagens_musico";
    $con = mysqli_query($conexao, $sql_code) or die($conexao->erro);
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
                unset($msg);
            }
        ?>
        <?php
            while($dado = $con->fetch_assoc()){

            }
        ?>
       
        <tr>
            
      

            <td><?php echo $dado = isset($dado[1]) ? $dado[1] : null;['idImagem'];?><td>
            <td><img src="<?php echo $dado= isset($dado[1]) ? $dado[1] : null;['iMg'];?>" alt=""><td>
            <td><?php echo $dado= isset($dado[1]) ? $dado[1] : null;['data_entrada'];?><td>
        </tr>
        <form action="" method="POST" enctype="multipart/form-data">
            Selecione a imagem: <input type="file" name="imagem"/>
            <br/>
            <input type="submit" value="Enviar"/>
	    </form>
        <h2><?php echo $_SESSION['nome_fantasia']; ?></h2>
        <ul class="midias">
        <li><a href=""><img src="/img/WhatsApp.png" alt=""></a></li>
        <li><a href=""><img src="/img/msg.png" alt=""></a></li>
        <li><a href=""><img src="/img/Instagram (2).png" alt=""></a></li>
        <li><a href=""><img src="/img/Facebook (1).png" alt=""></a></li>
        </ul>
        <p>
            <a href="logout.php"><button class="logout">Sair</button></a>
        </p>
    </div>
    <div class="mural">
        <?php
            if(isset($POST['bio'])){
                $usuario = $_SESSION['cpf_cnpj'];
                $bio = $POST['bio'];
                $sql_code = "INSERT INTO bio_musico (cpf_cnpj, bio) values ('$usuario', '$bio')";
                if(mysqli_query($conexao, $sql_code)){
                    $msg2 = "Dados enviados com sucesso!";
                }else{
                    $msg2 = "Falha ao enviar o dados!";
                }
            }
        ?>
        <h1 class="info">Quem somos?<h1>
        <form action="" method="POST">
            <input type="text" name="bio" class="bioF">
            <input type="submit" name="enviar" class="butEnviar">
        </form>
        <?php
            if(isset($msg2) && $msg2 != false){
                echo "<p>$msg2</p>";
            }
        ?>
        <h1 class="infoM">Midias dos trabalhos</h1>
        <div class="mural2">
            <ul class="midiasMusic">
                <li><a href=><img src="/img/Spotify.png" alt=""></a>Spotify</li>
                <li><a href=""><img src="/img/YouTube.png" alt=""></a>YouTube</li>
            </ul>
        <div>
    </div>
</body>
</html>