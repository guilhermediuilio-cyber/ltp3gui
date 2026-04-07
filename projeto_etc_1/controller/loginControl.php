<?php
// 1. Sair da pasta controller (../) 
// 2. Entrar na model/dao/ e model/dto/
require_once '../model/dao/UsuarioDao.php'; 
require_once '../model/dto/UsuarioDto.php'; 

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$usuarioDao = new UsuarioDao();
$sucesso = $usuarioDao->validarLogin($email, $senha);

if ($sucesso) {
    echo "<script>
            alert('Logado com sucesso!');
            window.location.href='../index.php'; // Volta para a raiz do projeto
          </script>";
} else {
    echo "<script>
            alert('Usuário não existe ou senha incorreta.');
            window.location.href='../view/login.php'; // Volta para a tela de login
          </script>";
}
?>