<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);

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

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleLogin.css?v=1.0">
    <title>Login</title>
</head>
<body>
    <div class="box">
        <h1 class="titulo">Acesse sua conta</h1>
        <form action="" method="POST" class="form">
            <p>
                <label>E-mail: </label>
                <input type="text" name="email" placeholder="@gmail.com">
            </p>
            <p>
                <label>Senha: </label>
                <input type="password" name="senha" placeholder="Senha">
            </p>
            <p>
                <button type="submit">Entrar</button>
            </p>
        </form>
    </div>
</body>
</html>