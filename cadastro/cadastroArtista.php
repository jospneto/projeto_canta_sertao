<?php session_start()?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/Logo.png">
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <title>Cadastro</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center" class="conteudo">
        <img class="mb-4 col-5" src="../img/Logo.png" alt="">
        <form class="form-signin" method="POST" action="cadAction.php">
        <h1 class="h2 font-weight-small text-light">Faça seu cadastro</h1>
        <?php 
            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
        ?>
        <section id="campos">
          <label for="inputNumber" class="sr-only">CPF ou CNPJ</label>
          <input type="number" name="cpf_cnpj" id="inputNumber" class="form-control" placeholder="Seu CPF ou CNPJ" required autofocus>
          <label for="inputText" class="sr-only">Nome fantasia</label>
          <input type="text" name="nome_fantasia" id="inputText" class="form-control" placeholder="Nome fantasia" required>
          <label for="inputEmail" class="sr-only">Email</label>
          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
          <label for="inputText" class="sr-only">Endereço</label>
          <input type="text" name="endereco" id="inputText" class="form-control" placeholder="Endereço" required>
          <label for="inputText" class="sr-only">Genêro musical</label>
          <!-- <input type="checkbox" name="genero_musical" id="inputText" class="form-control" value="forró" placeholder="Genêro musical" required> -->
          <div class="form-check text-left" id="generos">
            <div>
              <input class="form-check-input" type="checkbox" name="genero_musical" value="forró" id="flexCheckDefault"><h5>Forró</h5>
            </div>
            <div>
              <input class="form-check-input" type="checkbox" name="genero_musical" value="rock" id="flexCheckDefault"><h5>Rock</h5>
            </div>
            <div>
              <input class="form-check-input" type="checkbox" name="genero_musical" value="pop" id="flexCheckDefault"><h5>Pop</h5>
            </div>
            <div>
              <input class="form-check-input" type="checkbox" name="genero_musical" value="sertanejo" id="flexCheckDefault"><h5>Sertanejo</h5>
            </div>
            <div>
              <input class="form-check-input" type="checkbox" name="genero_musical" value="axé" id="flexCheckDefault"><h5>Axé</h5>
            </div>
            <div>
              <input class="form-check-input" type="checkbox" name="genero_musical" value="pagode" id="flexCheckDefault"><h5>Pagode</h5>
            </div>
          </div>
          <label for="inputText" class="sr-only">Telefone</label>
          <input type="number" name="telefone" id="inputNumber" class="form-control" placeholder="Telefone" required>
          <label for="inputNumber" class="sr-only">Cachê do show</label>
          <input type="number" name="cache_show" id="inputNumber" class="form-control" placeholder="Seu cachê" required autofocus>
          <label for="inputPassword" class="sr-only">Senha</label>
          <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
          <div id="termos_uso">
            <input type="checkbox" name="termos" class="form-control">
            <h6 class="text-break text-light">Li aceito os termos de uso da plataforma</h6>
            <h6 class="text-break text-light"><a href="../login/login.php">Já possui cadastro? Realize o login</a></h6>
          </div>
          <button class="btn btn-lg btn-danger btn-block" type="submit">Cadastrar</button>
        </section>
        </form>
        <?php
          //require_once "../rodape.php"
        ?>
  </body>
</html>