<?php
    include("conexao.php");

    $cpf_cnpj = $_POST['cpf_cnpj'];
    $nome = $_POST['nome'];
    $nome_empresa = $_POST['nome_empresa'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $data_entrada = NOW();
    $senha = $_POST['senha'];

    $sql_code = "INSERT INTO user_contratante values ('$cpf_cnpj', '$nome', '$nome_empresa', 
    '$email', '$endereco', '$telefone', '$data_entrada', '$senha')";
    
    if(mysqli_query($conexao, $sql_code)){
        echo"Usuário cadastrado com sucesso!";
    }else{
        echo "Erro" . mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/Logo.png">
    <link rel="stylesheet" href="/css/style.css">
    <title>Cadastro - Contratante</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="">
      <img class="mb-2" src="/img/Logo.png" alt="">
      <h1 class="h3 mb-3 font-weight-normal">Faça seu cadastro</h1>
      <label for="inputNumber" class="sr-only">CPF ou CNPJ</label>
      <input type="number" name="cpf_cnpj" id="inputNumber" class="form-control" placeholder="Seu CPF ou CNPJ" required autofocus>
      <label for="inputText" class="sr-only">Nome</label>
      <input type="text" name="nome" id="inputText" class="form-control" placeholder="Nome" required>
      <label for="inputText" class="sr-only">Nome da empresa</label>
      <input type="text" name="nome_empresa" id="inputText" class="form-control" placeholder="Nome empresa" required>
      <label for="inputEmail" class="sr-only">Email</label>
      <label for="inputText" class="sr-only">Endereço</label>
      <input type="text" name="endereco" id="inputText" class="form-control" placeholder="Endereço" required>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
      <label for="inputText" class="sr-only">Telefone</label>
      <input type="number" name="nome" id="inputNumber" class="form-control" placeholder="Telefone" required>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
      <button class="btn btn-lg btn-danger btn-block" type="submit">Cadastrar</button>
    </form>
  </body>
</html>