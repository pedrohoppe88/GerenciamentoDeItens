<?php
require_once 'model/conexaoPDO.php';

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

$usuario_id = $_SESSION['login'];

$conexao = new Conexao();
$conn = $conexao->getConnection();

// Obter todos os grupos
$stmt = $conn->prepare('SELECT * FROM grupos');
$stmt->execute();

$grupos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos</title>
</head>
<body>
    <h1>Grupos</h1>
    <ul>
        <?php foreach ($grupos as $grupo): ?>
            <li>
                <form action="processa_entrada_grupo.php" method="post">
                    <input type="hidden" name="usuario_id" value="<?= $usuario_id ?>">
                    <input type="hidden" name="grupo_id" value="<?= $grupo['ID'] ?>">
                    <strong><?= $grupo['NomeGrupo'] ?></strong>
                    <p><?= $grupo['Descricao'] ?></p>
                    <button type="submit">Entrar no Grupo</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="itens.php">Ver Meus Grupos</a>
</body>
</html>
