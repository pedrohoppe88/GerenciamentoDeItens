<!DOCTYPE html>
<html lang="en">
<head>

      <?php
      require_once './controller/autenticationControler.php';
      ?>

      <?php
      @session_start();
      echo ('bem vindo '. $_SESSION['login']);
      ?>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
      <h1>teste HOME teste!</h1>
</body>
</html>