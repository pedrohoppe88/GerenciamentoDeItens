<?php
if ($_POST) {
      $email = $_POST['email'];
      $senha = $_POST['senha'];

      if ($email == 'admim@admim' && $senha == '123') {
            session_start();
            $_SESSION['login'] = $email;

            if (isset($_POST['remember'])) { // apenas ferifica se ocorreu um post 'remember'
                  setcookie('email', $email, time() + (86400 * 30), "/"); 
            } else {
                  if (isset($_COOKIE['user_email'])) {
                        setcookie('email', '', time() - 3600, "/");
                  }
            }

            header('location:../home.php');
      } else {
            header('location:../index.php?cod=171'); //passndo uma query string de erro = '171'
      }

} else {
      header('location:../index.php?cod=171');
}

?>