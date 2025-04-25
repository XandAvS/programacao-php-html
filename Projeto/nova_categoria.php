<?php
require_once("cabecalho.php");

    //criar função que vai adicionar os novos campos direto no banco
    function inserirCategoria($nome, $descricao){
        require_once("conexao.php");
        try{
                //comando em sql para ir na tabela categoria e inserir os dados novos
                $sql = "INSERT INTO categoria (nome, descricao) values (?,?)";
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute([$nome, $descricao])){
                    header('location: categorias.php?cadastro=true');
                }
                else{//'location (caminho)? (criação da variavel para retorno do status) 
                    header('location: categorias.php?cadastro=false');
                }
        }catch (Exception $e){
            die("Erro ao inserir Categoria:" .$e->getMessage());
        }
       
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        inserirCategoria($nome, $descricao);
    }

?>
<h2>Nova Categoria</h2>
<form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o Nome</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Informe a Descrição</label>
        <textarea id="descricao" name="descricao" class="form-control" rows="4" required=""></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
require_once("rodape.php");
?>