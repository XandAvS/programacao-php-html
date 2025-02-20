<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codigo PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <h1>boa noite!
    <?php
    // sempre fechar as linhas com ;
    //comentario, codigo echo para imprimir na tela algo, date puxa a data do servidor(d, dia/m, mes/Y, ano)
        echo date("d/m/Y");
        ?>
    </h1> 
    <p>
        <?php
            $nome = "Vanessa";
            // $ significa variavel que inicia toda variavel nome primeiro minusculo, depois miusculo
            echo "O nome é: $nome";
            // aspas duplas importa o conteudo da variavel, não seu nome definino
            echo 'O nome é: $nome';
            // importa o nome da variavel
        ?>
    </p>
    <p>
        <?php
        // s variavel é publica em todo o codigo
            echo 'O nome é: $nome';
            // importa o nome da variavel
        ?>
    </p>
    <p>
        <?php
        // s variavel é publica em todo o codigo
            echo 'O nome é: ' .$nome;
            // assim concatena a variavel para ser exibida 
        ?>
    </p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>