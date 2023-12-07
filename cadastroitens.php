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

if (isset($_SESSION['grupo_id'])) {
    $IDGrupo = $_SESSION['grupo_id'];
} else {
    echo 'error';
    exit;
}

if (isset($_POST['id'])) {
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $img = filter_input(INPUT_POST, "img", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $NomeItem = filter_input(INPUT_POST, "NomeItem", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Tipo = filter_input(INPUT_POST, "Tipo", FILTER_SANITIZE_NUMBER_INT);
    $Quantidade = filter_input(INPUT_POST, "Quantidade", FILTER_SANITIZE_NUMBER_INT);
    $Descricao = filter_input(INPUT_POST, "Descricao", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$id) {
        $stm = $conn->prepare("INSERT INTO itens(img, NomeItem, Tipo, Quantidade, Descricao, IDGrupo) VALUES (:img,:NomeItem,:Tipo,:Quantidade,:Descricao,:IDGrupo)");
    } else {
        $stm = $conn->prepare("UPDATE itens SET img=:img, NomeItem=:NomeItem, Tipo=:Tipo, Quantidade=:Quantidade, Descricao=:Descricao WHERE id=:id AND IDGrupo=:IDGrupo");
        $stm->bindValue(':id', $id);
    }

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

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $IDGrupo = filter_input(INPUT_GET, "IDGrupo", FILTER_SANITIZE_NUMBER_INT);
    if (!$id || $IDGrupo !== $_SESSION['grupo_id']) {
        header('Location: itens.php');
        exit;
    }

    $stm = $conn->prepare('SELECT * FROM itens WHERE id=:id AND IDGrupo=:IDGrupo');
    $stm->bindValue(':id', $id);
    $stm->bindValue(':IDGrupo', $IDGrupo);
    $stm->execute();
    $result = $stm->fetch();

    if (!$result) {
        header('Location: itens.php');
        exit;
    }

    $img = $result['img'];
    $NomeItem = $result['NomeItem'];
    $Tipo = $result['Tipo'];
    $Quantidade = $result['Quantidade'];
    $Descricao = $result['Descricao'];
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
    <h5><?= $id?'Editar Item' . $id:'Adicionar Item'?></h5>
</div>
<form method="post" autocomplete="off">
<div class="card-body">
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" name="IDGrupo" value="<?=$IDGrupo?>" />


<div class="form-group">
    <label for="img">URL da Imagem</label>
    <input type="text" class="form-control" id="img" name="img" value="<?=$img?>"required />
</div>
<div class="form-group">
    <label for="NomeItem">Nome do item</label>
    <input type="text" class="form-control" id="NomeItem" name="NomeItem" value="<?=$NomeItem?>" required />
</div>
<div class="form-group">
    <label for="Tipo">Tipo</label>
    <select class="form-select" id="Tipo" name="Tipo">
    <option value="1" <?= $Tipo == 1?'selected' :'' ?>>N/A</option>
    <option value="2" <?= $Tipo == 2?'selected' :'' ?>>Ferramentas</option>
    <option value="3" <?= $Tipo == 3?'selected' :'' ?>>Armas</option>
    <option value="4" <?= $Tipo == 4?'selected' :'' ?>>Comida</option>
    <option value="5" <?= $Tipo == 5?'selected' :'' ?>>Remédio</option>
    </select>
</div>
<div class="form-group">
    <label for="Quantidade">Quantidade</label>
    <input type="text" class="form-control" id="Quantidade" name="Quantidade" value="<?=$Quantidade?>" required />
</div>
<div class="form-group">
    <label for="Descricao">Descrição</label>
    <input type="text" class="form-control" id="Descricao" name="Descricao" value="<?=$Descricao?>" />
</div>
</div> 
<div class="card-footer">
    <button type="submit" class="btn btn-success">Confirmar</button>
    <a class="btn btn-primary" href="itens.php">Voltar</a>
</div> 
</form>
    </div>
</main>

    
</body>
</html>