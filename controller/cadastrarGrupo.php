<?php
require_once "model/conexePDO.php";

class Grupo 
{
    private $conn;

    public function __construct()
    {
        $conexao = new Conexao();
        $this-> = $conexao->getConnection();
    }

    public function registerGroup($NomeGrupo, $urlImg, $descricao) 
    {
        $check = $this->conn->prepare("");
        $check = bindParam(':NomeGrupo', $NomeGrupo);
        $check->execute();
    }

    if($check->rowCount() > 0) 
    {
        return "email já existente";
    }

    $groupQuery = "";
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


?>