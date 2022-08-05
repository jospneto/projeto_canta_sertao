<?php
/* require_once "../login/conexao.php"; */

include('./conexao.php');
session_start();

$musico = "";

if (isset($_GET['musico'])) {

    $alert = "";

    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $alert = '<div class="alert alert-success mt-3">Avaliação salva!</div>';
                break;

            case 'error':
                $alert = '<div class="alert alert-danger">Ação não executada!</div>';
                break;

            case 'warning':
                $alert = '<div class="alert alert-warning">Verifique os campos!</div>';
                break;
        }
    }

    $cpf_cnpj = $_GET['musico'];
    $sql_code = "SELECT * FROM user_musico WHERE cpf_cnpj = $cpf_cnpj";

    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

    $musico = $sql_query->fetch_assoc();

    if ($musico['ativo'] == "n") {
        echo "<h1> Error 404 </h1>";
        exit;
    }

    //Obtem mídias
    $sql_codeMidias = "SELECT * FROM midias_musico WHERE cpf_cnpj = $cpf_cnpj";
    $sql_queryMidias = $conexao->query($sql_codeMidias) or die("Falha na execução do código SQL: " . $conexao->error);

    $midias = $sql_queryMidias->fetch_assoc();

    $midiasView = "";

    if ($midias) {
        $midiasView = '
        <ul class="midias d-flex align-items-center">
                <li><a href=" ' . $midias['youtube'] . '" target="_blank" ><img src="../img/YouTube.png" height="40"  alt=""></a></li>
                <li><a href=" ' . $midias['spotify'] . '" target="_blank" ><img src="../img/Spotify.png" height="40" alt=""></a></li>
                <li><a href=" ' . $midias['instagram'] . '" target="_blank" ><img src="../img/Instagram (2).png" height="30"  alt=""></a></li>
                <li><a href="' . $midias['outros'] . '" target="_blank" > <img src="../img/businessman 1.png" height="30" alt=""></a></li>
        </ul>
        ';
    }

    //Obtem imagem
    $sql_code = "SELECT * FROM imagens_musico WHERE cpf_cnpj = '$cpf_cnpj'";
    $sql_queryImagens = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

    $imagemDataBase = $sql_queryImagens->fetch_assoc();
    $imgUrl = "";

    if ($imagemDataBase)
        $imgUrl = "./imagens_bd/" . $imagemDataBase['iMg'];
    else
        $imgUrl = "../img/music 1.png";


    $sqlCodeAvaliacoes = "SELECT * FROM avaliacao_musico WHERE cpf_cnpj = $cpf_cnpj";
    $avaliacoesQuery = $conexao->query($sqlCodeAvaliacoes) or die("Falha na execução do código SQL: " . $conexao->error);

    $avaliacoes = "";

    while ($row = mysqli_fetch_array($avaliacoesQuery)) {


        $avaliacoes .= '
         <div>
             <h4>' . $row['nome'] . '</h4>

            <p>
             <strong>Comentário:</strong> ' . $row['comentario'] . ',
            </p>

            <div class="estrelaAvaliacao">
                
                <label class="' . ($row['estrelas'] == 5 ? 'estrela' : 'noEstrela') . '" ></label>
                <label class="' . ($row['estrelas'] >= 4 ? 'estrela' : 'noEstrela') . '" ></label>
                <label class="' . ($row['estrelas'] >= 3 ? 'estrela' : 'noEstrela') . '" ></label>
                <label class="' . ($row['estrelas'] >= 2 ? 'estrela' : 'noEstrela') . '" ></label>
                <label class="' . ($row['estrelas'] >= 1 ? 'estrela' : 'noEstrela') . '" ></label> 
            
            </div>

         <hr>
         </div>
  ';
    }


    if (isset($_POST['comentario'], $_POST['nome'], $_POST['email'], $_POST['estrelas'])) {

        if ($_POST['comentario'] && $_POST['nome'] && $_POST['email'] && $_POST['estrelas']) {

            $comentario = $_POST['comentario'];
            $nome = $_POST['nome'];
            $estrelas = $_POST['estrelas'];
            $email = $_POST['email'];

            $sqlSelectAvaliacao = "SELECT * FROM avaliacao_musico WHERE email LIKE '%$email%' AND cpf_cnpj = " . $cpf_cnpj;
            $sqlAvaliacao = $conexao->query($sqlSelectAvaliacao) or die("Falha na execução do código SQL: " . $conexao->error);

            $asAvaliacao = $sqlAvaliacao->fetch_assoc();

            if ($asAvaliacao) {
                $alert =
                    '<div class="alert alert-danger mt-3" role="alert">
                        Já existe um comentário com esse e-mail!
                  </div>';
            } else {

                $sqlInsertAvaliacao =  "INSERT INTO avaliacao_musico (`cpf_cnpj`, `comentario`, `nome`, `email`, `estrelas`) 
                values (" . $cpf_cnpj . ", ' $comentario', '$nome', 
                ' $email', '$estrelas')";

                print_r($sqlInsertAvaliacao);

                $sqlQueryAvaliacao = $conexao->query($sqlInsertAvaliacao) or die("Falha na execução do código SQL: " . $conexao->error);

                if ($sqlQueryAvaliacao)
                    header("location: ./perfilPublic.php?musico=" . $cpf_cnpj . "&status=success");
                else
                    header("location: ./perfilPublic.php?musico=" . $cpf_cnpj . "&status=error");
            }
        } else {
            header("location: ./perfilPublic.php?musico=" . $cpf_cnpj . "&status=warning");
        }
    }

    /* $sql_code = "SELECT * FROM midias_musico WHERE cpf_cnpj = '$cpf_cnpj'";
    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

    $midias = $sql_query->fetch_assoc(); */
} else {
    header("location: ../index.php");
}




?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.11.0/build/cssnormalize/cssnormalize-min.css">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css//stylePublic.css">
    <title>Painel</title>

    <style id="compiled-css" type="text/css">
        #avaliacoesTitle {
            text-align: center;
            margin-bottom: 20px;
        }

        .estrelaAvaliacao {

            overflow: hidden;
            width: 250px;
            filter: drop-shadow(3px 3px 3px rgba(245, 189, 5, 0.493));

        }

        .stars {

            overflow: hidden;
            width: 250px;
            filter: drop-shadow(3px 3px 3px rgba(245, 189, 5, 0.493));

        }



        .stars input[type=radio]:checked~label:after {
            background: yellow;
        }


        .stars input[type=radio] {
            display: none;
        }



        .stars input[type=radio]:first-child+label {
            padding-right: 0;
        }



        .stars:hover input[type=radio]:checked~label:after,
        .stars label:after {
            background: yellow;
        }

        .stars label {
            box-sizing: border-box;
            width: 20%;
            height: 50px;
            float: right;
            cursor: pointer;

            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }



        .stars label:after {
            display: block;
            content: "";
            height: 120px;
            width: 100%;
            float: right;
            transition: all 0.25s;
            background: #DC3545;

        }


        .stars label:hover:after,
        .stars label:hover~label:after {
            background: gold !important;
        }

        /*================= Avaliações styke====== */

        .noEstrela {
            background: #DC3545;
        }

        .estrela {
            background: yellow;
        }

        .noEstrela,
        .estrela {
            width: 20%;
            height: 50px;
            float: right;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);

        }
    </style>

</head>

<body>
    <section id="perfilUser">
        <div class="perfil">
            <nav id="logo">
                <img src="../img/Logo.png">
            </nav>

            <!--  <div id="imgUser">
                <img src="../img/music 1.png" alt="">
            </div> -->
            
            <div style="margin: 0 auto;" class="mt-2">
                <img src="<?= $imgUrl ?>" height="200" width="200" class="bg-light border border-warning rounded-circle" alt="...">
            </div>


            <!-- <h1>
                <?php
                echo $_SESSION['nome_fantasia'];
                ?>
            </h1> -->

            <h1><?php
                echo $musico['nome_fantasia'];
                ?>
            </h1>

            <?=$midiasView?>

            <a href="../index.php"><button type="button" class="btn btn-warning btn-lg text-light">Voltar</button></a>

        </div>
        <div class="mural">


            <div id="sobre" class="p-2 mb-3">

                <h2 id="avaliacoesTitle">Sobre nós</h2>

                <h4>Gênero: <?= $musico['genero_musical'] ?></h4>
                <h4>Endereço: <?= $musico['endereco'] ?></h4>
                <h4>Telefone: <?= $musico['telefone'] ?></h4>
                <h4>Cachê: <?= $musico['cache_show'] ?></h4>

            </div>
            <div id="trabalhos" class="p-2 mb-5">

                <h2 id="avaliacoesTitle">Avalie <?= $musico['nome_fantasia'] ?></h2>

                <?= $alert ?>
                <form action="" method="POST">

                    <label>Seu endereço de e-mail:</label>
                    <input name="email" class="form-control" type="email" placeholder="exemplo@email.com">

                    <p></p>

                    <label>Seu nome:</label>
                    <input name="nome" class="form-control" type="text" placeholder="Fulano">

                    <p></p>

                    <label>Estrelas: </label>

                    <div class="stars">
                        <input type="radio" id="rate-5" value="5" name="estrelas">
                        <label for="rate-5"></label>
                        <input type="radio" id="rate-4" value="4" name="estrelas">
                        <label for="rate-4"></label>
                        <input type="radio" id="rate-3" value="3" name="estrelas">
                        <label for="rate-3"></label>
                        <input type="radio" id="rate-2" value="2" name="estrelas">
                        <label for="rate-2"></label>
                        <input type="radio" id="rate-1" value="1" name="estrelas">
                        <label for="rate-1"></label>
                    </div>

                    <p></p>

                    <label>Comentário:</label>
                    <textarea name="comentario" class="form-control" type="text" placeholder="Comentário exemplo"></textarea>

                    <p></p>

                    <button class="btn btn-lg btn-danger btn-block text-light" type="submit">Enviar</button>

                </form>

            </div>

            <div id="trabalhos" class="p-2 mb-5">
                <h2 id="avaliacoesTitle">Avaliações</h2>
                <?= $avaliacoes ? $avaliacoes : "<h4> Ainda não a avaliações</h4>" ?>
            </div>

        </div>

    </section>
    <?php
    require_once "../rodape.php"
    ?>
</body>

</html>