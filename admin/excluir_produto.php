<?php
include('../conexao.php');

$id = $_GET['id'];
$sql = "DELETE FROM produtos WHERE id = $id";

if(mysqli_query($conn, $sql)){
    header('Location: crud-produtos.php');
} else {
    echo "Erro ao excluir produto.";
}
?>