<?php
// Inclua o DAO e o DTO para que o PHP entenda essas classes
require_once __DIR__ . '/../model/dao/UsuarioDAO.php';
require_once __DIR__ . '/../model/dto/UsuarioDTO.php';

// Recebe os dados via POST (do formulário)
$id    = $_POST['id'];
$nome  = $_POST['nome'];
$idade = $_POST['idade'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// 1. Criar o objeto DTO e preencher com os novos dados
$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setId($id); // ISSO É ESSENCIAL!
$usuarioDTO->setNome($nome);
$usuarioDTO->setIdade($idade);
$usuarioDTO->setEmail($email);
$usuarioDTO->setSenha($senha);

// 2. Chamar o DAO para realizar o UPDATE
$usuarioDAO = new UsuarioDAO();
$sucesso = $usuarioDAO->alterarUsuario($usuarioDTO);

// 3. Verificar se funcionou e redirecionar
if ($sucesso) {
    echo "<script>
            alert('Usuário atualizado com sucesso!');
            window.location.href = '../view/ListarUsuarios.php';
          </script>";
} else {
    echo "<script>
            alert('Erro ao atualizar usuário no banco de dados.');
            window.location.href = '../view/ListarUsuarios.php';
          </script>";
}