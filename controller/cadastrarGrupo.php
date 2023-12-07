<?php
require_once "../model/conexaoPDO.php";

class Grupo 
{
    private $conn;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();
    }

    public function criarGrupo($nomeGrupo, $senha, $descricao, $urlImg = null) 
    {
        if ($this->verificarExistenciaGrupo($nomeGrupo)) {
            return "Erro: Já existe um grupo com esse nome.";
            header("Location: ../showGroups.php");
        }

        $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

        $query = "INSERT INTO grupos (NomeGrupo, Senha, Descricao, UrlImg) VALUES (:nomeGrupo, :senha, :descricao, :urlImg)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nomeGrupo', $nomeGrupo);
        $stmt->bindParam(':senha', $hashedSenha);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':urlImg', $urlImg);

        try {
            $stmt->execute();
            return "Grupo criado com sucesso.";
        } catch (PDOException $e) {
            return "Erro ao criar o grupo. Detalhes: " . $e->getMessage();
        }
    }

    private function verificarExistenciaGrupo($nomeGrupo)
    {
        $query = "SELECT ID FROM grupos WHERE NomeGrupo = :nomeGrupo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nomeGrupo', $nomeGrupo);
        $stmt->execute();

        return $stmt->rowCount() > 0; // é a mesma coisa do que o if, mas como tem que retornar fiz assim e funcionou
    }

    public function entrarNoGrupo($idUsuario, $idGrupo)
    {
        $query = "INSERT INTO usuariosGrupos (IDUsuario, IDGrupo) VALUES (:idUsuario, :idGrupo)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->bindParam(':idGrupo', $idGrupo);

        return $stmt->execute() ? "Entrou no grupo com sucesso." : "Erro ao entrar no grupo.";
    }

    public function listarItensDoGrupo($idGrupo)
    {
        $query = "SELECT ID, NomeItem FROM itens WHERE IDGrupo = :idGrupo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idGrupo', $idGrupo);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGrupoPorID($idGrupo)
    {
        $query = "SELECT ID, NomeGrupo, Descricao FROM grupos WHERE ID = :idGrupo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idGrupo', $idGrupo);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarGrupos()
    {
        $query = "SELECT ID, NomeGrupo, Descricao FROM grupos";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pesquisarGrupos($termoPesquisa)
    {
        $query = "SELECT ID, NomeGrupo, Descricao FROM grupos WHERE NomeGrupo LIKE :termoPesquisa";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':termoPesquisa', '%' . $termoPesquisa . '%', PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarGruposUsuario($idUsuario)
    {
        $query = "SELECT g.ID, g.NomeGrupo, g.Descricao FROM grupos g
                  INNER JOIN usuariosGrupos ug ON g.ID = ug.IDGrupo
                  WHERE ug.IDUsuario = :idUsuario";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
