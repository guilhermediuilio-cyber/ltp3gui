<?php require_once "../controller/ListarUsuariosControl.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
 <style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: auto;
 }
    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
 }
    th {
        background-color: #eee;
 }
 </style>
</head>
<body>
    <h2 style="text-align: center;">Usuários Cadastrados</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Email</th>
            </tr>

            <?php foreach ($todosUsuarios as $usuario) { ?>
 
           <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['idade']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><a href="alterar_usuario.php?id=<?= $usuario['id'] ?>">
                    <button style="background-color: orange;">Alterar</button></a>
                    
                    <a href="../controller/excluir_usuario_control.php?id=<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                    <button>Excluir</button>
        </a>
    </td>
            </tr>
                <?php } ?>

        </table>

        <br>
        <div style="text-align: center; margin-top: 20px;">
            <a href="cadastroUsuario.php">
                <button type="button">Voltar</button>
            </a>
        </div>
    </body>
</html>