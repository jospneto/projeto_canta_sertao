<?php

include('./login/conexao.php');

if (isset($_POST['pesquisa'])) {
  header("location: ./login/pesquisa.php?buscar=" . $_POST['pesquisa']);
  exit;
}


$sql_code = "SELECT * FROM user_musico WHERE ativo = 's' LIMIT 3";

$sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

$musicos = "";

/* print_r( mysqli_fetch_array($sql_query) ); */

$avaliacoes = "";

while ($row = mysqli_fetch_array($sql_query)) {

  $sqlCodeAvaliacoes = "SELECT * FROM avaliacao_musico WHERE cpf_cnpj = " . $row['cpf_cnpj'];
  $avaliacoesQuery = $conexao->query($sqlCodeAvaliacoes) or die("Falha na execução do código SQL: " . $conexao->error);

  $quantidadeEstrelas = 0;
  while ($estrelas = mysqli_fetch_array($avaliacoesQuery)) {
    $quantidadeEstrelas += $estrelas['estrelas'];
  }

  $media = 0;

  if ($quantidadeEstrelas > 0 && $avaliacoesQuery->num_rows > 0)
    $media = $quantidadeEstrelas / $avaliacoesQuery->num_rows;
  /* print_r( (($avaliacoesQuery->num_rows/$quantidadeEstrelas)). " | "); */

  $musicos .= '
    <div class="ava">
  
      <div>
        <a style=" font-size: 25px; color: #F2B705; text-decoration: none;" href="./login/perfilPublic.php?musico=' . $row['cpf_cnpj'] . '"class="btn btn-danger btn-lg"><h1>' . $row['nome_fantasia'] . '</h1></a>
      </div>

      <div>
        <p >
          <strong>Gênero musical:</strong> ' . $row['genero_musical'] . ' |
           <strong>Endereço:</strong> ' . $row['endereco'] . ' |
           <strong>Cachê: R$</strong> ' . $row['cache_show'] . '
        </p>
      </div>
      <h3>Média de aprovação: ' . ($media == 0 ? 'Ainda não a avaliações' :  number_format($media, 2, '.', '')) . '</h3>

      <div class="estrelaAvaliacao">
          
          <label class="' . ($media >= 5 ? 'estrela' : 'noEstrela') . '" ></label>
          <label class="' . ($media >= 4 ? 'estrela' : 'noEstrela') . '" ></label>
          <label class="' . ($media >= 3 ? 'estrela' : 'noEstrela') . '" ></label>
          <label class="' . ($media >= 2 ? 'estrela' : 'noEstrela') . '" ></label>
          <label class="' . ($media >= 1 ? 'estrela' : 'noEstrela') . '" ></label>     
              
      </div>
      <hr>
    </div>
    
  ';
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Página Inicial</title>

  <style>
    .avaliacoesSection {
      display: flex;
      flex-direction: column;
      align-items: center;

      text-align: center;
      color: #F2B705;
      text-shadow: rgba(0, 0, 0, 0.5) 0 3px 2.5px;
      font-size: 1.5rem;
      background-image: linear-gradient(#E73A59, #F21905,  #333);
    }

    .ava {
      display: flex;
      flex-direction: column;
      /* justify-content: space-between; */
      width: 100%;
      align-items: center;

    }

    hr {
      border: 0;
      height: 1px;
      background: #333;
      background-image: linear-gradient(to right, #E73A59, #333, #E73A59);
      width: 95%;
    }

    .estrelaAvaliacao {

      overflow: hidden;
      width: 250px;
      filter: drop-shadow(3px 2px 2px, #333);
    }

    .noEstrela {
      background: #DC3545;
    }

    .estrela {
      background: yellow;
    }

    /* .meiaEstrela{
      width: 20%;
      height: 50px;
      float: right;
      background: yellow;
      clip-path: polygon(50% 0%, 50% 26%, 50% 38%, 50% 57%, 50% 70%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
    } */

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

  <?= $avaliacoes ?>

  <section class="inicial">
    <nav class="menu">
      <img src="./img/Logo.png">
      <ul>
        <li><a href="https://cantasertao.wordpress.com/">Contatos</a></li>
        <li class="login">Login
          <form class="loginAcess" action="./login/index.php" method="POST">
            <input type="email" name="email" placeholder="Digite seu email"><br>
            <input type="password" name="senha" placeholder="Digite sua senha"><br>
            <input type="submit" class="butEnviar" value="Entrar">
          </form>
        </li>
        <li class="cadastro"><a href="./cadastro/cadastroArtista.php">Cadastro</a></li>
      </ul>
    </nav>
    <div class="conteudo">
      <ul class="listaPesquisa">
        <h2>Procure artistas para seu <br> evento de forma rápida e simples</h2>
        <form class="pesquisa" method="POST">
          <img src="./img/Search.png" height="35" width="35" alt="">
          <input type="text" name="pesquisa" placeholder="Pesquisar músicos">
        </form>
      </ul>
      <ul>
        <li><img src="./img/cadastro.png" alt=""></li>
        <li><img src="./img/gratis.png" alt=""></li>
      </ul>
    </div>
  </section>
  <section class="artistas">
    <section class="generos">
      <h3>GENÊROS</h3>
      <ul>
        <li>Forró</li>
        <li>Rock</li>
        <li>Pop</li>
        <li>Sertanejo</li>
      </ul>
  </section>
  <section class="avaliacoesSection">

    <h1>AVALIE NOSSOS MÚSICOS</h1>
    <?= $musicos ?>
    <!--  <div>
      <h2>Funalo de tal</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nihil minus cumque blanditiis pariatur accusamus qui error, natus dolorem cupiditate, inventore tempora vitae nobis cum nostrum! Ipsa eligendi vero vel?</p>
      <img src="./img/bgImagens/avaliacao-remove.png" alt="">
    </div>
    <div>
      <img src="./img/bgImagens/avaliacao-remove.png" alt="">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nihil minus cumque blanditiis pariatur accusamus qui error, natus dolorem cupiditate, inventore tempora vitae nobis cum nostrum! Ipsa eligendi vero vel?</p>
      <h2>Funalo de tal</h2>
    </div>
    <div>
      <h2>Funalo de tal</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nihil minus cumque blanditiis pariatur accusamus qui error, natus dolorem cupiditate, inventore tempora vitae nobis cum nostrum! Ipsa eligendi vero vel?</p>
      <img src="./img/bgImagens/avaliacao-remove.png" alt="">
    </div>
    <div>
      <img src="./img/bgImagens/avaliacao-remove.png" alt="">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nihil minus cumque blanditiis pariatur accusamus qui error, natus dolorem cupiditate, inventore tempora vitae nobis cum nostrum! Ipsa eligendi vero vel?</p>
      <h2>Funalo de tal</h2>
    </div> -->
  </section>
  <?php
  include("rodape.php");
  ?>
</body>

</html>