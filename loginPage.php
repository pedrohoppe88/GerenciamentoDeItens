<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .area-login {
            display:flex;
            justify-content: center;
            height: 100vh;
            margin-top: 150px;
        }

        .login{
            background-color:#181920 ;
            width: 455px;
            height: 470px;
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


    </style>

</head>
<body>

<section>
    <div class="area-login">
        <div class="login">
        <form method="post" action="controller/loginController.php">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="senha">Password:</label>
      <input type="password" class="form-control" id="senha" placeholder="Enter password" name="senha">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
        </div>
    </div>
</section>

</body>
</html>