<?php session_start()?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/Logo.png">
    <link rel="stylesheet" href="/css/style.css">
    <title>Cadastro</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
        <form class="form-signin" method="POST" action="cadAction.php">
        <img class="mb-2" src="/img/Logo.png" alt="">
        <h1 class="h3 mb-3 font-weight-normal">Faça seu cadastro</h1>
        <?php 
            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
        ?>
        <label for="inputNumber" class="sr-only">CPF ou CNPJ</label>
        <input type="number" name="cpf_cnpj" id="inputNumber" class="form-control" placeholder="Seu CPF ou CNPJ" required autofocus>
        <label for="inputText" class="sr-only">Nome fantasia</label>
        <input type="text" name="nome_fantasia" id="inputText" class="form-control" placeholder="Nome fantasia" required>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
        <label for="inputText" class="sr-only">Endereço</label>
        <input type="text" name="endereco" id="inputText" class="form-control" placeholder="Endereço" required>
        <label for="inputText" class="sr-only">Genêro musical</label>
        <input type="text" name="genero_musical" id="inputText" class="form-control" placeholder="Genêro musical" required>
        <label for="inputText" class="sr-only">Telefone</label>
        <input type="number" name="telefone" id="inputNumber" class="form-control" placeholder="Telefone" required>
        <label for="inputNumber" class="sr-only">Cachê do show</label>
        <input type="number" name="cache_show" id="inputNumber" class="form-control" placeholder="Seu cachê" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-danger btn-block" type="submit">Cadastrar</button>
        </form>
    </body>
</html>