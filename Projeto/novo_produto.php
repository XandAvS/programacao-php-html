<?php
require_once("cabecalho.php");

function inserirProduto($nome, $descricao, $preco, $categoria){
    //toda função tem que ter a conexão
    require("conexao.php");
    try{
        $sql = "INSERT INTO produto (nome, descricao, preco, categoria_id)
                VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nome, $descricao, $preco, $categoria ]))////
        //modo de escrever no banco
    }
}

$categorias = retornaCategorias();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    inserirProduto($nome, $descricao, $preco, $categoria);
}
?>
<h2>Novo Produto</h2>
<div class="row">
    <div class="col-5 mt-5 mx-auto">
        <form method="post">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome Produto</label>
                <input type="text" id="nome" name="nome" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="4" required=""></textarea>
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor </label>
                <input type="number" step="0.01" id="valor" name="valor" class="form-control" required="">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
        </form>
    </div>

    <?php
    require_once("rodape.php")
    ?>