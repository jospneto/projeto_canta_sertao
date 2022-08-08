<?php

session_start();

if (!($_SESSION['cpf_cnpj'] && $_SESSION['nome_fantasia'])) {
    session_destroy();
    header("location: ../logout.php");
    exit;
}

require_once "../conexao.php";

$msg = false;
$cpf_cnpj = $_SESSION['cpf_cnpj'];

//Obtém dados do músico logado
$sql_code = "SELECT * FROM user_musico WHERE cpf_cnpj = '$cpf_cnpj'";
$sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

$usuario = $sql_query->fetch_assoc();

//Obtém imagem do músico logado
$sql_code = "SELECT * FROM imagens_musico WHERE cpf_cnpj = '$cpf_cnpj'";
$sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

$imagemDataBase = $sql_query->fetch_assoc();
$imgUrl = "";

//Verifica se já ixiste uma imagem salva
if ($imagemDataBase)
    $imgUrl = "../imagens_bd/" . $imagemDataBase['iMg'];
else
    $imgUrl = "../../img/businessman 1.png";

//Altera imagem
if (isset($_FILES['imagem'])) {

    $imagem = $_FILES['imagem']['name'];
    $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));

    $novo_nome = md5(time()) . "." . $extensao;

    $diretorio = "../imagens_bd/";

    $data = date("Y/m/d");

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);

    $sql_code = "";

    if ($imagemDataBase)
        $sql_code = "UPDATE imagens_musico SET iMg = '$novo_nome' WHERE cpf_cnpj = " . $cpf_cnpj;
    else
        $sql_code = "INSERT INTO imagens_musico (iMg, data_entrada, cpf_cnpj) values ('$novo_nome', '$data', ' $cpf_cnpj')";

    if (mysqli_query($conexao, $sql_code)) {
        header("Refresh:0");
    } else {
        $msg = "Falha ao enviar o arquivo!";
    }
}

if (isset($_POST['ativo'])) {

    $updateAtivo = $usuario['ativo'] == 's' ? "n" : "s";

    $sql_codeAtivo = "UPDATE user_musico SET ativo = '$updateAtivo' WHERE cpf_cnpj = " . $cpf_cnpj;

    $sql_query = $conexao->query($sql_codeAtivo) or die("Falha na execução do código SQL: " . $conexao->error);
    header("Refresh:0");
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
    <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css">
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css' />
    <link rel="stylesheet" href="../../css/stylePerfil.css">
    <title>Painel</title>

    <style>
        #body {
            min-height: 100%;
            overflow-y: auto;
        }

        #imgMusico {
            width: 170px;
            height: 170px;
        }
    </style>

</head>

<body>
    <div class="menu">
        <div id="logo">
            <img src="../../img/Logo.png">
        </div>
        <a href="../logout.php"><button type="button" class=" btn btn-warning btn-lg text-light">Sair</button></a>
    </div>
    <section id="body">
        <div class="perfil">

            <?php
            if (isset($msg) && $msg != false) {
                echo "<p>$msg</p>";
                unset($msg);
            }
            ?>

            <!-- height="230" width="230" -->
            <!--img-fluid-->

            <div class="mt-3">
                <img id="imgMusico" src="<?= $imgUrl ?>" class="img-fluid border border-warning rounded-circle">
            </div>


            <form class="m-5" action="" method="POST" enctype="multipart/form-data">

                <div class="custom-file">
                    <div class="image">
                        <input type="file" name="imagem" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Escolher imagem</label>
                        <button type="submit" class="btn btn-danger btn-lg">Enviar</button>
                    </div>
                </div>

            </form>

            <h2 class="m-3">Bem vindo(a), <?php echo $_SESSION['nome_fantasia']; ?></h2>

            <div class="buttons d-flex flex-column align-items-center">

                <div class="dropdown dropright text-muted">
                    <button class="btn btn-danger btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Editar perfil
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="edicaoPerfil.php">Editar Dados</a>
                        <a class="dropdown-item" href="edicaoMidias.php">Editar/Adicionar mídias sociais</a>
                    </div>
                </div>



                <div class="d-flex flex-row flex-wrap align-items-center">

                    <form action="" method="POST" class="m-2">
                        <button class="btn btn-danger btn-lg" name="ativo" type="submit">
                            <?= $usuario['ativo'] == 's' ? 'Desativar perfil' : 'Ativa perfil' ?>
                        </button>
                    </form>

                    <?php
                    if ($usuario['ativo'] == 's') {

                        echo '
                            <div class="alert alert-info m-2 shadow " role="alert">
                                Seu perfil está visível para todos!
                            </div>
                            ';
                    } else {

                        echo '
                            <div class="alert alert-danger m-2 shadow " role="alert">
                                Seu perfil não está visível para todos!
                            </div>
                            ';
                    }
                    ?>
                </div>
            </div>


        </div>

        <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
        <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
        <script>
            $(function() {
                $('.dropdown-toggle').dropdown();
            });
        </script>
        </div>
        </div>
    </section>
    <?php
    require_once "../../rodape.php"
    ?>
</body>

</html>