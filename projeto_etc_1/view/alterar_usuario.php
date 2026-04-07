<?php
require_once "../model/dao/UsuarioDAO.php";

$id = $_GET['id'] ?? null;
if ($id) {
    $usuarioDAO = new UsuarioDAO();
    // Chama a função que criamos no seu DAO anteriormente
    $usuario = $usuarioDAO->buscarUsuarioPorID($id);
}

if (!$usuario) {
    die("Usuário não encontrado!");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Usuário</title>
</head>
<body>
    <h2>Alterar Usuário</h2>
    <form action="../controller/alterar_usuario_control.php" method="POST">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        Nome: <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required><br><br>
        Idade: <input type="number" name="idade" value="<?= $usuario['idade'] ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br><br>
        Senha: <input type="password" name="senha" value="<?= $usuario['senha'] ?>" required><br><br>

        <button type="submit">Salvar Alterações</button>
        <a href="ListarUsuarios.php">Cancelar</a>
    </form>
</body>
</html>