<?php

session_start(); // as sessions servem para compartilhar conteudo para paginas diferentes
//Se não existir a session login
if(!isset($_SESSION['login'])) {
      header('location:index.php?cod=172');
}

?>