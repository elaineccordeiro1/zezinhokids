<?php include('cabecalho.php'); ?>
<?php include('conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zezinho Kids - Loja de Roupas de Bebê</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container mt-4">
  <h1 class="mb-4">Bem-vindo à Zezinho Kids</h1>
  <div class="row">
    <?php
    $sql = "SELECT * FROM produtos";
    $resultado = mysqli_query($conn, $sql);
    while($produto = mysqli_fetch_assoc($resultado)){
    ?>
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="imagens/<?php echo $produto['imagem']; ?>" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
          <p class="card-text"><?php echo $produto['descricao']; ?></p>
          <p><strong>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></strong></p>
          <a href="detalhes.php?id=<?php echo $produto['id']; ?>" class="btn btn-primary">Ver Produto</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<?php include('rodape.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>