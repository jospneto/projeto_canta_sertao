<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/css/styleEdicao.css">
    <title>Editor de midias</title>
</head>
<body>
    <form id="form">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Senha</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Endereço</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Nome fantasia</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Nome do cantor ou da banda">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Genêro músical</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Genêro musical do músico">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Cachê</label>
        <input type="number" class="form-control" id="inputAddress2" placeholder="Valor cobrado por show/evento participado">
    </div>
    <div id="buttons">
        <button type="submit" class="btn btn-danger btn-lg">Alterar</button>
        <a href="painelMusico.php"><button type="button" class="btn btn-danger btn-lg">Voltar</button></a>
    </div>
    </form>
</body>
</html>