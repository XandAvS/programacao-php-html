<?php
//include("cabecalho.php"); // se tiver erro apresenta o erro, e roda o resto que não deu erro
require_once("cabecalho.php"); //se der erro não execulta mais nada, mais seguro
//require_onde verifica se o conteudo ja foi incuido e não repete
echo "<h2> Usuario: " . $_SESSION['usuario'] . "</h2>";
?>
<p><a href="sair.php"></a></p>

<?php
    require_once("rodape.php");// acaba com o copia e cola quando preciso de comandos repitidos
?>