<?php
session_start();
include('conexao.php');
include('cabecalho.php');
?>

<div class="container">
    <h2>Pedido Finalizado</h2>

    <?php
    if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
        echo "<p>Seu pedido foi realizado com sucesso! ??</p>";
        echo "<p>Agradecemos pela sua compra na <strong>Zezinho Kids</strong>.</p>";
        echo "<p>Em breve, você receberá um e-mail com os detalhes do seu pedido.</p>";

        // Aqui você pode adicionar o código para gravar o pedido no banco de dados (opcional).

        // Limpa o carrinho
        unset($_SESSION['carrinho']);
    } else {
        echo "<p>Seu carrinho está vazio.</p>";
    }
    ?>

    <br>
    <a href="produtos.php" class="botao">Continuar Comprando</a>
</div>

<?php
include('rodape.php');
?>