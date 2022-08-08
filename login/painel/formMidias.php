
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
    <link rel="stylesheet" href="../../css/styleMidias.css">
    <title>Editor de midias</title>
</head>

<body>
    <form id="form" method="POST" class="border border-light">

        <?= $mensagem ?>

        <h2 class="text-light">Adicione ou edite seus contatos/mídias sociais</h2>

        <div class="form-row text-light">
            <div class="form-group col-md-6">
                <label >Instagram</label>
                <input type="url" class="form-control" value="<?= $midias ? $midias['instagram'] : '' ?>" name="instagram" placeholder="https://www.instagram.com/fulano/">
            </div>

            <div class="form-group col-md-6">
                <label >Spotify</label>
                <input type="url" class="form-control" value="<?= $midias ? $midias['spotify'] : '' ?>" name="spotify" placeholder="https://open.spotify.com/artist/codespotify">
            </div>
            
        </div>

        <div class="form-group text-light">
            <label>YouTube</label>
            <input type="url" class="form-control" value="<?= $midias ? $midias['youtube'] : '' ?>" name="youtube" placeholder="https://www.youtube.com/channel/codecanal">
        </div>

        <div class="form-group text-light">
            <label >Outras</label>
            <input type="url" class="form-control" value="<?= $midias ? $midias['outros'] : '' ?>" name="outros" placeholder="https://www.exemplo.com/fulano">
        </div>

        <div id="buttons">
            <button type="submit" class="btn btn-danger btn-lg">Salvar</button>
            <a href="painelMusico.php"><button type="button" class="btn btn-danger btn-lg">Voltar</button></a>
        </div>

    </form>
</body>

</html>