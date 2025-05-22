<?php
include('cabecalho.php');
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido - Zezinho Kids</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">Pedido Realizado</h2>
    <?php
    if(!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0){
        echo "<div class='alert alert-warning'>Seu carrinho está vazio.</div>";
    } else {
        $usuario_id = 1; // Usar $_SESSION['usuario']['id'] se tiver login funcionando

        $sql_pedido = "INSERT INTO pedidos (usuario_id, data, status) VALUES ('$usuario_id', NOW(), 'Pendente')";
        if(mysqli_query($conn, $sql_pedido)){
            $pedido_id = mysqli_insert_id($conn);

            foreach($_SESSION['carrinho'] as $id => $item){
                $produto_id = $id;
                $quantidade = $item['quantidade'];
                $preco = $item['preco'];

                $sql_item = "INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco)
                              VALUES ('$pedido_id', '$produto_id', '$quantidade', '$preco')";
                mysqli_query($conn, $sql_item);
            }

            unset($_SESSION['carrinho']);

            echo "<div class='alert alert-success'>Seu pedido foi realizado com sucesso!<br> Número do pedido: <strong>#{$pedido_id}</strong></div>";
        } else {
            echo "<div class='alert alert-danger'>Ocorreu um erro ao processar seu pedido. Tente novamente.</div>";
        }
    }
    ?>
    <a href="index.php" class="btn btn-primary">Voltar para a Loja</a>
</div>

<?php include('rodape.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>