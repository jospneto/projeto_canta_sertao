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
    <h2>Adicione ou edite seus contatos/mídias sociais</h2>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Instagram</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="@fulano">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Spotify</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="link ou nome de usuário">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">YouTube</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Canal no YouTube">
    </div>
    <div class="form-group">
        <label for="inputAddress">Outras</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Outro veículo utilizado por você">
    </div>
    <div id="buttons">
        <button type="submit" class="btn btn-danger btn-lg">Alterar</button>
        <a href="painelMusico.php"><button type="button" class="btn btn-danger btn-lg">Voltar</button></a>
    </div>
    </form>
</body>
</html>