<?php
require_once 'model/conexaoPDO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $grupo_id = $_POST['grupo_id'];

    $conexao = new Conexao();
    $conn = $conexao->getConnection();


    $stmt = $conn->prepare('SELECT * FROM usuariosgrupos WHERE IDUsuario = :usuario_id AND IDGrupo = :grupo_id');
    $stmt->bindParam(':usuario_id', $usuario_id);
    $stmt->bindParam(':grupo_id', $grupo_id);
    $stmt->execute();

    $usuario_no_grupo = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario_no_grupo) {
        // Adicionar o usuário ao grupo
        $stmt = $conn->prepare('SELECT NomeGrupo FROM grupos WHERE ID = :grupo_id');
$stmt->bindParam(':grupo_id', $grupo_id);
$stmt->execute();
$grupo = $stmt->fetch(PDO::FETCH_OBJ);  // Alterado para FETCH_OBJ para obter um objeto

// Criar a sessão com o nome do grupo
$_SESSION['grupo_nome'] = $grupo->NomeGrupo;

    }

    header('Location: gruposGG.php');
} else {
    header('Location: grupos.php');
}
?>