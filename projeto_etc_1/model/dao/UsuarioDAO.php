<?php

//require_once "../model/Conexao.php";
//require_once "../model/dto/UsuarioDTO.php";

// Correção aqui:
//$diretorioModel = realpath(__DIR__ . '/../');
//echo "Conteúdo da pasta model: <br>";
//print_r(scandir($diretorioModel)); 
//echo "<br>---<br>";

  require_once __DIR__ . '/../Conexao.php';
  require_once __DIR__ . '/../dto/UsuarioDTO.php';

class UsuarioDAO {
  private $pdo = null;
  
   public function __construct() {
  $this->pdo = Conexao::getInstance();
 }
 Public function listarUsuarios() {
    try {
    $sql = "SELECT * FROM usuario;";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna como array associativo
    return $retorno;
    } catch (PDOException $e) {
    echo "Erro ao listar usuários: " . $e->getMessage();
    return [];
    }
   }
 public function cadastrarUsuario(UsuarioDTO $usuarioDTO) {
 try {
 $sql = "INSERT INTO usuario (nome, idade, email, senha)
 VALUES (:nome, :idade, :email, :senha)";
 $stmt = $this->pdo->prepare($sql);
 
 // Pegando os dados do objeto DTO
    $nome = $usuarioDTO->getNome();
    $idade = $usuarioDTO->getIdade();
    $email = $usuarioDTO->getEmail();
    $senha = $usuarioDTO->getSenha();
 
 // Inserindo os valores nos tokens
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":idade", $idade);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":senha", $senha);
 // Executando a query
 $result = $stmt->execute();
    return $result;
 
   } catch (PDOException $e) {
    echo "Erro ao cadastrar usuário: " . $e->getMessage();
      return false;
 }
 }
 // --- CORREÇÃO DA AULA 11 ---
 public function excluirUsuario($id) {
   try {
       $sql = "DELETE FROM usuario WHERE id = :id";
       $stmt = $this->pdo->prepare($sql); // Alterado de 'conexao' para 'pdo'
       $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       return $stmt->execute();
   } catch (PDOException $e) {
       echo "Erro ao excluir: " . $e->getMessage();
       return false;
   }
}
// 1. Busca um usuário específico para preencher o formulário de edição
public function buscarUsuarioPorID($id) {
   try {
       $sql = "SELECT * FROM usuario WHERE id = :id";
       $stmt = $this->pdo->prepare($sql);
       $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
       return $stmt->fetch(PDO::FETCH_ASSOC); 
   } catch (PDOException $e) {
       return null;
   }  
}

// 2. Executa o UPDATE no banco com os novos dados
public function alterarUsuario(UsuarioDTO $usuarioDTO) {
   try {
       $sql = "UPDATE usuario SET nome = :nome, idade = :idade, email = :email, senha = :senha WHERE id = :id";
       $stmt = $this->pdo->prepare($sql);

       $stmt->bindValue(':nome', $usuarioDTO->getNome());
       $stmt->bindValue(':idade', $usuarioDTO->getIdade());
       $stmt->bindValue(':email', $usuarioDTO->getEmail());
       $stmt->bindValue(':senha', $usuarioDTO->getSenha());
       $stmt->bindValue(':id', $usuarioDTO->getId(), PDO::PARAM_INT);

       return $stmt->execute();
   } catch (PDOException $e) {
       echo "Erro ao alterar usuário: " . $e->getMessage();
       return false;
   }
}
public function validarLogin($email, $senha) {
  try {
  $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
  $stmt = $this->pdo->prepare($sql);
  $stmt->bindValue(':email', $email);
  $stmt->bindValue(':senha', $senha);
  $stmt->execute();
 
  // Se existir algum registro, login é válido
  if ($stmt->rowCount() > 0) {
  return true;
  }
  return false;
  } catch (PDOException $e) {
  // Aqui você pode logar o erro ou tratar da forma que quiser
  return false;
  }
 }
}
?>