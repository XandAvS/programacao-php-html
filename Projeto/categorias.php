<?php
require_once("cabecalho.php");

function retornaCategorias()
{
    require("conexao.php");
    try {
        $sql = "SELECT * from categoria";
        $stmt = $pdo->query($sql); //falando para o banco fazer essa consulta
        return $stmt->fetchAll(); // da consulta retorna todos os dados em forma de arrey
    } catch (Exception $e) {
        die("Erro ao consultar as categorias" . $e->getMessage());
    }
}
$categoria = retornaCategorias();
?>
<h2>Categorias</h2>
<?php
    if (isset($_GET['cadastro']) && $_GET['cadastro'] == true) {
        echo '<p class ="text-success">Registro Salvo com Sucesso!<p/>';
    } else if (isset($_GET['cadastro']) && $_GET['cadastro'] == false) {
        echo '<p class =""text-danger>Erro ao inserir o registro<p/>';
    }
    if (isset($_GET['alteracao']) && $_GET['alteracao'] == true) {
        echo '<p class ="text-success">Registro Alterado com Sucesso!<p/>';
    } else if (isset($_GET['alteracao']) && $_GET['alteracao'] == false) {
        echo '<p class =""text-danger>Erro ao Alterar o registro<p/>';
    }
    if (isset($_GET['exclusao']) && $_GET['exclusao'] == true) {
        echo '<p class ="text-success">Registro Excluido com Sucesso!<p/>';
    } else if (isset($_GET['exclusao']) && $_GET['exclusao'] == false) {
        echo '<p class =""text-danger>Erro ao Excluir o registro<p/>';
    }
?>
<a href="nova_categoria.php" class="btn btn-success mb-3">Novo Registro</a>
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
        foreach ($categoria as $c): //vai percorrer as catecorias e a cada laço adiciona recebe o valor da variavel c
        ?>
            <tr>
                <td><?= $c['id']; ?></td>
                <td><?= $c['nome']; ?></td>
                <td>
                    <a href="editar_categoria.php?id=<?= $c['id'];//vai direto na catecoria que está sendo desejada?>" class="btn btn-warning">Editar</a>
                    <a href="consultar_categoria.php?id=<?= $c['id']; ?>" class="btn btn-info">Consultar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once("rodape.php");
?>