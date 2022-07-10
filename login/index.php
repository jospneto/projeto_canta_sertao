<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $conexao->real_escape_string($_POST['email']);
        
        $senha = md5($conexao->real_escape_string($_POST['senha']));

        $sql_code = "SELECT * FROM user_musico WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['cpf_cnpj'] = $usuario['cpf_cnpj'];
            $_SESSION['nome_fantasia'] = $usuario['nome_fantasia'];

            header("Location: ./painel/painelMusico.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }
}
