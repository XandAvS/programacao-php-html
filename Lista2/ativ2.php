<?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                try {
                    $valor1 = $_POST['valor1'];
                    $valor2 = $_POST['valor2'];
                    $valor3 = $_POST['valor3'];
                    $valor4 = $_POST['valor4'];
                    $valor5 = $_POST['valor5'];
                    $valor6 = $_POST['valor6'];
                    $valor7 = $_POST['valor7'];
                    $menor1 = 0;
                    $menor2 = 0;
                    $menor3 = 0;
                    $menor4 = 0;
                    $menor5 = 0;
                    $menor6 = 0;
                    $menor7 = 0;


                    echo "o valor do Menor é: $menor";
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
            ?>