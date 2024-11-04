<?php 
include 'conexaobd_php.php';

// Verificar se o ID foi passado e se é um número
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id']; // Converter para inteiro para segurança

    // Preparar a consulta para selecionar o usuário
    $sql = mysqli_query($conexaoBD, "SELECT * FROM usuario WHERE id = $id");

    // Verificar se o usuário foi encontrado
    if (mysqli_num_rows($sql) > 0) {
        $n = mysqli_fetch_assoc($sql);
        $nome = $n['nome'];
        $sobrenome = $n['sobrenome'];
    } else {
        echo "Usuário não encontrado.";
        exit; // Para evitar continuar a execução
    }
} else {
    echo "ID inválido ou não fornecido.";
    exit;
}

// Processar a edição se o formulário for enviado
if (isset($_POST['editar'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];

    // Usar prepared statement para segurança
    $stmt = $conexaoBD->prepare("UPDATE usuario SET nome = ?, sobrenome = ? WHERE id = ?");
    $stmt->bind_param("ssi", $nome, $sobrenome, $id); // s = string, i = integer

    if ($stmt->execute()) {
        header('Location: tabela.php');
        exit; // Para evitar continuar a execução
    } else {
        echo "Erro ao atualizar: " . $stmt->error; // Mostrar erro, se houver
    }

    // Fechar a declaração
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastro PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container col-md-6 offset-md-3">
        <h1>Formulário Edição - PHP com MySQL</h1>
        <form method="post">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="sobrenome" value="<?php echo htmlspecialchars($sobrenome); ?>" required>
                </div>
            </div>
            <br>
            <div>
                <button name="editar" type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
</body>
</html>
