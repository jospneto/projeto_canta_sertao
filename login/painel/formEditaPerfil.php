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

        case 'warning':
            $mensagem = '<div class="alert alert-warning">Verifique os campos!</div>';
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
    <title>Editar dados</title>
</head>

<body>
    <section class="formSection">
        <form id="form" method="POST" class="border border-light">

            <?= $mensagem ?>

            <h2 class="text-light text-center">Edite seus dados</h2>

            <div class="form-row text-light">

                <div class="form-group col-md-6">            
                    <label for="inputEmail4">
                        Email<span class="text-danger">*</span>
                        <span class="text-danger"> <?= $vazio=="email"? "(Obrigatório)" : "" ?> </span>
                    </label>
                    <input type="email" class="form-control" value="<?= $usuario['email'] ?>" name="email" id="inputEmail4" placeholder="Email">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">
                        Senha<span class="text-danger">
                    </label>
                    <input type="password" class="form-control" name="senha" id="inputPassword4" placeholder="Senha">
                </div>

            </div>

            <div class="form-group text-light">
                <label for="inputAddress">
                    Endereço<span class="text-danger">*</span>
                    <span class="text-danger"><?= $vazio=="endereco"? "(Obrigatório)" : "" ?></span>
                </label>
                <input type="text" class="form-control" value="<?= $usuario['endereco'] ?>" name="endereco" id="inputAddress" placeholder="Rua exemplo, nº 0">
            </div>

            <div class="form-group text-light">
                <label for="inputAddress2">
                    Telefone<span class="text-danger">*</span>
                    <span class="text-danger"><?= $vazio=="telefone"? "(Obrigatório)" : "" ?></span>
                </label>
                <input type="text" class="form-control" value="<?= $usuario['telefone'] ?>" name="telefone" id="telefone" placeholder="Telefone do cantor ou da banda">
            </div>

            <div class="form-group text-light">
                <label for="inputAddress2">
                    Nome fantasia<span class="text-danger">*</span>
                    <span class="text-danger"><?= $vazio=="nome_fantasia"? "(Obrigatório)" : "" ?></span>
                </label>
                <input type="text" class="form-control" value="<?= $usuario['nome_fantasia'] ?>" name="nome_fantasia" id="inputAddress2" placeholder="Nome do cantor ou da banda">
            </div>

            <div class="form-group text-light">
                <label for="inputAddress2">
                    Genêro músical<span class="text-danger">*</span>
                    <span class="text-danger"><?= $vazio=="genero_musical"? "(Obrigatório)" : "" ?></span>
                </label>
                <input type="text" class="form-control" value="<?= $usuario['genero_musical'] ?>" name="genero_musical" id="inputAddress2" placeholder="Genêro musical do músico">
            </div>

            <div class="form-group text-light">
                <label for="inputAddress2">
                    Cachê<span class="text-danger">*</span>
                    <span class="text-danger"><?= $vazio=="cache_show"? "(Obrigatório)" : "" ?></span>
                </label>
                <input type="number" class="form-control" value="<?= $usuario['cache_show'] ?>" name="cache_show" id="inputAddress2" placeholder="Valor cobrado por show/evento participado">
            </div>

            <div id="buttons">
                <button type="submit" class="btn btn-danger btn-sm">Alterar</button>
                <a href="painelMusico.php"><button type="button" class="btn btn-danger btn-sm">Voltar</button></a>
            </div>

        </form>
    </section>
</body>
</html>