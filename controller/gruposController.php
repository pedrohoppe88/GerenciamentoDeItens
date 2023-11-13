<?php
include_once "../model/conexaoPDO.php";
session_start();

if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
    $userID = $_SESSION['login'];


$conexao = new Conexao();
$conn = $conexao->getConnection();

$stmt = $conn->prepare("SELECT grupos.ID, NomeGrupo, Descricao FROM grupos JOIN usuariosGrupos ON grupos.ID = usuariosGrupos.IDGrupo WHERE usuariosGrupos.IDUsuario = $userID");
$stmt->execute([$userID]);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<h3>' . $row['NomeGrupo'] . '</h3>';
    echo '<p>' . $row['Descricao'] . '</p>';

    displayGroupItems($row['ID']);
}

function displayGroupItems($groupID)
{
    $conexao = new Conexao();
    $conn = $conexao->getConnection();

    $stmt = $conn->prepare("SELECT * FROM itens WHERE IDGrupo = ");
    $stmt->execute([$groupID]);

    echo '<ul>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<li>' . $row['NomeItem'] . ': ' . $row['Descricao'] . '</li>';
    }
    echo '</ul>';
}
} else {
    echo "erro";
}

?>
