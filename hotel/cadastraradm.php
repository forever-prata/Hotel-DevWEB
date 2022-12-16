<?php
session_start();

if(isset($_SESSION["usuario"])){

}else{
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Adm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <h1 class="display-5">Adm(s)</h1>

    <ul class="nav nav-tabs" >
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="indexlogin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listarcliente.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listarquarto.php">Quartos</a>
        </li>
    </ul>
    <br>
    <br>

    <div class="d-flex justify-content-center">
        <form method="post" enctype="multipart/form-data" name="myForm" action="acaobd3.php">
            <fieldset>
                <div class="form-floating mb-3">
                    <input type="text" name="numeroRegistro" id="numeroRegistro" class="form-control" value="">
                    <label for="id">Numero Registro</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" id="senha" name="senha" class="form-control" value="">
                    <label for="nome">Senha</label>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>