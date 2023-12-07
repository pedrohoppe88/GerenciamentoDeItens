<?php
@session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['grupo_id']) || !isset($_SESSION['grupo_nome'])) {
    header('Location: ../pageNewGroup.php');
    exit();
}

$grupoID = $_SESSION['grupo_id'];

include_once '../model/conexaoPDO.php';

try {
    $conexao = new Conexao();
    $conn = $conexao->getConnection();

    $stmtVerificaGrupo = $conn->prepare('SELECT IDUsuario FROM usuariosgrupos WHERE IDUsuario = :userID AND IDGrupo = :grupoID');
    $stmtVerificaGrupo->bindParam(':userID', $_SESSION['login']);
    $stmtVerificaGrupo->bindParam(':grupoID', $grupoID);
    $stmtVerificaGrupo->execute();

    if ($stmtVerificaGrupo->rowCount() == 0) {
        header('Location: ../pageNewGroup.php');
        exit();
    }

} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
    exit();
}
?>
