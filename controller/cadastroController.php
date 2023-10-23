<?php

require_once '../usuarios.class.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $email = $_POST['email'];
    $password = $_POST['senha'];

    if (empty($email) || empty($password))
    {
        die("Dados inválidos.");
    }

    $user = new Usuario();

    if ($user->register($email, $password)) {

        session_start();
        $_SESSION['login'] = $email;
        header('location:../home.php'); 
       
    } else {
        header("Location: erro_registro.php");
        exit();
    }
}

?>
