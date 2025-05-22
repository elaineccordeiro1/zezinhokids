<?php
include('../conexao.php');
include('../cabecalho.php');

$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = mysqli_query($conn, $sql);
$produto = mysqli_fetch_assoc($resultado);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];

    $sql = "UPDATE produtos SET
            nome='$nome',
            descricao='$descricao',
            preco='$preco',
            imagem='$imagem'
            WHERE id = $id";

    if(mysqli_query($conn, $sql)){
        echo "<div class='alert alert-success'>Produto atualizado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar produto.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<div class="container mt-4">
    <h2>Editar Produto</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $produto['nome']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="descricao" class="form-control" required><?php echo $produto['descricao']; ?></textarea>
        </div>
        <div class="mb-3">
            <label>Preço (R$):</label>
            <input type="number" name="preco" step="0.01" class="form-control" value="<?php echo $produto['preco']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Nome da Imagem:</label>
            <input type="text" name="imagem" class="form-control" value="<?php echo $produto['imagem']; ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="crud-produtos.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php include('../rodape.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>