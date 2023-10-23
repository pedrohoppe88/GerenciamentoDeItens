<?php
require_once 'model/conexaoPDO.php';
class Usuario {

    private $conn;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();
    }

    public function register($email, $senha)
    {
        $check = $this->conn->prepare("SELECT id FROM usuarios WHERE email = :email");
        $check->bindParam(':email', $email);
        $check->execute();

        if($check->rowCount() > 0) {
            return false; 
        }

        $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO usuarios (email, senha) VALUES (:email, :senha)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hashedPassword);

        return $stmt->execute();
    }
}

?>