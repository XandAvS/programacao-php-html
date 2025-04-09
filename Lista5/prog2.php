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
                    <li class="nav-item">
                        <a class="nav-link" href="prog<?php echo $exercicio_proximo; ?>.php">Próximo Exercício</a>
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
        <div class="col-6 mx-auto">
            <h2>Exercício <?php echo $exercicio_atual; ?> - Médias dos Alunos</h2>
            <div class="row">
                <div class="col-5 mx-auto">
                    <form method="post" action="">
                        <?php for ($i = 0; $i < 5; $i++): ?>

                            <div class="mb-3 border p-3 rounded shadow-sm">
                                <label>Nome do Aluno <?php echo $i + 1; ?>:</label>
                                <input type="text" name="nome[]" class="form-control" required>
                                <label>Nota 1:</label>
                                <input type="number" name="nota1[]" class="form-control" step="0.01" required>
                                <label>Nota 2:</label>
                                <input type="number" name="nota2[]" class="form-control" step="0.01" required>
                                <label>Nota 3:</label>
                                <input type="number" name="nota3[]" class="form-control" step="0.01" required>
                            </div>

                        <?php endfor; ?>
                        <button type="submit" class="btn btn-primary">Calcular Médias</button>
                    </form>
                </div>
            </div>
            <div class="row">
            <div class="col-5 mx-auto">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                try {
                    $nomes = $_POST['nome'];
                    $nota1 = $_POST['nota1'];
                    $nota2 = $_POST['nota2'];
                    $nota3 = $_POST['nota3'];

                    $medias = [];

                    for ($i = 0; $i < 5; $i++) {
                        $media = (floatval($nota1[$i]) + floatval($nota2[$i]) + floatval($nota3[$i])) / 3;
                        $nome_aluno = trim($nomes[$i]);

                        if (array_key_exists($nome_aluno, $medias)) {
                            echo "<p class='text-danger'>Aluno <strong>$nome_aluno</strong> já inserido! Duplicatas ignoradas.</p>";
                            continue;
                        }

                        $medias[$nome_aluno] = round($media, 2);
                    }
                    arsort($medias);
                    echo "<h4 class='mt-4'>Lista de Alunos (por média):</h4><ul class='list-group'>";
                    foreach ($medias as $nome => $media) {
                        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                            $nome
                            <span>$media</span>
                          </li>";
                    }
                    echo "</ul>";
                } catch (Exception $e) {
                    echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
                }
            }
            ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>