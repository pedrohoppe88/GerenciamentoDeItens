<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>

      body{
        background-image: linear-gradient(to left bottom, gray, black);

      }

        .area-login {
            display:flex;
            justify-content: center;
            height: 100vh;
            margin-top: 150px;
        }

        .login{
            background-color:#181920 ;
            width: 455px;
            height: 600px;
            padding: 35px;
            border-radius: 10px

        }

        .login form
        {
            display: flex;
            flex-direction: column;
        }

        .login input {
            margin-top:10px;
            background-color: #252A34;
            border: none;
            height: 45px;
            outline: none;
            border-radius: 8px;
        }

        .login button {
            color: #fff;
            margin-top:15px;
            background-color: #252A34;
            outline: none;
            border: none;
        }

        .linkcard {
          text-decoration:none;
          width: 100%;
	display: flex;
	align-items: center;
	justify-content: flex-start;
        }
.reg {
  color: white;
}
<<<<<<< Updated upstream
=======
        


>>>>>>> Stashed changes

    </style>

</head>
<body>


<section>
    <div class="area-login">
        <div class="login">
        <h2 style="color:#fff;" >Criar Grupo</h2>

<form action="controller/cadastrarGrupoController.php" method="post">
    <label style="color:#fff;" for="nomeGrupo">Nome do Grupo:</label>
    <input type="text" class="form-control" id="nomeGrupo" name="nomeGrupo" required><br>

    <label style="color:#fff;" for="senha">Senha:</label>
    <input type="password" class="form-control" id="senha" name="senha" required><br>

    <label style="color:#fff;" for="descricao">Descrição:</label>
    <textarea id="descricao" class="form-control" name="descricao" rows="2" required></textarea><br>

    <label style="color:#fff;" for="urlImg">URL da Imagem:</label>
    <input type="text" class="form-control" id="urlImg" name="urlImg"><br>

    <input type="submit" style="color:#fff;" value="Criar Grupo">
<<<<<<< Updated upstream
    <br>
    <a class="linkcard" href="showGroups.php">Ver grupos já existentes</a> 
=======
>>>>>>> Stashed changes
</form>
        </div>
        
    </div>

</section>

</body>
</html>