<?php
    include("conexao.php");

    $cpf_cnpj = $_POST['cpf_cnpj'];
    $nome = $_POST['nome'];
    $nome_empresa = $_POST['nome_empresa'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $data_entrada = date('Y/m/d');
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
    <link rel="stylesheet" href="../css/styleCM.css">
    <title>Cadastro - Músico</title>
</head>
<body>
    <h1>Cadastro - Músico</h1>
    <form action="" method="POST" class="form">
        <p>
            <input type="number" name="cpf_cnpj" placeholder="CPF ou CNPJ">
        </p>
        <p>
            <input type="text" name="nome" placeholder="Nome">
        </p>
        <p>
            <input type="text" name="nome_empresa" placeholder="Nome empresa">
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
            <input type="password" name="senha" placeholder="Senha">
        </p>
        <p>
            <button type="submit">Cadastrar</button>
        </p>
    </form>
</body>
</html>