<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div class="formulario">
        <img src="/img/Logo.png" alt="">
        <h1>Cadastre-se</h1>
        <form action="cadastroContra.php" method="POST">
            <label for="">CPF ou CNPJ</label>
            <input type="number" name="cpf_cnpj">
            <label for="">Nome</label>
            <input type="text" name="name">
            <label for="">Nome da empresa</label>
            <input type="text" name="nome_empresa">
            <label for="">Email</label>
            <input type="email" name="email">
            <label for="">Endereço</label>
            <input type="text" name="endereco">
            <label for="">Telefone</label>
            <input type="number" name="telefone">
            <label for="">Senha</label>
            <input type="password" name="senha">
            <input type="submit" value="Cadastre-se">
        </form>
    </div>
</body>
</html>