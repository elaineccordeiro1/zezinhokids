<?php
session_start();
include('conexao.php');
include('cabecalho.php');
?>

<div class="container">
    <h2>Produtos</h2>

    <div class="produtos-container">
    <?php
    $sql = "SELECT * FROM produtos";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='produto'>";
            echo "<a href='detalhes.php?id=" . $row['id'] . "'>";
            echo "<img src='imagens/" . $row['imagem'] . "' alt='" . $row['nome'] . "'>";
            echo "<h3>" . $row['nome'] . "</h3>";
            echo "<p>R$ " . number_format($row['preco'], 2, ',', '.') . "</p>";
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "<p>Não há produtos cadastrados.</p>";
    }

    mysqli_close($conn);
    ?>
    </div>
</div>

<?php
include('rodape.php');
?>
