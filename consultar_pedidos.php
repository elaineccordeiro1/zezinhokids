<?php
session_start();
include('conexao.php');
include('cabecalho.php');
?>

<div class="container">
    <h2>Pedidos Realizados</h2>

    <?php
    $sql_pedidos = "SELECT * FROM pedidos ORDER BY id DESC";
    $result_pedidos = mysqli_query($conn, $sql_pedidos);

    if (mysqli_num_rows($result_pedidos) > 0) {
        while ($pedido = mysqli_fetch_assoc($result_pedidos)) {
            echo "<div class='pedido'>";
            echo "<h3>Pedido #" . $pedido['id'] . " - " . $pedido['data'] . "</h3>";

            $sql_itens = "SELECT pi.*, p.nome, p.preco
                          FROM pedido_itens pi
                          JOIN produtos p ON pi.produto_id = p.id
                          WHERE pi.pedido_id = " . $pedido['id'];
            $result_itens = mysqli_query($conn, $sql_itens);

            if (mysqli_num_rows($result_itens) > 0) {
                echo "<table>";
                echo "<tr><th>Produto</th><th>Quantidade</th><th>Preço Unitário</th><th>Subtotal</th></tr>";
                $total = 0;

                while ($item = mysqli_fetch_assoc($result_itens)) {
                    $subtotal = $item['preco'] * $item['quantidade'];
                    $total += $subtotal;

                    echo "<tr>";
                    echo "<td>" . $item['nome'] . "</td>";
                    echo "<td>" . $item['quantidade'] . "</td>";
                    echo "<td>R$ " . number_format($item['preco'], 2, ',', '.') . "</td>";
                    echo "<td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>";
                    echo "</tr>";
                }

                echo "<tr>";
                echo "<td colspan='3'><strong>Total:</strong></td>";
                echo "<td><strong>R$ " . number_format($total, 2, ',', '.') . "</strong></td>";
                echo "</tr>";
                echo "</table>";
            }

            echo "</div><br>";
        }
    } else {
        echo "<p>Nenhum pedido realizado.</p>";
    }
    ?>
</div>

<?php
include('rodape.php');
?>
