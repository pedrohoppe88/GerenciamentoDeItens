<?php 
require_once 'model/conexaoPDO.php';

$db = new Conexao();
$conn = $db->getConnection();

$arrayTipo = [1 => 'N/A', 2 => 'Ferramentas', 3 => 'Armas', 4 => 'Comida', 5 => 'Remédio'];

$id = 0;
$img = '';
$NomeItem = '';
$Tipo = 0;
$Quantidade = 1;
$Descricao = '';
$IDGrupo = 0;

session_start();

if(isset($_SESSION['grupo_id'])) {
    $IDGrupo = $_SESSION['grupo_id'];
} else {
    echo 'não entrou';
}

$result = [];

if (!$id) {
    $stm = $conn->prepare('SELECT * FROM itens WHERE IDGrupo=:IDGrupo');
    $stm->bindValue(':IDGrupo', $IDGrupo);
    $stm->execute();
    $result = $stm->fetchAll();
} else {
    $stm = $conn->prepare("UPDATE itens SET img=:img, NomeItem=:NomeItem, Tipo=:Tipo, Quantidade=:Quantidade, Descricao=:Descricao WHERE id=:id AND IDGrupo=:IDGrupo");
    $stm->bindValue(':id', $id);
    $stm->bindValue(':img', $img);
    $stm->bindValue(':NomeItem', $NomeItem);
    $stm->bindValue(':Tipo', $Tipo);
    $stm->bindValue(':Quantidade', $Quantidade);
    $stm->bindValue(':Descricao', $Descricao);
    $stm->bindValue(':IDGrupo', $IDGrupo);
    $stm->execute();
}

if(isset($_GET['excluir'])) {
    $excluirId = filter_input(INPUT_GET, "excluir", FILTER_SANITIZE_NUMBER_INT);

    $stm = $conn->prepare('DELETE FROM itens WHERE id=:id AND IDGrupo=:IDGrupo');
    $stm->bindValue(':id', $excluirId);
    $stm->bindValue(':IDGrupo', $IDGrupo);
    $stm->execute();

    header('Location: itens.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Itens</title>
</head>

<style>
</style>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<main class="container">
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-stretch">
            <h5>Itens do Grupo: <?= $_SESSION['grupo_nome'] ?></h5>
            <div class="d-flex justify-content-left align-items-stretch">
            <a class="btn btn-primary justify-content-between" href="showGroups.php">Voltar aos Grupos</a>
            <a class="btn btn-success" href="cadastroitens.php">Adicionar</a>
</div>
        </div>
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>   
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $item) : ?>
                        <tr>
                            <td><img class="imgItens" src="<?= $item['img']?>" alt="Imagem do Item" style="max-width: 160px; max-height: 90px;"></td>
                            <td><?= $item['NomeItem']?></td>
                            <td><?= $arrayTipo[$item['Tipo']]?></td>
                            <td><?= $item['Quantidade']?></td>
                            <td><?= $item['Descricao']?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="cadastroitens.php?id=<?= $item['id']?>&IDGrupo=<?= $item['IDGrupo']?>">Editar</a>
                                <button class="btn btn-sm btn-danger" onclick="excluir(<?= $item['id'] ?>)">Excluir</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>  
    </div>
</main>

<script>
    function excluir(id) {
        if(confirm("Tem certeza que quer excluir o Item?")) {
            window.location.href = "itens.php?excluir=" + id; 
        }
    }
</script>

</body>
</html>
