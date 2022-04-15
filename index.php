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
  <section class="inicial">
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
    <h1>ARTISTAS RECEM CADASTRADOS</h1>
    <ul>
        <li><img src="./img/artistas/img1.png" alt=""><h3>Artista1</h3></li>
        <li><img src="./img/artistas/img2.png" alt=""><h3>Artista1</h3></li>
        <li><img src="./img/artistas/img3.png" alt=""><h3>Artista1</h3></li>
        <li><img src="./img/artistas/img4.png" alt=""><h3>Artista1</h3></li>
    </ul>
    <ul>
        <li><img src="./img/artistas/img1.png" alt=""><h3>Artista1</h3></li>
        <li><img src="./img/artistas/img2.png" alt=""><h3>Artista1</h3></li>
        <li><img src="./img/artistas/img3.png" alt=""><h3>Artista1</h3></li>
        <li><img src="./img/artistas/img4.png" alt=""><h3>Artista1</h3></li>
    </ul>
    <ul>
        <li><img src="./img/artistas/img1.png" alt=""><h3>Artista1</h3></li>
        <li><img src="./img/artistas/img2.png" alt=""><h3>Artista1</h3></li>
        <li><img src="./img/artistas/img3.png" alt=""><h3>Artista1</h3></li>
        <li><img src="./img/artistas/img4.png" alt=""><h3>Artista1</h3></li>
    </ul>
  </section>
  <?php
    include("rodape.php");
  ?>
</body>
</html>
