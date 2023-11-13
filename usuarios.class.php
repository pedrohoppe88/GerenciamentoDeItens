<?php
require_once 'model/conexaoPDO.php';

class Usuario {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();
    }

    public function register($nome, $email, $senha) {
        // Verificar se o email já está em uso
        $check = $this->conn->prepare("SELECT id FROM usuarios WHERE email = :email");
        $check->bindParam(':email', $email);
        $check->execute();

        if ($check->rowCount() > 0) {
            return "Email já está em uso.";
        }

        $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

        $insertUserQuery = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($insertUserQuery);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hashedSenha);

        if ($stmt->execute()) {
            return "Registro bem-sucedido.";
        } else {
            return "Erro durante o registro.";
        }
    }

    public function getName()
    {
        return $nome;
    }
}