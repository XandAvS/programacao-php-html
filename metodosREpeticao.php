<?php
    $idade = 20;
    if ($idade >= 18)
        echo "Maior de Idade";
    else{
        echo "Menor de Idade";
    }
    //operador ternario if e esle para operações simples 
    echo $idade >= 18 ? "maior Idade" : "menor Idade";

    $nota = 6;
    if ($nota > 6)
        echo "acima media";
    elseif ($nota == 6)
        echo "namedia";
    else{
        echo "abaixo";
    }

    $mes = 1;
    switch ($mes) {
        case 1:
            # code...
            break;
        
        default:
            # code...
            break;
    }

    $i = 1;
    while($i <=10){
        echo "$i<br>";
        //em caso de $valor = 10 ++$i isso condiciona o valor atual sem ser aumentado no final ou seja 1
        //em caso de $valor = 10 $i++ isso condiciona o valor atual aumentado no final ou seja 2
    $i++;
    }

    do {
        echo "$i<br/>";
        $i++;
    }While($i<=10);

    for ($i=0; $i<10; $i++){
        echo "$i<br>";
    }
?>