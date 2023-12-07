<?php
session_start();

include_once 'model/conexaoPDO.php'; 

$conexao = new Conexao();
$conn = $conexao->getConnection();

$stmt = $conn->prepare('SELECT * FROM grupos');
$stmt->execute();
$grupos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #282c34;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            color: #61dafb;
        }

        .btn-primary {
            background-color: #61dafb;
            border-color: #61dafb;
        }

        .btn-primary:hover {
            background-color: #4fa3d1;
            border-color: #4fa3d1;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .card {
            width: 650px;
            background-color: #343a40;
            color: #fff;
            border: 2px solid #61dafb;
            border-radius: 15px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            width: 250px;
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            color: #61dafb;
        }

        .card-text {
            opacity: 0.8;
        }

        .modal-content {
            background-color: #343a40;
            color: #fff;
            border: 2px solid #61dafb;
            border-radius: 15px;
        }

        .modal-header {
            border-bottom: 2px solid #61dafb;
        }

        .modal-title {
            color: #61dafb;
        }

        .form-group label {
            color: #61dafb;
        }

        .form-control {
            background-color: #282c34;
            color: #fff;
            border: 2px solid #61dafb;
        }

        .form-control:focus {
            background-color: #343a40;
            color: #fff;
            border: 2px solid #61dafb;
        }
    </style>
</head>
<body>

    <!-- Navbar superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Grupos</a>
        <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#modalGrupos">
            Entrar em um Grupo
        </button>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-center">

            <?php foreach ($grupos as $grupo): ?>
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <img src="<?= $grupo['urlImg'] ?>" class="card-img-top" alt="<?= $grupo['NomeGrupo'] ?>">
                        
                        <div class="card-body">
                            <h5 class="card-title"><?= $grupo['NomeGrupo'] ?></h5>
                            <p class="card-text"><?= $grupo['Descricao'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <!-- Modal para todos os grupos -->
    <div class="modal fade" id="modalGrupos" tabindex="-1" role="dialog" aria-labelledby="modalGruposLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGruposLabel">Entrar em um Grupo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="controller/grupoController.php" method="POST">
                        <div class="form-group">
                            <label for="nome_grupo">Nome do Grupo:</label>
                            <input type="text" class="form-control" id="nome_grupo" name="nome_grupo" required>
                        </div>
                        <div class="form-group">
                            <label for="senha_grupo">Senha do Grupo:</label>
                            <input type="password" class="form-control" id="senha_grupo" name="senha_grupo" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>  
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap
