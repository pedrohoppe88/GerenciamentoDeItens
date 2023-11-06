<?php

require_once '../usuarios.class.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome']; 
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($nome) || empty($email) || empty($senha)) {
        die("Dados inválidos."); 
    }

    $user = new Usuario();

    $result = $user->register($nome, $email, $senha); 

    if ($result === "Registro bem-sucedido.") {
        session_start();
        $_SESSION['login'] = $email;
        header('location: ../home.php'); 
        exit();
    } else {
        header("Location: erro_registro.php?error=");
        exit();
    }
}

?>