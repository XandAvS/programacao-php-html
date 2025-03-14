<?php
// Define o número máximo de exercícios
$max_exercicios = 7; // Altere esse valor conforme necessário

// Obtém o número do exercício atual a partir do nome do arquivo
$arquivo_atual = basename($_SERVER['PHP_SELF']); // Pega o nome do arquivo atual (ex: "exer3.php")
preg_match('/form(\d+)\.php/', $arquivo_atual, $matches); // Extrai o número do exercício

$exercicio_atual = isset($matches[1]) ? (int)$matches[1] : 1; // Se encontrar um número, usa ele, senão assume 1

// Define os exercícios anterior e próximo
$exercicio_anterior = max(1, $exercicio_atual - 1);
$exercicio_proximo = $exercicio_atual + 1;

// Se o usuário tentar acessar um exercício maior que o limite, redireciona para fim.php
if ($exercicio_atual > $max_exercicios) {
    header("Location: form$max_exercicios.php");
    exit();
}

?>
<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício <?php echo $exercicio_atual; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light mb-5" style="background-color: #747373;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="form<?php echo $exercicio_atual; ?>.php">
                <img width="50" src="alexandre.png" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="form<?php echo $exercicio_atual; ?>.php">Exercício Atual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form<?php echo $exercicio_proximo; ?>.php">Próximo Exercício</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-3 mx-auto">
            <h2>Exercício <?php echo $exercicio_atual; ?></h2>
            <h3>function Texto</h3>
            <form method="post" action="exArray.php">
                <div class="mb-3">
                   <?php for ($i=0; $i <10; $i++) : ?>
                        <input type="number" id=""  name="valor[]" placeholder="Informe o valor <?= $i?>">
                    <?php endfor; ?>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        try {
                            $valores = $_POST['valor'];
                            echo "o primeiro valor é: ".$valores[0];
                            echo "<br>";
                            print_r($valores);
                            $valores['texto'] = 'dados';
                            unset($valores['texto']);
                            echo "<br>";
                            foreach ($valores as $c => $v) {
                                echo "<p> Posição $c - Valor $v"; }                             
                        } catch (Exception $e){
                            echo $e->getMessage();
                        }
                    }
                ?>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>