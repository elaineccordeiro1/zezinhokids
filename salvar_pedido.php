<?php
session_start();
include('conexao.php');
include('cabecalho.php');

if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
    echo "<p>Seu carrinho está vazio.</p>";
    include('rodape.php');
    exit;
}

// Salvar pedido
mysqli_query($conn, "INSERT INTO pedidos () VALUES ()");
$pedido_id = mysqli_insert_id($conn);

// Salvar itens do pedido
foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
    $produto_id = intval($produto_id);
    $quantidade = intval($quantidade);
    mysqli_query($conn, "INSERT INTO pedido_itens (pedido_id, produto_id, quantidade)
    VALUES ($pedido_id, $produto_id, $quantidade)");
}

// Limpar carrinho
unset($_SESSION['carrinho']);

echo "<div class='container'>";
echo "<h2>Pedido realizado com sucesso!</h2>";
echo "<p>O código do seu pedido é <strong>#" . $pedido_id . "</strong>.</p>";
echo "<a href='index.php' class='botao'>Voltar para Loja</a>";
echo "</div>";

include('rodape.php');
?>
