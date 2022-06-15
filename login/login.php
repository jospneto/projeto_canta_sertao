<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/css/signin.css">
    <link rel="stylesheet" href="/css/styleLogPainel.css">
    <title>Login</title>
</head>
<body class="text-center">
    <form class="form-signin" action="/login/index.php" method="POST" id="campos">
      <img class="mb-4" src="/img/Logo.png" alt="" width="250" height="250">
      <h1 class="h3 mb-3 font-weight-normal text-light">Faça login</h1>
      <label for="inputEmail" class="sr-only">Endereço de email</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Seu email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
      <button class="btn btn-lg btn-danger btn-block text-light" type="submit">Login</button>
      <p class="mt-5 mb-3 text-light">&copy; 2022</p>
    </form>
</body>
</html>