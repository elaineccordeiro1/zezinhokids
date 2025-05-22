<?php
include('conexao.php');

$nome = 'Admin';
$email = 'admin@zezinhokids.com';
$senha = password_hash('1234', PASSWORD_DEFAULT);
$tipo = 'admin';

$sql = "INSERT INTO usuarios (nome, email, senha, tipo)
        VALUES ('$nome', '$email', '$senha', '$tipo')";

if (mysqli_query($conn, $sql)) {
    echo "Admin criado com sucesso!";
} else {
    echo "Erro: " . mysqli_error($conn);
}

mysqli_close($conn);
?>