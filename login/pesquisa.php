<?php
include('./conexao.php');
session_start();

if (isset($_GET['buscar'])) {

    $pesquisar = $_GET['buscar'];
    $sql_code = "SELECT cpf_cnpj, nome_fantasia, genero_musical, endereco FROM user_musico WHERE nome_fantasia LIKE '%$pesquisar%' AND ativo LIKE 's' LIMIT 5";

    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

    $resultados = '';
    while ($musico = mysqli_fetch_array($sql_query)) {

        $cpf_cnpj =  $musico['cpf_cnpj'];

        $sql_code = "SELECT * FROM imagens_musico WHERE cpf_cnpj = '$cpf_cnpj'";
        $sql_queryImagens = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        $imagemDataBase = $sql_queryImagens->fetch_assoc();
        $imgUrl = "";

        if ($imagemDataBase)
            $imgUrl = "./imagens_bd/" . $imagemDataBase['iMg'];
        else
            $imgUrl = "../img/music 1.png";

        //$imgUrl = "../img/music 1.png";

        $resultados .= '
        <div class="card shadow m-3" style="width: 18rem;">
        <div style="margin: 0 auto;" class="mt-2">
                <img src="' . $imgUrl . '" height="150" width="150" class=" border border-warning rounded-circle" alt="...">
        </div>
        <div class="card-body">
          <h5 class="card-title">' . $musico['nome_fantasia'] . '</h5>
          <p class="card-text">' . $musico['genero_musical'] . '</p>
          <p class="card-text"><small class="text-muted">' . $musico['endereco'] . '</small></p>
          <a href="./perfilPublic.php?musico=' . $musico['cpf_cnpj'] . '"class="btn btn-danger btn-lg">Detalhes</a>
        </div>
      </div>
    ';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhuma músico encontrada
                                                       </td>
                                                    </tr>';
}

if (isset($_POST['pesquisa'])) {
    header("location: ./pesquisa.php?buscar=" . $_POST['pesquisa']);
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleRodapePublic.css">
    <title>Pesquisar músicos</title>

    <style>
        body {
            background-image: linear-gradient(#F2B705, #E73A59);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            overflow: hidden;
            min-height: 100%;
        }

        #results{
            background-image: linear-gradient(#E73A59, #F2B705);
        }
    </style>

</head>
<body>
    <div class="container m-5 ">
        <form class="form-inline my-2 my-lg-0" method="POST">
            <input class="form-control mr-sm-2" type="search" name="pesquisa" placeholder="Pesquisar" aria-label="Pesquisar">
            <button class="btn btn-danger my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
        <div>
            <div id="results" class="d-flex flex-row align-items-center justify-content-center flex-wrap mt-1 mb-5 bg-warning shadow p-3 mb-5 bg-white rounded">
                <?= $resultados ?>
            </div>
        </div>
    </div>
    <?php
        require_once "../rodape.php"
    ?>
</body>
</html>