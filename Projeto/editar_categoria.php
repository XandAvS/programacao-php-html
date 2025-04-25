<?php
require_once("cabecalho.php");
//fazer uma função que verifica as categorias nos produtos, com o id controlado pelo $_GET
//antes de editar, pegar os dados
    function consultaCategoria($id){
        require('conexao.php');
        try{
            $sql = "SELECT * FROM categoria WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $categoria = $stmt->fetch((PDO::FETCH_ASSOC));
            if(!$categoria){
                die("Erro ao consultar Registro");
            }else{
                return $categoria;
            }

        }catch(Exception $e){
            die("Erro ao Consultar Categoria:" .$e->getMessage());
        }
    }
    //criar função que vai alterar as categorias
    function alterarCategoria($nome, $descricao, $id){
        require('conexao.php');
        try{
                //comando em sql para ir na tabela categoria e inserir os dados novos
                $sql = "UPDATE categoria set nome = ?, descricao = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute([$nome, $descricao, $id])){
                    header('location: categorias.php?alteracao=true');
                }
                else{//'location (caminho)? (criação da variavel para retorno do status) 
                    header('location: categorias.php?alteracao=false');
                }
        }catch (Exception $e){
            die("Erro ao inserir Categoria:" .$e->getMessage());
        }
       
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $id = $_POST['id'];
        alterarCategoria($nome, $descricao, $id);
    }else {
        $categoria = consultaCategoria($_GET['id']);
    }

?>
<h2>Alterar Categoria</h2>
<!--cirar um campo que vai ser escondido 
e vai armazena ro id da chave para depois 
passar e poder alterar-->
<input type="hidden" name="id" value="<?=$categoria['id']?>">
<!---->
<form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o Nome</label>
        <input  value="<?=$categoria['nome']?>"type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Informe a Descrição</label>
        <!--sempre que for puxar as informações dentro do 
        textarea tem que inserir 
        ele dentro das chaves >******< -->
        <textarea id="descricao" name="descricao" class="form-control" rows="4" required=""><?=$categoria['descricao']?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
</form>
<?php
require_once("rodape.php");
?>