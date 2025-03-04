<?php
// Define o número máximo de exercícios
$max_exercicios = 9; // Altere esse valor conforme necessário

// Obtém o número do exercício atual a partir do nome do arquivo
$arquivo_atual = basename($_SERVER['PHP_SELF']); // Pega o nome do arquivo atual (ex: "ativ3.php")
preg_match('/ativ(\d+)resposta\.php/', $arquivo_atual, $matches); // Extrai o número do exercício

$exercicio_atual = isset($matches[1]) ? (int)$matches[1] : 1; // Se encontrar um número, usa ele, senão assume 1

// Define os exercícios anterior e próximo
$exercicio_anterior = max(1, $exercicio_atual - 1);
$exercicio_proximo = $exercicio_atual + 1;

// Se o usuário tentar acessar um exercício maior que o limite, redireciona para fim.php
if ($exercicio_atual > $max_exercicios) {
    header("Location: ativFim.php");
    exit();
}

// Verifica se o usuário fez uma pesquisa
if (isset($_POST['pesquisa_exercicio'])) {
    $numero_pesquisado = (int)$_POST['pesquisa_exercicio'];
    if ($numero_pesquisado > 0 && $numero_pesquisado <= $max_exercicios) {
        header("Location: ativ$numero_pesquisado.php"); // Redireciona para a página do exercício pesquisado
        exit();
    } elseif ($numero_pesquisado > $max_exercicios) {
        header("Location: ativFim.php"); // Se o número for maior que o limite, vai para ativfim.php
        exit();
    }
}
?>
<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista 3 | Atividade <?php echo $exercicio_atual; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light mb-5" style="background-color: #747373;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="ativ<?php echo $exercicio_atual; ?>.php">
                <img width="50" src="alexandre.png" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="ativ<?php echo $exercicio_anterior; ?>.php">Exercício Anterior</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ativ<?php echo $exercicio_atual; ?>.php">Exercício Atual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ativ<?php echo $exercicio_proximo; ?>.php">Próximo Exercício</a>
                    </li>
                </ul>

                <!-- Formulário de pesquisa em PHP -->
                <form class="d-flex" method="POST">
                    <input class="form-control me-2" type="number" name="pesquisa_exercicio" placeholder="Ir para exercício" min="1" required>
                    <button class="btn btn-outline-light" type="submit">Ir</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-3 mx-auto">
            <h2>Atividade <?php echo $exercicio_atual; ?></h2>
            <?php
            try {
                $mes = $_POST['mes'];
                switch ($mes) {
                    case 1:
                        echo "1- Janeiro";
                        break;
                    case 2:
                        echo "2- Fevereiro";
                        break;
                    case 3:
                        echo "3- Março";
                        break;
                    case 4:
                        echo "4- Abril";
                        break;
                    case 5:
                        echo "5- Maio";
                        break;
                    case 6:
                        echo "6- Junho";
                        break;
                    case 7:
                        echo "7- Julho";
                        break;
                    case 8:
                        echo "8- Agosto";
                        break;
                    case 9:
                        echo "9- Setembro";
                        break;
                    case 10:
                        echo "10- Outubro";
                        break;
                    case 11:
                        echo "11- Novembro";
                        break;
                    case 12:
                        echo "12- Dezembro";
                        break;
                    default:
                        echo "Mês $mes Inserido de forma errada informe de: 1-12";
                        break;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            ?>
            <div>
                <a href="ativ<?php echo $exercicio_atual; ?>.php" class="btn btn-primary">Retornar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>