<?php
    session_start();
    include('conexao.php');
    $cpf_cnpj = filter_input(INPUT_POST, 'cpf_cnpj', FILTER_SANITIZE_NUMBER_INT);
    $nome_fantasia = filter_input(INPUT_POST, 'nome_fantasia', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
    $genero_musical = filter_input(INPUT_POST, 'genero_musical', FILTER_SANITIZE_STRING);
    $cache_show = filter_input(INPUT_POST, 'cache_show', FILTER_SANITIZE_NUMBER_FLOAT);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
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