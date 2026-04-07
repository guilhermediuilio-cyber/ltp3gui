<?php
// 1. Recebe o ID da URL
$id = $_GET['id'];

// 2. Importa o DAO e o DTO (ajuste os caminhos se necessário)
require_once "../model/dao/UsuarioDAO.php";

// 3. Instancia o DAO e chama a exclusão
$usuarioDAO = new UsuarioDAO();
$sucesso = $usuarioDAO->excluirUsuario($id);

// 4. Lógica de redirecionamento (Aula 11)
if ($sucesso) {
    // Retorna para a lista com um alerta de sucesso
    echo "<script>
            alert('Usuário excluído com sucesso!');
            window.location.href = '../view/ListarUsuarios.php';
          </script>";
} else {
    echo "<script>
            alert('Erro ao excluir usuário.');
            window.location.href = '../view/ListarUsuarios.php';
          </script>";
}
?>