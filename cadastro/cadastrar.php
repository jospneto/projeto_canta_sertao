<?php
    include("conexao.php");

    if(isset($_POST)){
        echo "Preencha os dados do formulário";
    }else{     
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
    }
?>