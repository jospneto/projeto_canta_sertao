
<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;

        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/signin.css">
    <link rel="stylesheet" href="../../css/styleEdicao.css">
    <title>Editor de midias</title>
</head>

<body>
    <form id="form" method="POST" class="border border-light">

        <?= $mensagem ?>

        <h2 class="text-light">Adicione ou edite seus contatos/mídias sociais</h2>
        <div class="form-row text-light">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Instagram</label>
                <input type="text" class="form-control" value="<?= $midias ? $midias['instagram'] : '' ?>" name="instagram" placeholder="@fulano">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Spotify</label>
                <input type="text" class="form-control" value="<?= $midias ? $midias['spotify'] : '' ?>" name="spotify" placeholder="link ou nome de usuário">
            </div>
        </div>
        <div class="form-group text-light">
            <label for="inputAddress">YouTube</label>
            <input type="text" class="form-control" value="<?= $midias ? $midias['youtube'] : '' ?>" name="youtube" placeholder="Canal no YouTube">
        </div>
        <div class="form-group text-light">
            <label for="inputAddress">Outras</label>
            <input type="text" class="form-control" value="<?= $midias ? $midias['outros'] : '' ?>" name="outros" placeholder="Outro veículo utilizado por você">
        </div>
        <div id="buttons">
            <button type="submit" class="btn btn-danger btn-lg">Salvar</button>
            <a href="painelMusico.php"><button type="button" class="btn btn-danger btn-lg">Voltar</button></a>
        </div>
    </form>
</body>

</html>