<?php
// Captura os dados do formulário


// Só executa se a requisição for do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Captura os dados (usando ?? null para evitar o erro de chave inexistente)
    $nome = $_POST["nome"] ?? null;
    $idade = $_POST["idade"] ?? null;
    $email = $_POST["email"] ?? null;
    $senha = $_POST["senha"] ?? null;

// Importa as classes necessárias
//require_once "../model/dto/UsuarioDTO.php";
//require_once "../model/dao/UsuarioDAO.php";
// Cria e preenche o DTO

// Correção aqui:
require_once __DIR__ . '/../model/dto/UsuarioDTO.php';
require_once __DIR__ . '/../model/dao/UsuarioDAO.php';

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setNome($nome);
$usuarioDTO->setIdade($idade);
$usuarioDTO->setEmail($email);
$usuarioDTO->setSenha($senha);
// Cria o DAO e tenta cadastrar
$usuarioDAO = new UsuarioDAO();
$sucesso = $usuarioDAO->cadastrarUsuario($usuarioDTO);
// Exibe popup e redireciona
if ($sucesso) {
 echo "<script>
 alert('Usuário cadastrado com sucesso!');
 window.location.href = '../view/CadastroUsuario.php';
 </script>";
} else {
 echo "<script>
 alert('Erro ao cadastrar usuário. Tente novamente.');
 window.history.back(); // Ou redirecione para outra página de erro
 </script>";
}
}

?>