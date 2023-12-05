<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Gerenciador de Itens DayZ</title>

    <!-- Bootstrap Dependencies -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .custom-navbar {
            background-color: #343a40;
            /* Dark Gray */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .custom-navbar .nav-link {
            color: #FFFFFF;
            transition: color 0.3s ease;
        }

        .custom-navbar .nav-link:hover {
            color: #FFD700;
            /* Golden color for hover effect */
        }

        /* Carousel custom styles */

        .carousel-item {
            max-width: 100%;
            width: 100%;
            height: 51rem;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 8px;
        }

        /* Card custom styles */
        .custom-card {
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .custom-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        /* Call to Action */
        .btn-primary {
            background-color: #FFD700;
            /* Golden color */
            border: none;
        }

        .btn-primary:hover {
            background-color: #ffb300;
        }

        /* Newsletter Signup */
        .bg-light {
            background-color: #f9f9f9 !important;
            /* Slightly different light gray for differentiation */
        }

        .form-control {
            box-shadow: none;
        }

        /* Footer */
        footer {
            margin-top: 50px;
        }

        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
        }

        .container {
            margin-bottom: 60px;
            /* Increasing spacing between sections */
        }

        /* Navbar */
        .custom-navbar {
            background-color: #343a40;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .custom-navbar .nav-link {
            color: #ecf0f1;
            transition: color 0.3s ease;
        }

        .custom-navbar .nav-link:hover {
            color: #FFD700;
        }

        /* Carousel */
        .carousel-caption {

            max-width: 100%;
            background-color: rgba(44, 62, 80, 0.7);
            border-radius: 8px;
        }

        /* Call to Action */
        .btn-primary {
            background-color: #e74c3c;
            border: none;
        }

        .btn-primary:hover {
            background-color: #c0392b;
        }

        /* Testimonials */
        blockquote {
            background-color: #ecf0f1;
            padding: 20px;
            border-left: 8px solid #e74c3c;
            border-radius: 8px;
        }

        /* Newsletter Signup */
        .bg-light {
            background-color: #ecf0f1;
        }

        .form-control {
            box-shadow: none;
            border: none;
            border-bottom: 2px solid #7f8c8d;
            border-radius: 0;
        }

        /* Footer */
        footer {
            background-color: #ecf0f1;
        }

        footer a {
            color: #ecf0f1;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #FFD700;
        }

        .container {
            margin: 80px auto;
            /* Uniformizando margens */
        }

        /* Ajustes para dispositivos móveis */
        @media (max-width: 1660px) {
            .carousel-item {
                height: auto;
                /* Ajustando o tamanho do carrossel para dispositivos móveis */
            }

            .blockquote {
                font-size: 14px;
                /* Ajustando o tamanho da fonte dos depoimentos para dispositivos móveis */
            }
        }

        /* Ajustes para dispositivos móveis */
        @media (max-width: 768px) {
            .carousel-item {
                height: auto;
                /* Ajustando o tamanho do carrossel para dispositivos móveis */
            }

            .blockquote {
                font-size: 14px;
                /* Ajustando o tamanho da fonte dos depoimentos para dispositivos móveis */
            }
        }

        @media (max-width: 768px) {
            .card-itens {
                margin: 32px;
            }
        }

        /* Melhorias na experiência do usuário */
        .carousel-caption {
            padding: 20px;
            /* Adicionando padding para uma melhor visualização do texto sobre as imagens */
        }

        .custom-card:hover {
            transform: translateY(-5px);
            /* Reduzindo o efeito hover nos cards para ser mais sutil */
        }

        .container mt-5 cards {
            margin-top: 50px;
        }

        section {
            margin-top: 100px;
            /* Aumenta a margem superior para cada seção */
        }

        .CardSection {
            margin-top: 170px;
        }

        .sectionCall {
            margin-top: 150px;
        }

        .sectionTestemunhas {
            margin-top: 160px;
        }

        .sectionNew {
            margin-top: 30px;
        }

      
        .alert {
  position: relative;
  top: 10;
  left: 0;
  width: auto;
  height: auto;
  padding: 10px;
  margin: 10px;
  line-height: 1.8;
  border-radius: 5px;
  cursor: hand;
  cursor: pointer;
  font-family: sans-serif;
  font-weight: 400;
}

.alertCheckbox {
  display: none;
}

:checked + .alert {
  display: none;
}

.alertText {
  display: table;
  margin: 0 auto;
  text-align: center;
  font-size: 16px;
}

.alertClose {
  float: right;
  padding-top: 5px;
  font-size: 10px;
}

.clear {
  clear: both;
}

.info {
  background-color: #EEE;
  border: 1px solid #DDD;
  color: #999;
}

.success {
  background-color: #EFE;
  border: 1px solid #DED;
  color: #9A9;
}

.notice {
  background-color: #EFF;
  border: 1px solid #DEE;
  color: #9AA;
}

.warning {
  background-color: #FDF7DF;
  border: 1px solid #FEEC6F;
  color: #C9971C;
}

.error {
  background-color: #FEE;
  border: 1px solid #EDD;
  color: #A66;
}

    </style>
<script>
$(document).ready(function() {

if(window.location.href.indexOf('#myModal') != -1) {
  $('#myModal').modal('show');
}

});
</script>


</head>

<body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <a class="navbar-brand" href="#">ItensDB</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
            <li class="nav-item"><a class="nav-link" href="loginPage.php">Login</a></li>
        </ul>
    </nav>

    
    <!-- Slider -->
    <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel" data-slide-to="1"></li>
        </ol>

        <?php
                                        @$cod = $_REQUEST['cod'];
                                        if (isset($cod)) {
                                            if ($cod == '171') {
                                                echo ("<script>alert('Erro: Credenciais Inválidas');</script>");
                                              
                                            
                                            }
                                        }
                                        ?>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.dayzrp.com%2Fuploads%2Fmonthly_2018_11%2FDlQvdTqW4AInjYs.jpg.d5a9ca254a5a5610c486778973dd03f5.jpg&f=1&nofb=1&ipt=3e99f936e50471a14b138e47fe3c2c8349826b66157742fd6d71ed14fb56e2c2&ipo=images"
                    alt="Image 1" class="d-block w-100 img-fluid">
                <div class="carousel-caption">
                    <h3>Gerencie seus itens</h3>
                    <p>Com eficiência e facilidade.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwallpapercave.com%2Fwp%2Fwp1886441.jpg&f=1&nofb=1&ipt=29382288f4b1fbaa94ea5dd567b3691ebd63967643b711e140cb5e75e03acf1b&ipo=images"
                    alt="Image 2" class="d-block w-100">
                <div class="carousel-caption">
                    <h3>Conecte-se com amigos</h3>
                    <p>Descubra o que eles têm no DayZ.</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#customCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#customCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <?php
                                        @$cod = $_REQUEST['cod'];
                                        if (isset($cod)) {
                                            if ($cod == '171') {
                                                echo ('<label>');
                                                echo ('<input type="checkbox" class="alertCheckbox" autocomplete="off" />');
                                                echo ('<div class="alert error">');
                                                echo ('  <span class="alertClose">X</span>');
                                                echo (' <span class="alertText">Erro! A Conta Não Foi Criada');
                                                echo ('  <br class="clear"/></span>');
                                                echo (' </div>');
                                                echo ('</label>');
                                            
                                            }
                                        }
                                        ?>

    <!-- Cards -->
    <section class="CardSection">
        <div class="container mt-5 card-itens">
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="custom-card">
                        <img src="path_to_card1_image.jpg" class="card-img-top" alt="Card Image 1">
                        <div class="card-body">
                            <h5 class="card-title">Título do Card 1</h5>
                            <p class="card-text">Descrição do card 1.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="custom-card">
                        <img src="path_to_card2_image.jpg" class="card-img-top" alt="Card Image 2">
                        <div class="card-body">
                            <h5 class="card-title">Título do Card 2</h5>
                            <p class="card-text">Descrição do card 2.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="custom-card">
                        <img src="path_to_card3_image.jpg" class="card-img-top" alt="Card Image 3">
                        <div class="card-body">
                            <h5 class="card-title">Título do Card 3</h5>
                            <p class="card-text">Descrição do card 3.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="sectionCall">

        <div class="container mt-5 text-center">
            <h2>Pronto para começar sua jornada?</h2>
            <p>Registre-se agora e explore todas as funcionalidades que oferecemos.</p>
            <!-- Button trigger modal -->
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Registrar-se</button>

            <!-- Modal -->
            <div class="modal fade" name="myModal" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Cadastro</h5>
                                    <form method="post" action="controller/cadastroController.php">
                                        <div class="form-group">
                                            <label for="email">Endereço de Email</label>
                                            <input class="form-control" name="email" type="email" value= "" placeholder="Email" required>

                                        </div>

                                        <div class="form-group">
                                            <label for="password">Nome</label>
                                            <input type="text" class="form-control" id="name" name="nome"
                                                placeholder="Nome" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Senha</label>
                                            <input type="password" class="form-control" id="password" name="senha"
                                                placeholder="Password" required="">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>

                                    

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        </div>


        </div>

    </section>

    <section class="sectionTestemunhas">

        <div class="container mt-5">
            <h2 class="text-center">O que os usuários estão dizendo</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>“A melhor plataforma para gerenciar meus itens no DayZ!”</p>
                        <footer class="blockquote-footer">Lucas</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>“Me conectei com meus amigos e agora jogamos de forma mais estratégica.”</p>
                        <footer class="blockquote-footer">Mariana</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>“Interface amigável e muito intuitiva.”</p>
                        <footer class="blockquote-footer">Gabriel</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="sectionNew">

        <div class="container mt-5 py-5 bg-light">
            <h2 class="text-center">Fique atualizado</h2>
            <p class="text-center">Inscreva-se em nossa newsletter para receber as últimas notícias e atualizações.</p>
            <form class="form-inline justify-content-center">
                <div class="form-group mb-2">
                    <input type="email" class="form-control" placeholder="Seu email aqui">
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-2">Inscrever-se</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>DayZ Itens</h5>
                    <p>Gerencie, conecte-se e jogue de forma inteligente.</p>
                </div>

                <div class="col-md-3">
                    <h5>Links úteis</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Sobre nós</a></li>
                        <li><a href="#" class="text-white">Suporte</a></li>
                        <li><a href="#" class="text-white">Termos de serviço</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contato</h5>
                    <p>contato@dayzitens.com</p>
                </div>

                <div class=" col-md-5">
                    <p>&copy; 2023 DayZ Itens. Todos os direitos reservados.</p>
                    <small>Desenvolvido com ❤️ para a comunidade DayZ</small>
                </div>

            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

</body>

</html>