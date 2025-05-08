<?php
require_once("cabecalho.php");

function retornaProdutos(){
    require("conexao.php");
    try{
        $sql = "SELECT p.*, c.nome as nome_categoria  FROM produto p 
        INNER JOIN categoria c ON c.id = p.categoria_id";
         //WHERE pessa muito no processamento do Banco, evitar para garantir o melhor desemoenho da aplicação
         //a conexão entre a tabela categoria e em produto que recebe a chave extrangeira, e o inner join buscamos a união entre elas
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }catch(Exception $e){
        die("Erro ao consultar produtos: " . $e->getMessage());
    }
}
?>
<!--CRIAMOS AS TABELAS NO GERADOR E ADICIONAMOS NA PAGINA QUE CORRESPONDE-->
<!--PARA CADA TABELA 4 PAGINAS, TABELA, ADICIONAR, EDITAR, CONSULTAR-->
<h2>Produtos</h2>
<a href="novo_produto.php" class="btn btn-success mb-3">Novo Registro</a>
<table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <?php
                foreach($produtos as $p): //$p recebe a variavel a cada laço que passa,1,2,3 ...
                    //mostragem do produto.
            
            ?>
            <td><?= $p['id'] ?></td>
            <td><?= $p['nome'] ?></td>
            <td><?= $p['descricao'] ?></td>
            <td><?= $p['preco'] ?></td>
            <td><?= $p['nome_categoria'] ?></td>
            <td>
                <a href="editar_produto.php" class="btn btn-warning">Editar</a>
                <a href="consultar_produto.php" class="btn btn-info">Consultar</a>
            </td>
        </tr>
        <?php 
            endforeach;
        ?>
    </tbody>
</table>

<?php
require_once("rodape.php");
?>