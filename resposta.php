<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codigo PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body> 
    <h1>resposta</h1>       
    <?php
    if ($SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $valor1 = $_POST['valor 1'];
            $valor2 = $_POST['valor2'];
            $soma = $valor1 + $valor2;
            echo "o valor é $soma";
            $div = $valor1 / $valor2;
            $mult = $valor1 * $valor2;
            

        } catch(Exception $e){
         echo $e->getMessage();   
        }
    }
    ?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
 
</html>