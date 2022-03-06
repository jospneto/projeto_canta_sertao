<?php
    include("conexao.php");
    session_start();
    if(isset($_POST['cpf_cnpj'])){    
        $cpf_cnpj = $_POST['cpf_cnpj'];
        $nome = $_POST['nome'];
        $nome_empresa = $_POST['nome_empresa'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $data_entrada = date('Y/m/d');
        $senha = md5($_POST['senha']);

        $sql_code = "INSERT INTO user_contratante values ('$cpf_cnpj', '$nome', '$nome_empresa', 
        '$email', '$endereco', '$telefone', '$data_entrada', '$senha')";

        if(mysqli_query($conexao, $sql_code)){
            $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
        }else{
            $_SESSION['msg'] = "Erro".mysqli_connect_error($conexao);
            header("Location: cadastroContra.php");
        }
        mysqli_close($conexao);
    }else{
        echo"Preencha o formulário";
    }
?>