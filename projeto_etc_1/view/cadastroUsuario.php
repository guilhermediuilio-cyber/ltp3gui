<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Usuário</title>
    </head>

<body> 

<center>
 
    <h1>Cadastro de Usuário</h1>
        <form action="../controller/CadastroUsuarioControl.php" method="POST">
  
<!-- Nome -->
   <label for="nome">Nome:</label><br>
      <input type="text" name="nome" required><br><br>
  
<!-- Idade -->
   <label for="idade">Idade:</label><br>
      <input type="text" name="idade" required><br><br>
  
<!-- E-mail -->
   <label for="email">E-mail:</label><br>
      <input type="email" name="email" required><br><br>
  
<!-- Senha -->
   <label for="senha">Senha:</label><br>
      <input type="password" name="senha" required><br><br>
  
<!-- Botão de envio -->
   <input type="submit" value="Cadastrar">
      </form>

      <br>
      <a href="ListarUsuarios.php">
         <button type="button">Ver Usuarios Cadastrador</button>
      </a>

      <br><br>
      <a href="login.php">
         <button type="button">Login</button>
      </a>

    </center>
</body>
</html>
