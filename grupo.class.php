<?php

require_once 'model/conexaoPDO.php';

class GrupoLogin
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function adicionarUsuarioAoGrupo($idUsuario, $idGrupo)
    {
        $conn = $this->conexao->getConnection();

        // Verificar se o usuário já fez login no grupo
        $sqlCheckLogin = "SELECT 1 FROM usuariosGrupos WHERE IDUsuario = :idUsuario AND IDGrupo = :idGrupo";
        $stmt = $conn->prepare($sqlCheckLogin);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->bindParam(':idGrupo', $idGrupo, PDO::PARAM_INT);
        $stmt->execute();

        if (!$stmt->fetch()) {
            // O usuário ainda não fez login no grupo, adicionar ao grupo
            $sqlAddToGroup = "INSERT INTO usuariosGrupos (IDUsuario, IDGrupo) VALUES (:idUsuario, :idGrupo)";
            $stmt = $conn->prepare($sqlAddToGroup);
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':idGrupo', $idGrupo, PDO::PARAM_INT);
            $stmt->execute();

            echo "Usuário adicionado ao grupo com sucesso!";
        } else {
            // Usuário já fez login no grupo
            echo "Usuário já faz parte do grupo.";
        }
    }

    public function fazerLoginNoGrupo($email, $senha, $idGrupo)
    {
        $conn = $this->conexao->getConnection();

        // Verificar as credenciais do usuário
        $sqlCheckCredentials = "SELECT ID FROM usuarios WHERE Email = :email AND Senha = :senha";
        $stmt = $conn->prepare($sqlCheckCredentials);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // O usuário existe e as credenciais estão corretas, fazer login no grupo
            $idUsuario = $result['ID'];
            $this->adicionarUsuarioAoGrupo($idUsuario, $idGrupo);
            echo "Login no grupo realizado com sucesso! ID do usuário: " . $idUsuario . ", ID do grupo: " . $idGrupo;
            
            return ['idUsuario' => $idUsuario, 'idGrupo' => $idGrupo];
        } else {
            // Credenciais incorretas ou usuário não encontrado
            echo "Credenciais incorretas ou usuário não encontrado.";
            return ['idGrupo' => null]; // Retornar um array com 'idGrupo' definido como null se o login falhar
        }
    }
}

?>
