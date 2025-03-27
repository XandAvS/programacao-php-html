<?php
session_start();
if (!$_SESSION['acesso']) {
    header("lacation: index.php?mesagem=acesso_negado");
}
?>
<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="principal.php">Sistema de Controle de Estoque</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="produtos.php">Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categorias.php">Categorias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-danger" href="sair.php">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="container">