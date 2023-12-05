<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Gerenciamento de Itens</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

      <style>
            #sidebar{
                  max-height: 100%;
                  height: 100vh;
            }


            .card:hover {
                  position: relative;
                  top: -5px;
                  transition: ease-in-out 0.5s;
                  cursor: pointer;

            }
      </style>

</head>
<?php
include_once "../controller/loginController.php";

session_start(); // Adicionado: iniciar a sessão

if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
    $userID = $_SESSION['login'];

    $conexao = new Conexao();
    $conn = $conexao->getConnection();

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE ID = :userID");
    $stmt->bindParam(':userID', $userID); // Corrigido: usar bindParam para passar o valor
    $stmt->execute();

} else {
    echo "erro";
}
?>


<body>

    <!-- Navbar superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Itens</a>
        <div class="ml-auto">
            <img src="url_da_foto_do_usuario" alt="" class="rounded-circle" width="40">
            <span class="text-white"><?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<span>' . $row['Nome'] . '</span>';
    }?></span>
        <span><a class="text-red" href="../controller/logoutController.php?cod=logout">Logout</a></span>

            
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Barra lateral completa -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar">
                <div class="position-sticky pt-4">

                    <!-- Navegação -->
                    <ul class="nav flex-column mt-4">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <span data-feather="home"></span>
                                Visão Geral
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../criacaoDeGrupos.php">
                                <span data-feather="layers"></span>
                                Grupos
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <span data-feather="plus"></span>
                                Adicionar Itens
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Conteúdo principal -->
             <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Visão Geral</h1>
                </div>

            <!-- Cards com os nomes das pessoas do grupo -->
                <div class="row">
                  <div class="col-sm-3">
                  <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                  </div>
                  </div>

                  <div class="col-sm-3">
                  <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                  </div>
                  </div>
                  </div>

            </div>  

      </div>
      </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>
</html>
