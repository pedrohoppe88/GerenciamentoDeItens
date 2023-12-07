<?php 
require_once 'model/conexaoPDO.php';

$db = new Conexao();
$conn = $db->getConnection();

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
    echo $IDGrupo;
} else {
    echo 'não entrou';
}

if(isset($_GET['id'])){
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    if(!$id) {
        header('Location: itens.php');
        exit;
    }

    $stm = $conn->prepare('SELECT * FROM itens WHERE id=:id AND WHERE IDGrupo=:IDGrupo ');
    $stm->bindValue(':id', $id);
    $stm->execute();
    $result = $stm->fetch();

    if(!$result){
        header('Location: itens.php');
        exit;
    }

    $img = $result['img'];
    $NomeItem = $result['NomeItem'];
    $Tipo = $result['Tipo'];
    $Quantidade = $result['Quantidade'];
    $Descricao = $result['Descricao'];
}


if(isset($_POST['id'])) {
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $img = filter_input(INPUT_POST, "img", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $NomeItem = filter_input(INPUT_POST, "NomeItem", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Tipo = filter_input(INPUT_POST, "Tipo", FILTER_SANITIZE_NUMBER_INT);
    $Quantidade = filter_input(INPUT_POST, "Quantidade", FILTER_SANITIZE_NUMBER_INT);
    $Descricao = filter_input(INPUT_POST, "Descricao", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $IDGrupo = filter_input(INPUT_POST, "IDGrupo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    $stm = $conn->prepare("INSERT INTO itens(img, NomeItem, Tipo, Quantidade, Descricao, IDGrupo) VALUES (:img,:NomeItem,:Tipo,:Quantidade,:Descricao, :IDGrupo)");
    $stm->bindValue(':img', $img);
    $stm->bindValue(':NomeItem', $NomeItem);
    $stm->bindValue(':Tipo', $Tipo);
    $stm->bindValue(':Quantidade', $Quantidade);
    $stm->bindValue(':Descricao', $Descricao);
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
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<main class="container">
    <div class="card mt-4">
<div class="card-header d-flex justify-content-between align-items-center">
<h5>Itens do Grupo: <?= $_SESSION['grupo_nome'] ?></h5>
    <a class="btn btn-success" href="cadastroitens.php">Adicionar</a>
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
        </tr>
    </thead>
    <tbody>
    <?php foreach ($itens as $item) : ?>
        <tr>
<td><img src="<?= $item['img']?>" alt="Imagem do Item" style="max-width: 100px; max-height: 100px;"></td>
<td><?= $item['NomeItem']?></td>
<td><?= $arrayTipo[$item['Tipo']]?></td>
<td><?= $item['Quantidade']?></td>
<td><?= $item['Descricao']?></td>
<td>
            <a class="btn btn-sm btn-primary" href="cadastroitens.php?id=<?= $item['id']?>">Editar</a>
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
