<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Criar ou Entrar em um Grupo</title>
      <!-- Bootstrap Dependencies -->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    #animation-container {
      font-size: 24px;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    button {
      width: 280px;
      margin: 0px 20px;
      margin-top: 20px;
      padding: 10px;
      font-size: 18px;
      background-color: #007bff;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s;
    }

    button:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }
  </style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">  
</head>
<body>

<div class="container">
  <h1>Criar ou Entrar em um Grupo</h1>
  <div id="animation-container"></div>
  <div class="btnClass">
    <button id="create-group" data-toggle="modal" data-target="#createModal">Criar Grupo</button>
    <button id="join-group" data-toggle="modal" data-target="#joinGroupModal">Entrar em um Grupo Existente</button>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" name="createModal" id="createModal" role="dialog">
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
                                <label for="email">Nome Do Grupo</label>
                                <input class="form-control" name="gruponame" value= "" placeholder="Insira Aqui o nome do Grupo" required>

                            </div>

                            <div class="form-group">
                                <label for="password">Imagem-URL</label>
                                <input type="text" class="form-control" id="img" name="img"
                                    placeholder="Insira Aqui o URL da imagem do Grupo" required="">
                            </div>

                            <div class="form-group">
                                <label for="password">Descrição</label>
                                <input type="password" class="form-control" id="descricao" name="descricao"
                                    placeholder="Insira Aqui a Descrição do Grupo" required="">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script>

  
  $(document).ready(function() {
    var animationContainer = $("#animation-container");
    var animationText = "Crie ou Junte-se a um Grupo";
    var animationIndex = 0;

    function animateText() {
      if (animationIndex < animationText.length) {
        animationContainer.text(animationContainer.text() + animationText.charAt(animationIndex));
        animationIndex++;
        setTimeout(animateText, 100);
      } else {
        setTimeout(function() {
          animationContainer.fadeOut(1000, function() {
            animationContainer.empty().fadeIn(1000);
            animationIndex = 0;
            animateText();
          });
        }, 1000);
      }
    }

    animateText();
  });
</script>
</body>
</html>
