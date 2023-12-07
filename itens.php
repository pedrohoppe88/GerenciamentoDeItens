<?php 
require_once 'model/conexaoPDO.php';




$db = new Conexao();
$conn = $db->getConnection();

$arrayTipo = [1 => 'N/A', 2 => 'Ferramentas', 3 => 'Armas', 4 => 'Comida', 5 => 'Remédio'];


if(isset($_GET['excluir'])){
    $id = filter_input(INPUT_GET, 'excluir', FILTER_SANITIZE_NUMBER_INT);
    
    if($id){
    $conn->exec('DELETE FROM itens WHERE id=' . $id);
    
    }

    header('Location: itens.php');
    exit;
    
    }

if ($conn) {

    $results = $conn->query('SELECT * FROM itens')->fetchAll();

    
    foreach ($results as $row) {
        //
    }
} else {
    // Exibe uma mensagem de erro se a conexão falhou
    echo "Erro na conexão com o banco de dados.";
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
    <h5>Itens</h5>
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
        <?php foreach($results as $item): ?>
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