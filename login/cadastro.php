<?php
    include("conexao.php");

    $cpf_cnpj = $_POST['cpf_cnpj'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $data_entrada = NOW();
    $genero_musical = $_POST['genero_musical'];
    $cache_show = $_POST['cache_show'];
    $senha = $_POST['senha'];

    $sql_code = "INSERT INTO user_musico values ('$cpf_cnpj', '$nome_fantasia', 
    '$email', '$endereco', '$telefone', '$genero_musical', '$data_entrada', '$cache_show', '$senha')";
    
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
        <title>Cadastro - Músico</title>

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
        <label for="inputText" class="sr-only">Nome fantasia</label>
        <input type="text" name="nome_fantasia" id="inputText" class="form-control" placeholder="Nome empresa" required>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
        <label for="inputText" class="sr-only">Endereço</label>
        <input type="text" name="endereco" id="inputText" class="form-control" placeholder="Endereço" required>
        <label for="inputText" class="sr-only">Genêro musical</label>
        <input type="text" name="genero_musical" id="inputText" class="form-control" placeholder="Genêro musical" required>
        <label for="inputText" class="sr-only">Telefone</label>
        <input type="number" name="nome" id="inputNumber" class="form-control" placeholder="Telefone" required>
        <label for="inputNumber" class="sr-only">Cachê do show</label>
        <input type="number" name="cache_show" id="inputNumber" class="form-control" placeholder="Seu cachê" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-danger btn-block" type="submit">Cadastrar</button>
        </form>
    </body>
</html>