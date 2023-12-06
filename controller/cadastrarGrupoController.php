<?php

include_once "../controller/cadastrarGrupo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomeGrupo = $_POST["nomeGrupo"];
    $senha = $_POST["senha"];
    $descricao = $_POST["descricao"];
    $urlImg = isset($_POST["urlImg"]) ? $_POST["urlImg"] : null;

    $grupo = new Grupo();

    $resultado = $grupo->criarGrupo($nomeGrupo, $senha, $descricao, $urlImg);

    echo $resultado;
} else {
    header("Location: formulario.php");
    exit();
}


?>