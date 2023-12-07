<?php
session_start();

include_once '../model/conexaoPDO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grupoNome = $_POST['nome_grupo'];
    $senha_grupo = $_POST['senha_grupo'];
    $userID = $_SESSION['login'];

    $conexao = new Conexao();
    $conn = $conexao->getConnection();

    try {
        $stmtGrupo = $conn->prepare('SELECT ID, senha, NomeGrupo FROM grupos WHERE NomeGrupo = :grupo_nome');
        $stmtGrupo->bindParam(':grupo_nome', $grupoNome);
        $stmtGrupo->execute();
        $grupo = $stmtGrupo->fetch();
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
        exit();
    }

    // Verifica se a senha fornecida corresponde ao hash armazenado
    if ($grupo && password_verify($senha_grupo, $grupo['senha'])) {
        $_SESSION['grupo_id'] = $grupo['ID'];
        $_SESSION['grupo_nome'] = $grupo['NomeGrupo'];

        // Verifica se o usuário já está no grupo
        $stmtVerificaUsuarioGrupo = $conn->prepare('SELECT * FROM usuariosgrupos WHERE IDUsuario = :userID AND IDGrupo = :grupoID');
        $stmtVerificaUsuarioGrupo->bindParam(':userID', $userID);
        $stmtVerificaUsuarioGrupo->bindParam(':grupoID', $_SESSION['grupo_id']);
        $stmtVerificaUsuarioGrupo->execute();

        if ($stmtVerificaUsuarioGrupo->rowCount() == 0) {
            // Insere o usuário no grupo
            $stmtUsuarioGrupo = $conn->prepare('INSERT INTO usuariosgrupos (IDUsuario, IDGrupo) VALUES (:userID, :grupoID)');
            $stmtUsuarioGrupo->bindParam(':userID', $userID);
            $stmtUsuarioGrupo->bindParam(':grupoID', $_SESSION['grupo_id']);
            $stmtUsuarioGrupo->execute();
        }

        header('Location: ../teste/home.php');
        exit();
    } else {
        // Trata o caso em que a senha está incorreta ou o grupo não foi encontrado
        $errorMessage = "Senha incorreta ou grupo não encontrado.";
        header('Location: listarGrupos.php?error=' . urlencode($errorMessage));
        exit();
    }
} else {
    header('Location: listarGrupos.php');
}


?>
