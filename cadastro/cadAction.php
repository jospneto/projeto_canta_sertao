<?php
    session_start();
    require_once "../login/Conexao.php";
    if(isset($_POST['cpf_cnpj'])){
        $cpf_cnpj = trim($_POST['cpf_cnpj']);
        $nome_fantasia = trim($_POST['nome_fantasia']);
        $email = trim($_POST['email']);
        $telefone = trim($_POST['telefone']);
        $genero_musical = trim($_POST['genero_musical']);
        $cache_show = trim($_POST['cache_show']);
        $senha = trim(md5($_POST['senha']));
        $data_entrada = trim(date('Y-m-d'));

        $sql_code = "INSERT INTO user_musico (cpf_cnpj, nome_fantasia, email, endereco, telefone, genero_musical, data_entrada, cache_show, senha)
        values ('$cpf_cnpj', '$nome_fantasia', 
        '$email', '$endereco', '$telefone', '$genero_musical', '$data_entrada', '$cache_show', '$senha')";

        if(mysqli_query($conexao, $sql_code)){
            $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
            header("Location: ../login/painel/painelMusico.php");
        }else{
            $_SESSION['msg'] = "Erro".mysqli_connect_error($conexao);
        }
        mysqli_close($conexao);
    }
?>