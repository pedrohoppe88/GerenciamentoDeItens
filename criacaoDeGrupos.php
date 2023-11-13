<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Criar ou Entrar em um Grupo</title>
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
    <button id="create-group" data-toggle="modal" data-target="#createGroupModal">Criar Grupo</button>
    <button id="join-group" data-toggle="modal" data-target="#joinGroupModal">Entrar em um Grupo Existente</button>
  </div>
</div>

<div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createGroupModalLabel">Criar Grupo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p>Insira os detalhes para criar um novo grupo aqui.</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Criar Grupo</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="joinGroupModal" tabindex="-1" role="dialog" aria-labelledby="joinGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="joinGroupModalLabel">Entrar em um Grupo Existente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Insira os detalhes para entrar em um grupo existente aqui.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Entrar no Grupo</button>
      </div>
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
