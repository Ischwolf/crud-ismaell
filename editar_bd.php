<?php 
include 'conexaobd_php.php';

// Verificar se o ID foi passado e se é um número
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id']; // Converter para inteiro para segurança

    // Preparar a consulta para selecionar o usuário
    $sql = mysqli_query($conexaoBD, "SELECT * FROM usuario WHERE id = $id");

    // Verificar se o usuário foi encontrado
    if (mysqli_num_rows($sql) > 0) {
        $usuario = mysqli_fetch_assoc($sql);
    } else {
        echo "Usuário não encontrado.";
        exit; // Para evitar continuar a execução
    }
} else {
    echo "ID inválido ou não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="atualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $usuario['nome_usuario']; ?>" required>
        Sobrenome: <input type="text" name="sobrenome" value="<?php echo $usuario['sobrenome_usuario']; ?>" required>
        Cargo: <input type="text" name="cargo" value="<?php echo $usuario['cargo']; ?>" required>
        Salário: <input type="number" name="salario" value="<?php echo $usuario['salario']; ?>" step="0.01" required>
        <button type="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
