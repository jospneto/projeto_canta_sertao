<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Página Inicial</title>
</head>
<body>
  <nav class="menu">
    <img src="img/Logo.png">
    <ul>
      <li><a href="https://cantasertao.wordpress.com/">Contatos</a></li>
      <li class="login">Login
        <form class="loginAcess" action="/login/index.php" method="POST">
          <input type="email" name="email" placeholder="Digite seu email"><br>
          <input type="password" name="senha" placeholder="Digite sua senha"><br>
          <input type="submit" class="butEnviar" value="Entrar">
        </form>
      </li>
      <li class="cadastro"><a href="cadastroAcess.php">Cadastro</a></li>
    </ul>
  </nav>
  <div class="conteudo">
    <ul class="listaPesquisa">
      <h2>Procure artistas para seu <br> evento de forma rápida e simples</h2>
      <form action="" class="pesquisa">
        <img src="./img/Search.png" alt=""><input type="text" name="pesquisa" placeholder="Pesquisar músicos">
      </form>
    </ul>
    <ul>
      <li><img src="/img/cadastro.png" alt=""></li>
      <li><img src="img/gratis.png" alt=""></li>
    </ul>
  </div>
  <section class="artistas">
      <ul>
        <li><img src="" alt=""></li>
        <h3>Artista1</h3>
        <li><img src="" alt=""></li>
        <h3>Artista1</h3>
        <li><img src="" alt=""></li>
        <h3>Artista1</h3>
        <li><img src="" alt=""></li>
        <h3>Artista1</h3>
      </ul>
  </section>
  <?php
    include("rodape.php");
  ?>
</body>
</html>
