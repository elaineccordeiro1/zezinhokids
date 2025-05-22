<?php
session_start();
include('conexao.php');
include('cabecalho.php');

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM produtos WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<p>Produto não encontrado.</p>";
        include('rodape.php');
        exit;
    }
} else {
    echo "<p>Produto inválido.</p>";
    include('rodape.php');
    exit;
}
?>

<div class="container">
    <h2><?php echo $row['nome']; ?></h2>

    <div class="detalhes-produto">
        <img src="imagens/<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>">
        <div class="info">
            <p><strong>Preço:</strong> R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></p>
            <p><?php echo $row['descricao']; ?></p>
            <a class="botao" href="carrinho.php?add=<?php echo $row['id']; ?>">Adicionar ao Carrinho</a>
        </div>
    </div>
</div>

<?php
include('rodape.php');
?>