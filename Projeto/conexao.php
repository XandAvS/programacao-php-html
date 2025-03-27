<?php // se o arquivo for só php não se fecha o codigo
declare(strict_types=1);

$dominio = 'mysql:host=localhost;dbname=projetophp';
//escrita padrão o que muda é o tipo de banco, e o host, onde ele esta hospedado
$usuario = 'root';
$senha = '';

try{
    $pdo = new PDO($dominio, $usuario, $senha);

} catch(PDOException $e){
    //die corta o resto da pagina se o erro houver
    die("Erro ao conectar com o banco!".$e->getMessage());
}