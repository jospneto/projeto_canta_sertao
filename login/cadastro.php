<?php
    include("conexao.php");

    $cpf_cnpj = $_POST['cpf_cnpj'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $data_entrada = date('Y/m/d');
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
    <title>Cadastro - Músico</title>
</head>
<body>
    <h1>Cadastro - Músico</h1>
    <form action="" method="POST">
        <p>
            <input type="number" name="cpf_cnpj" placeholder="CPF ou CNPJ">
        </p>
        <p>
            <input type="text" name="nome_completo" placeholder="Nome fantasia">
        </p>
        <p>
            <input type="email" name="email" placeholder="E-mail">
        </p>
        <p>
            <input type="text" name="endereco" placeholder="Endereco">
        </p>
        <p>
            <input type="text" name="telefone" placeholder="Telefone">
        </p>
        <p>
            <input type="text" name="genero_musical" placeholder="Genero Musical">
        </p>
        <p>
            <input type="number" name="cache_show" placeholder="Cache do show">
        </p>
        <p>
            <input type="password" name="senha" placeholder="Senha">
        </p>
        <p>
            <button type="submit">Cadastrar</button>
        </p>
    </form>
</body>
</html>