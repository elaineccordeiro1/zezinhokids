<?php
session_start();
include('conexao.php');
include('cabecalho.php');

// Inicializa o carrinho
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// Adicionar produto
if (isset($_GET['add'])) {
    $id = intval($_GET['add']);
    if (!isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] = 1;
    } else {
        $_SESSION['carrinho'][$id] += 1;
    }
    header("Location: carrinho.php");
    exit;
}

// Remover produto
if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    unset($_SESSION['carrinho'][$id]);
    header("Location: carrinho.php");
    exit;
}

// Atualizar carrinho
if (isset($_POST['atualizar'])) {
    foreach ($_POST['quantidade'] as $id => $qtd) {
        $id = intval($id);
        $qtd = intval($qtd);
        if (!empty($qtd) && $qtd > 0) {
            $_SESSION['carrinho'][$id] = $qtd;
        } else {
            unset($_SESSION['carrinho'][$id]);
        }
    }
    header("Location: carrinho.php");
    exit;
}

// Finalizar e salvar pedido
if (isset($_POST['finalizar'])) {
    if (count($_SESSION['carrinho']) == 0) {
        echo "<p>Seu carrinho está vazio.</p>";
    } else {
        // Insere o pedido
        $sql_pedido = "INSERT INTO pedidos () VALUES ()";
        if (mysqli_query($conn, $sql_pedido)) {
            $pedido_id = mysqli_insert_id($conn);

            // Insere os itens do pedido
            foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
                $produto_id = intval($produto_id);
                $quantidade = intval($quantidade);

                $sql_item = "INSERT INTO pedido_itens (pedido_id, produto_id, quantidade)
                            VALUES ($pedido_id, $produto_id, $quantidade)";

                if (!mysqli_query($conn, $sql_item)) {
                    echo "<p>Erro ao salvar item do pedido: " . mysqli_error($conn) . "</p>";
                }
            }

            // Limpa o carrinho
            unset($_SESSION['carrinho']);

            echo "<div class='container'>";
            echo "<h2>Pedido realizado com sucesso!</h2>";
            echo "<p>O código do seu pedido é <strong>#" . $pedido_id . "</strong>.</p>";
            echo "<a href='index.php' class='botao'>Voltar para Loja</a>";
            echo "</div>";

            include('rodape.php');
            exit;

        } else {
            echo "<p>Erro ao salvar o pedido: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>

<div class="container">
    <h2>Meu Carrinho</h2>

    <?php
    if (count($_SESSION['carrinho']) == 0) {
        echo "<p>Seu carrinho está vazio.</p>";
    } else {
        echo "<form action='' method='post'>";
        echo "<table>";
        echo "<tr><th>Produto</th><th>Quantidade</th><th>Preço</th><th>Subtotal</th><th>Ação</th></tr>";

        $total = 0;

        foreach ($_SESSION['carrinho'] as $id => $qtd) {
            $sql = "SELECT * FROM produtos WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $produto = mysqli_fetch_assoc($result);
                $nome = $produto['nome'];
                $preco = $produto['preco'];
                $subtotal = $preco * $qtd;
                $total += $subtotal;

                echo "<tr>";
                echo "<td>" . $nome . "</td>";
                echo "<td><input type='number' name='quantidade[$id]' value='$qtd' min='1'></td>";
                echo "<td>R$ " . number_format($preco, 2, ',', '.') . "</td>";
                echo "<td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>";
                echo "<td><a href='carrinho.php?del=$id'>Remover</a></td>";
                echo "</tr>";
            }
        }

        echo "<tr>";
        echo "<td colspan='3' align='right'><strong>Total:</strong></td>";
        echo "<td colspan='2'><strong>R$ " . number_format($total, 2, ',', '.') . "</strong></td>";
        echo "</tr>";

        echo "</table>";
        echo "<br>";
        echo "<input type='submit' name='atualizar' value='Atualizar Carrinho' class='botao'>";
        echo " ";
        echo "<input type='submit' name='finalizar' value='Finalizar Pedido' class='botao'>";
        echo "</form>";
    }
    ?>
</div>

<?php include('rodape.php'); ?>