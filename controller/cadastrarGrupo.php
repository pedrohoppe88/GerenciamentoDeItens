<?php
require_once "model/conexaoPDO.php";

class Grupo 
{
    private $conn;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();
    }

    public function registerGroup($NomeGrupo, $urlImg, $descricao) 
    {
        $checkQuery = "SELECT * FROM sua_tabela WHERE NomeGrupo = :NomeGrupo";
        $check = $this->conn->prepare($checkQuery);
        $check->bindParam(':NomeGrupo', $NomeGrupo);
        $check->execute();

        if($check->rowCount() > 0) 
        {
            return "Nome do grupo já existente";
        }

        $groupQuery = "INSERT INTO sua_tabela (NomeGrupo, urlImg, descricao) VALUES (:NomeGrupo, :urlImg, :descricao)";
        $stmt = $this->conn->prepare($groupQuery);
        $stmt->bindParam(':NomeGrupo', $NomeGrupo);
        $stmt->bindParam(':urlImg', $urlImg);
        $stmt->bindParam(':descricao', $descricao);

        if($stmt->execute())
        {
            return "Registro bem-sucedido.";
        } else {
            return "Erro durante o registro.";
        }
    }
}

?>
