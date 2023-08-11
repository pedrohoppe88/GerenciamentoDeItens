<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Gerenciamento de Itens - DayZ</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        nav-link {
            color: red;
        }

        .feature-icon {
            color: #017C75;
            margin-bottom: 20px;
        }

        footer {
            background: #017C75;
        }

        .carousel-item {
            height: 75vh;
            min-height: 350px;
            background: no-repeat center center scroll;
            background-size: cover;
        }

        .feature-card {
            transition: transform 0.2s;
        }

        .feature-card:hover {
            transform: scale(1.05);
        }

        .carousel-caption h2, p{
            color: #fff;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark shadow-sm">
    <a class="navbar-brand" href="#">DayZ Itens</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Início</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Itens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sair</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Banner Principal (Carrossel) -->
<div id="mainCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.trueachievements.com%2Fcustomimages%2Fl%2F093177.jpg&f=1&nofb=1&ipt=5e1f6206e11df5e5e8db46ab25d0c1e8a65d75c30d968494c4dc25278efe416a&ipo=images');">
            <div class="carousel-caption d-none d-md-block">
                <h2>Gerenciamento de Itens</h2>
                <p>Domine o mundo de DayZ com nosso sistema.</p>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.cdkeypt.pt%2Fwp-content%2Fuploads%2Fdayz-banner2-1024x576.jpg&f=1&nofb=1&ipt=078601e0ba708d421ba4148b2a48cfb406097fa56d8b246356db0e98137521bb&ipo=images');">
            <div class="carousel-caption d-none d-md-block">
                <h2>Organize Seu Inventário</h2>
                <p>Esteja sempre preparado para qualquer desafio.</p>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url('path_to_image3.jpg');">
            <div class="carousel-caption d-none d-md-block">
                <h2>Planeje Suas Estratégias</h2>
                <p>Com nossa plataforma, sobreviver nunca foi tão fácil.</p>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
</div>

<!-- Funcionalidades (usando cards) -->
<section class="container my-5">
    <h2 class="text-center mb-5">Funcionalidades</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card feature-card">
                <i class="fas fa-backpack fa-3x feature-icon text-center mt-3"></i>
                <div class="card-body">
                    <h4 class="card-title text-center">Inventário</h4>
                    <p class="card-text">Gerencie seus itens facilmente, garantindo que nunca ficará sem suprimentos.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card">
                <i class="fas fa-search fa-3x feature-icon text-center mt-3"></i>
                <div class="card-body">
                    <h4 class="card-title text-center">Pesquisa de Itens</h4>
                    <p class="card-text">Encontre qualquer item em segundos. Nunca mais perca um item valioso!</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card">
                <i class="fas fa-user fa-3x feature-icon text-center mt-3"></i>
                <div class="card-body">
                    <h4 class="card-title text-center">Perfil</h4>
                    <p class="card-text">Personalize suas preferências e mantenha seu perfil atualizado.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rodapé -->
<footer class="text-white text-center py-4">
    <p>&copy; 2023 DayZ Itens. Todos os direitos reservados.</p>
    <small>Desenvolvido com ❤️ para a comunidade DayZ</small>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome (para os ícones) -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>