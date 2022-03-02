<?php
    include("conexao.php");
    if(isset($_POST['cpf_cnpj']) || isset($_POST['nome_fantasia']) || isset($_POST['email']) || isset($_POST['endereco']) || 
    isset($_POST['telefone']) || isset($_POST['genero_musical']) || isset($_POST['cache_show']) || isset($_POST['senha'])){
        if(strlen($_POST['cpf_cnpj']) == 0) {
            echo "Preencha seu CPF ou CNPJ";
        }else if(strlen($_POST['nome_fantasia']) == 0){
            echo "Preencha seu nome fantasia";
        }else if(strlen($_POST['email'] == 0)){
            echo "Preencha seu email";
        }else if(strlen($_POST['endereco'] == 0)){
            echo "Preencha seu endereço";
        }else if(strlen($_POST['telefone'] == 0)){
            echo "Preencha seu telefone";
        }else if(strlen($_POST['genero_musical'] == 0)){
            echo "Preencha o genêro musical";
        }else if(strlen($_POST['cache_show'] == 0)){
            echo "Preencha o valor do seu cachê";
        }else if(strlen($_POST['senha'] == 0)){
            echo "Preencha sua senha";
        }else{
            $cpf_cnpj = $conexao->real_escape_string($_POST['cpf_cnpj']);
            $nome_fantasia = $conexao->real_escape_string($_POST['nome_fantasia']);
            $email = $conexao->real_escape_string($_POST['email']);
            $endereco = $conexao->real_escape_string($_POST['endereco']);
            $telefone = $conexao->real_escape_string($_POST['telefone']);
            $data_entrada = NOW();
            $genero_musical = $conexao->real_escape_string($_POST['genero_musical']);
            $cache_show = $conexao->real_escape_string($_POST['cache_show']);
            $senha = $conexao->real_escape_string(md5($_POST['senha']));

            $sql_code = "INSERT INTO user_musico values ('$cpf_cnpj', '$nome_fantasia', 
            '$email', '$endereco', '$telefone', '$genero_musical', '$data_entrada', '$cache_show', '$senha')";
            
            if(mysqli_query($conexao, $sql_code)){
                echo"Usuário cadastrado com sucesso!";
            }else{
                echo "Erro" . mysqli_connect_error($conexao);
            }
            mysqli_close($conexao);
        }
    }
?>
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
        <input type="number" name="telefone" id="inputNumber" class="form-control" placeholder="Telefone" required>
        <label for="inputNumber" class="sr-only">Cachê do show</label>
        <input type="number" name="cache_show" id="inputNumber" class="form-control" placeholder="Seu cachê" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-danger btn-block" type="submit">Cadastrar</button>
        </form>
    </body>
</html>