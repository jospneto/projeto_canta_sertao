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
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/css/stylePerfil.css">
    <title>Painel</title>
</head>
<body>
    <div class="perfil">
        <img src="/img/Logo.png">
        <?php
            if(isset($msg) && $msg != false){
                echo "<p>$msg</p>";
                unset($msg);
            }
        ?>
        <img src="/img/cadastro.png" class="img-fluid border border-warning rounded-circle">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="custom-file">
                <input type="file" name="imagem" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Escolher imagem</label>
                <button type="submit" class="btn btn-danger btn-lg">Enviar</button>
            </div>
	    </form>
        <h2><?php echo $_SESSION['nome_fantasia']; ?></h2>
        <div class="buttons">
            <div class="dropdown dropright">
                <button class="btn btn-danger btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Editar perfil
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Editar mídias</a>
                    <a class="dropdown-item" href="#">Editar trabalhos</a>
                    <a class="dropdown-item" href="#">Editar bios</a>
                </div>
            </div>
            <a href="./logout.php"><button type="button" class="btn btn-danger btn-lg">Sair</button></a>
            </div>
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
            <?php
                if(isset($msg2) && $msg2 != false){
                    echo "<p>$msg2</p>";
                }
            ?>
            <div class="bios">
                <p><b>Quem somos?</b></p>
                <div class="card border-warning text-warning" style="width: 38rem;">
                    <div class="card-body">
                        <h5 class="card-title">Nome artístico - <?php echo $_SESSION['nome_fantasia']; ?></h5>
                        <p class="card-text"></p>
                    </div>
                </div>
                <p><b>Escute nosso trabalho</b></p>
                <section class="projetos">
                    <div class="card border-warning text-warning" style="width: 18rem;">
                        <img class="card-img-top img-fluid border border-warning rounded-circle" src="/img/Spotify.png" alt="Imagem de capa do card">
                        <div class="card-body">
                            <h5 class="card-title">Stream musical</h5>
                            <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                            <a href="#" class="btn btn-danger">Visitar</a>
                        </div>
                    </div>
                    <div class="card border-warning text-warning" style="width: 18rem;">
                        <img class="card-img-top img-fluid border border-warning rounded-circle" src="/img/YouTube.png" alt="Imagem de capa do card">
                        <div class="card-body">
                            <h5 class="card-title">Stream de vídeo</h5>
                            <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                            <a href="#" class="btn btn-danger">Visitar</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>