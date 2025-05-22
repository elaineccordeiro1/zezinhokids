<?php
$conn = mysqli_connect("localhost", "root", "vertrigo", "zezinho_kids");
if(!$conn){
    die("Erro na conexão: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4"); // ?? Linha obrigatória
?>