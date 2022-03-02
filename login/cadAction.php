<?php
    session_start();
    include('conexao.php');
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero_musical = $_POST['genero_musical'];
    $cache_show = $_POST['cache_show'];
    $senha = $_POST['senha'];
    $data_entrada = NOW();

    $sql_code = "INSERT INTO user_musico values ('$cpf_cnpj', '$nome_fantasia', 
    '$email', '$endereco', '$telefone', '$genero_musical', '$data_entrada', '$cache_show', '$senha')";

    if(mysqli_query($conexao, $sql_code)){
        $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
        header("Location: cadastro.php");
    }else{
        $_SESSION['msg'] = "Erro".mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>