<?php
if ($_POST) {
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      @$remember = $_POST['$remember'];

      if ($email == 'admim@admim' && $senha == '123') {
            session_start();
            $_SESSION['login'] = $email;

            if (isset($remember)) {
                  if ($remember == 1) {
                        setcookie('email', $email, time() + (86400 * 1), "/"); // 86400 = 1 day
                  } else {
                        if (isset($_COOKIE['email'])) {
                              setcookie("email", "", time() - 3600);
                        }
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