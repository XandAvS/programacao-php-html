<?php
require_once("cabecalho.php");
?>
<h2>Consultar Produto</h2>
<div class="row">
    <div class="col-5 mt-5 mx-auto">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="Produto1">
            <div class="card-body">
                <h5 class="card-title"><strong>Produto 1</strong></h5>
                <p class="card-text">Descrição do Produto: <strong>Produto 1</strong></p>
                <p class="card-text">Valor do Produto: <strong>Produto 1</strong></p>
                <button type="submit" class="btn btn-danger">Excluir</button>
                <button type="submit" class="btn btn-secondary" onclick="history.back()">Voltar</button>
            </div>
        </div>
    </div>

    <?php
    require_once("rodape.php")
    ?>