<?php
      //se tiver qualquer coisa via post
      if($_POST) {

            //entra aqui para pegar os valores
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            //executar a consulta
            if($email == 'admim@admim' && $senha == '123')  {
                  
                  //Abrir a sessão
                  session_start();
                  $_SESSION['login'] = $email;

                  header('location:../home.php');
            } else {
                  //login invalido
                  header('location:../index.php?cod=171');
            }
      } else {
            //redireciona para a index
            header('location:../index.php');
      }
?>