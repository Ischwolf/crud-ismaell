<?php
include 'listar.php';
include 'conexaobd_php.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tabela PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <br><br><br>
    <div class="container col-md-8 offset-md-2">
        <h2 class="text-center">Lista de Funcionários</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Salário</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($usuario = mysqli_fetch_assoc($listarSQL)) { ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['sobrenome']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['cargo']); ?></td>
                    <td><?php echo number_format($usuario['salario'], 2, ',', '.'); ?></td>
                    <td>
                        <a href="deletar.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                        <a href="editar.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-sm btn-warning">Página Inicial</a>
    </div>
</body>
</html>
