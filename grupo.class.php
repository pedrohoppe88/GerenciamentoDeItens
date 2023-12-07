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


        $sqlCheckLogin = "SELECT 1 FROM usuariosGrupos WHERE IDUsuario = :idUsuario AND IDGrupo = :idGrupo";
        $stmt = $conn->prepare($sqlCheckLogin);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->bindParam(':idGrupo', $idGrupo, PDO::PARAM_INT);
        $stmt->execute();

        if (!$stmt->fetch()) {
            
            $stmt = $conn->prepare($sqlAddToGroup);
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':idGrupo', $idGrupo, PDO::PARAM_INT);
            $stmt->execute();

            echo "Usuário adicionado ao grupo com sucesso!";
        } else {

            echo "Usuário já faz parte do grupo.";
        }
    }

    public function fazerLoginNoGrupo($email, $senha, $idGrupo)
    {
        $conn = $this->conexao->getConnection();


        $sqlCheckCredentials = "SELECT ID FROM usuarios WHERE Email = :email AND Senha = :senha";
        $stmt = $conn->prepare($sqlCheckCredentials);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            
            $idUsuario = $result['ID'];
            $this->adicionarUsuarioAoGrupo($idUsuario, $idGrupo);
            echo "Login no grupo realizado com sucesso! ID do usuário: " . $idUsuario . ", ID do grupo: " . $idGrupo;
            
            return ['idUsuario' => $idUsuario, 'idGrupo' => $idGrupo];
        } else {
           
            echo "Credenciais incorretas ou usuário não encontrado.";
            return ['idGrupo' => null]; 
        }
    }
}

?>
