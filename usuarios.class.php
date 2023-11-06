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
            // Email já está em uso, retorne um erro
            return "Email já está em uso.";
        }

        // Hash da senha
        $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir o novo usuário com consultas preparadas
        $insertUserQuery = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($insertUserQuery);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hashedPassword);

        if ($stmt->execute()) {
            // Registro bem-sucedido
            return "Registro bem-sucedido.";
        } else {
            // Erro durante o registro
            return "Erro durante o registro.";
        }
    }
}