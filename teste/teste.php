<?php
session_start();

include_once "../controller/loginController.php";

if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
    $userID = $_SESSION['login'];

    $conexao = new Conexao();
    $conn = $conexao->getConnection();

    // Obtendo informações do usuário
    $stmtUsuario = $conn->prepare("SELECT * FROM usuarios WHERE ID = :userID");
    $stmtUsuario->bindParam(':userID', $userID);
    $stmtUsuario->execute();

    // Obtendo informações do grupo específico
    $grupoID = $_GET['id_grupo']; // Supondo que você tenha o ID do grupo via GET
    $grupoNome = '';
    $itensDoGrupo = [];

    $stmtGrupo = $conn->prepare('SELECT * FROM grupos WHERE ID = :grupo_id');
    $stmtGrupo->bindParam(':grupo_id', $grupoID);
    $stmtGrupo->execute();

    $grupo = $stmtGrupo->fetch(PDO::FETCH_ASSOC);

    if ($grupo) {
        $grupoNome = $grupo['NomeGrupo'];

        $stmtItens = $conn->prepare('SELECT * FROM itens WHERE IDGrupo = :grupo_id');
        $stmtItens->bindParam(':grupo_id', $grupoID);
        $stmtItens->execute();

        $itensDoGrupo = $stmtItens->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Seu cabeçalho HTML aqui -->
</head>
<body>
    <!-- Seu corpo HTML aqui -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- ... Seu código de navegação ... -->
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Seu código de barra lateral aqui -->

            <!-- Conteúdo principal -->
            <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <!-- Seu código de conteúdo principal aqui -->
                <div class="row">
                    <?php if ($grupoNome): ?>
                        <div class="col-sm-12 mb-4">
                            <h2>Grupo: <?= $grupoNome ?></h2>
                        </div>
                        <?php foreach ($itensDoGrupo as $item): ?>
                            <div class="col-sm-3">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $item['NomeItem'] ?></h5>
                                        <p class="card-text"><?= $item['Descricao'] ?></p>
                                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-sm-12">
                            <p>O usuário não está em nenhum grupo.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Seu código de scripts e bibliotecas aqui -->
</body>
</html>
