<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Grupo</title>
</head>
<body>

<h2>Criar Grupo</h2>

<form action="controller/cadastrarGrupoController.php" method="post">
    <label for="nomeGrupo">Nome do Grupo:</label>
    <input type="text" id="nomeGrupo" name="nomeGrupo" required><br>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required><br>

    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao" rows="4" required></textarea><br>

    <label for="urlImg">URL da Imagem:</label>
    <input type="text" id="urlImg" name="urlImg"><br>

    <input type="submit" value="Criar Grupo">
</form>

</body>
</html>

