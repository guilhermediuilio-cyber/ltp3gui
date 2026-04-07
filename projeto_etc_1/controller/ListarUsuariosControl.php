<?php
require_once "../model/dao/UsuarioDAO.php";
$usuarioDAO = new UsuarioDAO();
$todosUsuarios = $usuarioDAO->listarUsuarios();
?>