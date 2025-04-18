<?php
    require_once("cabecalho.php");

    function retornaCategorias(){
        require("conexao.php");
        try{
            $sql = "SELECT * from categoria";
            $stmt = $pdo->query($sql);//falando para o banco fazer essa consulta
            return $stmt->fetchAll();// da consulta retorna todos os dados em forma de arrey

            
        }catch (Exception $e){
            die("Erro ao consultar as categorias". $e->getMessage());
        }
        
    }
    $categoria = retornaCategorias();
    ?>
<h2>Categorias</h2>
<a href="novo_produto.php" class="btn btn-success mb-3">Novo Registro</a>
<table class="table table-hover table-striped">
 <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($categoria as $c): //vai percorrer as catecorias e a cada laço adiciona recebe o valor da variavel c
        ?>
        <tr>
            <td><?= $c['id'];?></td>
            <td><?= $c['nome'];?></td>
            <td>
                <a href="editar_produto.php" class="btn btn-warning">Editar</a>
                <a href="consultar_produto.php" class="btn btn-info">Consultar</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php
    require_once("rodape.php");
?>