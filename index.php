<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastro PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Importando Chart.js -->
</head>
<body>
    <div class="container col-md-6 offset-md-3">
        <h1>Formulário Cadastro - PHP com MySql</h1>
        <form method="post" action="salvar.php">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Sobrenome" name="sobrenome" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Cargo" name="cargo" required>
                </div>
                <div class="col">
                    <input type="number" class="form-control" placeholder="Salário" name="salario" step="0.01" required>
                </div>
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    
    </div>

    <?php include 'tabela.php'; ?>

    <div class="container">
        <h2>Gráficos</h2>
        <canvas id="barChart"></canvas>
        <canvas id="pieChart"></canvas>
        <canvas id="lineChart"></canvas>
    </div>

    <script>
        // Aqui você deve substituir os valores pelos dados que vêm do banco de dados
        var barLabels = [/* Adicione aqui os rótulos do gráfico de barras */];
        var barData = [/* Adicione aqui os dados do gráfico de barras */];

        var pieLabels = [/* Adicione aqui os rótulos do gráfico de pizza */];
        var pieData = [/* Adicione aqui os dados do gráfico de pizza */];

        var lineLabels = [/* Adicione aqui os rótulos do gráfico de linha */];
        var lineData = [/* Adicione aqui os dados do gráfico de linha */];

        // Gráfico de Barras
        var ctxBarras = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBarras, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [{
                    label: 'Número de Funcionários por Cargo',
                    data: barData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            }
        });

        // Gráfico de Pizza
        var ctxPizza = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPizza, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    label: 'Distribuição Salarial por Função',
                    data: pieData,
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            }
        });

        // Gráfico de Linha
        var ctxLinha = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctxLinha, {
            type: 'line',
            data: {
                labels: lineLabels,
                datasets: [{
                    label: 'Salário Médio ao Longo do Tempo',
                    data: lineData,
                    fill: false,
                    borderColor: 'rgba(255, 206, 86, 1)',
                    tension: 0.1
                }]
            }
        });
    </script>
</body>
</html>
