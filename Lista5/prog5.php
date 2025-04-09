<?php
// Define o número máximo de exercícios
$max_exercicios = 5; // Altere esse valor conforme necessário

// Obtém o número do exercício atual a partir do nome do arquivo
$arquivo_atual = basename($_SERVER['PHP_SELF']); // Pega o nome do arquivo atual (ex: "exer3.php")
preg_match('/prog(\d+)\.php/', $arquivo_atual, $matches); // Extrai o número do exercício

$exercicio_atual = isset($matches[1]) ? (int)$matches[1] : 1; // Se encontrar um número, usa ele, senão assume 1

// Define os exercícios anterior e próximo
$exercicio_anterior = max(1, $exercicio_atual - 1);
$exercicio_proximo = $exercicio_atual + 1;

// Se o usuário tentar acessar um exercício maior que o limite, redireciona para fim.php
if ($exercicio_atual > $max_exercicios) {
    header("Location: prog$max_exercicios.php");
    exit();
}

// Verifica se o usuário fez uma pesquisa
if (isset($_POST['pesquisa_exercicio'])) {
    $numero_pesquisado = (int)$_POST['pesquisa_exercicio'];
    if ($numero_pesquisado > 0 && $numero_pesquisado <= $max_exercicios) {
        header("Location: prog$numero_pesquisado.php"); // Redireciona para a página do exercício pesquisado
        exit();
    } elseif ($numero_pesquisado > $max_exercicios) {
        header("Location: prog$max_exercicios.php"); // Se o número for maior que o limite, vai para fim.php
        exit();
    }
}
?>
<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <title>Exercício <?php echo $exercicio_atual; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light mb-5" style="background-color: #747373;">
        <div class="container-fluid">
            <a class="navbar-brand" href="prog<?php echo $exercicio_atual; ?>.php">
                <img width="50" src="alexandre.png" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link" href="prog<?php echo $exercicio_anterior; ?>.php">Exercício Anterior</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prog<?php echo $exercicio_atual; ?>.php">Exercício Atual</a>
                    </li>
                </ul>
                <form class="d-flex" method="POST">
                    <input class="form-control me-2" type="number" name="pesquisa_exercicio" placeholder="Ir para exercício" min="1" required>
                    <button class="btn btn-outline-light" type="submit">Ir</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="row">
        <form method="post" action="">
            <div class="row justify-content-center">
                <h2 class="text-center">Exercício <?php echo $exercicio_atual; ?> - Estoque de Livros</h2>
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <div class="col-md-2 mb-3">
                        <div class="border p-3 rounded shadow-sm">
                            <label>Título do Livro <?php echo $i + 1; ?>:</label>
                            <input type="text" name="titulo[]" class="form-control" required>
                            <label>Quantidade em Estoque:</label>
                            <input type="number" name="estoque[]" class="form-control" required>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Verificar Estoque</button>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $titulos = $_POST['titulo'];
                $estoques = $_POST['estoque'];

                $livros = [];

                for ($i = 0; $i < 5; $i++) {
                    $titulo = trim($titulos[$i]);
                    $estoque = intval($estoques[$i]);

                    if (isset($livros[$titulo])) {
                        echo "<p class='text-danger'>Livro <strong>$titulo</strong> já inserido! Ignorado.</p>";
                        continue;
                    }

                    $livros[$titulo] = $estoque;
                }

                ksort($livros); // Ordena por título

                echo "<div class='col-6 mx-auto mt-4'>";
                echo "<h4>Lista de Livros (ordenada por título):</h4>";
                echo "<ul class='list-group'>";
                foreach ($livros as $titulo => $estoque) {
                    $alerta = $estoque < 5 ? "<span class='badge bg-danger ms-2'>Baixo estoque</span>" : "";
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                        <span>$titulo</span>
                        <span>$estoque $alerta</span>
                    </li>";
                }
                echo "</ul></div>";
            } catch (Exception $e) {
                echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>