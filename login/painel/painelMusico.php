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
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'/>
    <link rel="stylesheet" href="/css/stylePerfil.css">
    <title>Painel</title>
</head>
<body>
    <div class="menu">
        <div id="logo">
            <img src="/img/Logo.png">
        </div>
        <a href="./logout.php"><button type="button" class="btn btn-warning btn-lg text-light">Sair</button></a>
    </div> 
    <section id="body">
    <div class="perfil">
        <?php
            if(isset($msg) && $msg != false){
                echo "<p>$msg</p>";
                unset($msg);
            }
        ?>
        <img src="/img/cadastro.png" class="img-fluid border border-warning rounded-circle">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="custom-file">
                <div class="image">
                    <input type="file" name="imagem" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Escolher imagem</label>
                    <button type="submit" class="btn btn-danger btn-lg">Enviar</button>
                </div>
            </div>
	    </form>
        <h2>Bem vindo(a), <?php echo $_SESSION['nome_fantasia']; ?></h2>
        <div class="buttons">
            <div class="dropdown dropright text-muted">
                <button class="btn btn-danger btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Editar perfil
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="edicaoPerfil.php">Editar Dados</a>
                    <a class="dropdown-item" href="edicaoMidias.php">Editar/Adicionar mídias sociais</a>
                    <a class="dropdown-item" href="#">Deletar</a>
                </div>
            </div>
            </div>

            <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
            <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
            <script>
            $(function () {
                $('.dropdown-toggle').dropdown();
            }); 
            </script>
        </div>
    </div>
    </section>
    <footer class="rodape">
    <h2>&copyCanta Sertão</h2>
    <h2>Todos os direitos reservados</h2>
    <ul>
      <li><a href=""><img src="/img/WhatsApp.png" alt=""></a></li>
      <li><a href=""><img src="/img/msg.png" alt=""></a></li>
      <li><a href=""><img src="/img/Instagram (2).png" alt=""></a></li>
      <li><a href=""><img src="/img/Facebook (1).png" alt=""></a></li>
    </ul>
    </footer>
</body>
</html>