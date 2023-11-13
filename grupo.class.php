<?php
    require_once 'model/conexaoPDO.php';

    class grupos
    {
        private $conn;

        public function __contruct()
        {   
            $conexao = new Conexao();
            $this->conn = $conexao->getConnection();
        }

        public function register($nome, $url, $senha)
        {
            $check = $this->conn->prepare("");
            $check->bindParam(':nome', $nome);
            $check->execute();

            if($check-rowCount() > 0)
            {
                return "nome do grupo já em uso";
            }

            $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

            $insertGrupoQuery = "INSERT INTO grupos()";
            $stmt = $this->conn->prepare($insertGrupoQuery);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':URL', $URL); // URL da imagem
            $stmt->bindParam(':senha', $hashedSenha);

            if($stmt->execute())
            {
                return "Registro bem-sucedido.";
            } else {
                return "Erro durante o registro.";
            }

        }

    }

?>