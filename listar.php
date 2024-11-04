<?php
include 'conexaobd_php.php';

// Verificar se a conexão foi estabelecida corretamente
if (!$conexaoBD) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Preparar a consulta para selecionar todos os usuários
$listarSQL = mysqli_query($conexaoBD, "SELECT * FROM usuario");

if (!$listarSQL) {
    die("Erro na consulta: " . mysqli_error($conexaoBD));
}

// Caso você queira usar os resultados em outros lugares, pode armazená-los em uma variável
$usuarios = mysqli_fetch_all($listarSQL, MYSQLI_ASSOC); // Obtém todos os resultados como um array associativo
?>
