<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleCM.css">
    <title>Cadastro - Contratante</title>
</head>
<body>
    <h1>Cadastro - Músico</h1>
    <form action="cadastrar.php" method="POST" class="form">
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
