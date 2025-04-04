<?php
    require_once('conexao.php'); // devemos conectar / vincular para que o post seja direcionado ao BD
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        try{
            $nome = $_POST['nome'];
            $email = $_POST['email'];   
            $senha = password_hash(password: $_POST['senha'], algo: PASSWORD_BCRYPT);
            //criptografar a senha com a função password_hash
            // PASSWORD_BCRYPT é o algoritimo para a criptografia


            // inserção no banco de dados
            $stmt = $pdo->prepare("INSERT INTO usuarios(nome, email, senha) VALUES (?,?,?)");//preparar o banco de dados sql
            if($stmt->execute([$nome, $email, $senha])){ // DECLARAR OS PARAMETROS COMO ? PARA PREPARAR O BANCO
                header("location: index.php?cadastro=true");                                               // NA ESTRUTURA DA TABELA
            }              // isso que incrementa no banco de dados 
            else{
                echo "<p> Erro ao inserir o usuario</p>";
            }               
            
        }catch (Exception $e){
            echo "erro ao inserir usuario". $e->getMessage();
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="row">
<div class="col-5 mt-5 mx-auto">
    <h1>Novo Usuário</h1>
    <form method="post">
        <div class="mb-3"> <!--Atributos da tabela Nome-->
            <label for="nome" class="form-label">Informe Nome de Usuário</label>
            <input type="text" id="nome" name="nome" class="form-control" required="" placeholder="Nome de Usuário">
        </div>
        <div class="mb-3"><!--Email-->
            <label for="email" class="form-label">Informe usuário@provedor.com</label>
            <input type="email" id="email" name="email" class="form-control" required="" placeholder="E-mail">
        </div>
        <div class="mb-3"><!--Senha-->
            <label for="senha" class="form-label">Crie sua Senha de Usuário</label>
            <input type="password" id="senha" name="senha" class="form-control" required="" placeholder="Senha">
        </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
    </form>


    </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>