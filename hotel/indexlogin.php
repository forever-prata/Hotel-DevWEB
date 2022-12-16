<?php
session_start();

if(isset($_SESSION["usuario"])){

}else{
    header("location: login.php");
}

$acao = isset($_GET["acao"])?$_GET["acao"]:"";
if($acao == "sair"){
    session_destroy();
    header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
</head>
<body>

    <h1 class="display-5">Funcionario Logado</h1>

    <ul class="nav nav-tabs" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="indexlogin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listarcliente.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listarquarto.php">Quartos</a>
        </li>
    </ul>
    <br>

    <div class="d-flex justify-content-center">
      <div class="card">
        <div class="card-body">
        <h4 class="card-title">Cadastros</h4>
        <p class="card-text">Selecione a categoria </p>
        <a href="cadastrarquarto.php"><button class="btn btn-dark">Quartos</button></a>
        <a href="cadastrarcliente.php"><button class="btn btn-secondary">Clientes</button></a>
        <a href="cadastraradm.php"><button class="btn btn-light">Usuarios</button></a>
        </div>
      </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
      <form action="">
          <button name="acao" type="submit" value="sair" class="btn btn-danger">Logout</button>
      </form>
    </div>

</body>
</html>