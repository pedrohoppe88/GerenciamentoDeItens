<!DOCTYPE html>
<html lang="en">
<head>

  <title>Gerenciameto de itens</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="CSS/style.css">

  <style>
    
  </style>

</head>
<body>

<nav class="navbar navbar-expand-md custom-navbar">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <h3>Dayz</h3>
        </li>
      </ul>
      
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Contato</a>
        </li>
      </ul>
      
        <button class="btn btn-primary" type="button">Conectar</button>
    </div>
  </div>
</nav>

  <section class="container-fluid mt-5 mb-5 text-white ">
      <div class="row bg-dark p-5">
          <div class="col-md-7">

            <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.trueachievements.com%2Fcustomimages%2Fl%2F093177.jpg&f=1&nofb=1&ipt=5e1f6206e11df5e5e8db46ab25d0c1e8a65d75c30d968494c4dc25278efe416a&ipo=images" alt="Los Angeles" class="d-block w-100">
  </div>
  <div class="carousel-item">
    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.datereliz.com%2Fwp-content%2Fuploads%2F2015%2F02%2Fdayz-art-02.jpg&f=1&nofb=1&ipt=8e208cd21eaa2fddd300fd1a84640afcdd9241e5807d3d0fe4128da3459a4f39&ipo=images" alt="Chicago" class="d-block w-100">
  </div>
  <div class="carousel-item">
    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fpreview.redd.it%2Fcvslzsngntf21.jpg%3Fauto%3Dwebp%26s%3Dceb3a0a8af65edb866228cf6e28674a34a30a423&f=1&nofb=1&ipt=e2c5bc3d695f889c1be04b65e94e54b6f025f5fe6e4a3535e3e8f8d05b7b62f6&ipo=images" alt="New York" class="d-block w-100">
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>

          </div>
          <div class="col-md-5">
          <div class="d-flex justify-content-center">
                <form method="post" action="controller/loginController.php">
                  <h1 class="display-4">Faça seu login aqui:</h1>
                    <div class="mb-3 mt-3">
                      <label for="email" class="form-label">Email:</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3">
                      <label for="pwd" class="form-label">Password:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="senha">
                    </div>

                      <input type="submit" class="btn btn-primary mb-5" id="bntLogin"></input>

                    </div>

                    <div class="d-grid">
                    <?php
                    //capturavam a variável query string "cod"
                    @$cod = $_REQUEST['cod'];
                    if (isset($cod)) {
                        if ($cod == '171') {
                            echo ('<br><div class="alert alert-danger">');
                            echo ('Verifique usuário ou senha.');
                            echo ('</div>');
                        } 
                    }
                    ?>
                </div>

                      
                  </form> 
          </div>
      </div>
  </section>

</body>
</html>
