<?php
include('../conexao.php');
include('../cabecalho.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];

    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem)
            VALUES ('$nome', '$descricao', '$preco', '$imagem')";

    if(mysqli_query($conn, $sql)){
        echo "<div class='alert alert-success'>Produto cadastrado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar produto.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto - Zezinho Kids</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Cadastrar Novo Produto</h2>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nome do Produto:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <textarea name="descricao" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço (R$):</label>
            <input type="number" name="preco" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome da Imagem (ex.: vestido_floral.jpg):</label>
            <input type="text" name="imagem" class="form-control" required>
            <small class="text-muted">A imagem deve estar na pasta <strong>/imagens/</strong></small>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="crud-produtos.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php include('../rodape.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>