<?php
require_once("cabecalho.php");
//fazer uma função que verifica as categorias, com o id controlado pelo $_GET
//antes de editar, pegar os dados
function consultaCategoria($id)
{
    require('conexao.php');
    try {
        $sql = "SELECT * FROM categoria WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $categoria = $stmt->fetch((PDO::FETCH_ASSOC));
        if (!$categoria) {
            die("Erro ao consultar Registro");
        } else {
            return $categoria;
        }
    } catch (Exception $e) {
        die("Erro ao Consultar Categoria:" . $e->getMessage());
    }
}
//criar função que vai excluir as categorias
function excluirCategoria($id)
{
    require('conexao.php');
    try {
        //comando em sql para ir na tabela categoria e inserir os dados novos
        $sql = "DELETE FROM categoria WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nome, $descricao, $id])) {
            header('location: categorias.php?alteracao=true');
        } else { //'location (caminho)? (criação da variavel para retorno do status) 
            header('location: categorias.php?alteracao=false');
        }
    } catch (Exception $e) {
        die("Erro ao inserir Categoria:" . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    excluirCategoria($nome, $descricao, $id);
} else {
    $categoria = consultaCategoria($_GET['id']);
}

?>
<h2>Excluir Categoria</h2>
<!--cirar um campo que vai ser escondido 
e vai armazena ro id da chave para depois 
passar e poder alterar-->
<input type="hidden" name="id" value="<?= $categoria['id'] ?>">
<!---->
<form method="post">
    <div class="mb-3">
        <p>Nome: <b> <?= $categoria['nome'] ?> </b></p>
    </div>
    <div class="mb-3">
        <p>Descrição: <b> <?= $categoria['descricao'] ?> </b></p>
    </div>
    <div class="mb-3">
        <p class="text-danger">Deseja Excluir Esse Registro?</p>
        <button type="submit" class="btn btn-danger">Excluir</button>
        <!--ver para colocar um swtich alert para ter certeza de excluir-->
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </div>
</form>
<?php
require_once("rodape.php");
?>