<?php 
include 'conexaobd_php.php';

// Verificar se o ID foi passado e se é um número
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id']; // Converter para inteiro para segurança

    // Preparar a consulta de exclusão
    $sql = mysqli_query($conexaoBD, "DELETE FROM usuario WHERE id = {$id}")
        or die("Erro na execução da consulta: " . mysqli_error($conexaoBD));

    // Redirecionar após a exclusão
    header('Location: index.php');
    exit; // Certifique-se de sair do script após o redirecionamento
} else {
    echo "ID inválido ou não fornecido.";
}
?>
