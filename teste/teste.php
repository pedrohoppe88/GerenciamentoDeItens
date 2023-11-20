<?php
include_once "../controller/loginController.php";

session_start(); // Adicionado: iniciar a sessão

if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
    $userID = $_SESSION['login'];

    $conexao = new Conexao();
    $conn = $conexao->getConnection();

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE ID = :userID");
    $stmt->bindParam(':userID', $userID); // Corrigido: usar bindParam para passar o valor
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<p>' . $row['Nome'] . '</p>';
    }
    echo "giyfg";
} else {
    echo "erro";
}
?>
