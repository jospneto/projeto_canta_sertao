<?php
    include("conexao.php");
    if(isset($_POST['cpf_cnpj']) || isset($_POST['nome_fantasia']) || isset($_POST['email']) || isset($_POST['endereco']) || 
    isset($_POST['telefone']) || isset($_POST['genero_musical']) || isset($_POST['cache_show']) || isset($_POST['senha'])){
        if(strlen($_POST['cpf_cnpj']) == 0) {
            echo "Preencha seu CPF ou CNPJ";
        }else if(strlen($_POST['nome_fantasia']) == 0){
            echo "Preencha seu nome fantasia";
        }else if(strlen($_POST['email'] == 0)){
            echo strlen($_POST['email']);
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
            
            if(!isset($_SESSION)){
                session_start();
            }
            if(mysqli_query($conexao, $sql_code)){
                $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
                header("Location: cadastro.php");
            }else{
                $_SESSION['msg'] = "Erro".mysqli_connect_error($conexao);
            }
            mysqli_close($conexao);
        }
    }
?>