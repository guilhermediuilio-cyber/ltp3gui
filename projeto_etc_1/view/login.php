<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="../controller/loginControl.php" method="POST">
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>

    <input type="submit" value="Logar">
</form>

    <h1>Cadastre a baixo</h1>
<br>
    <a href="cadastroUsuario.php">
         <button type="button">Cadastras</button>
      </a>

      <br>
    <a href="home.html">
         <button type="button">Voltar</button>
      </a>
</body>
</html>