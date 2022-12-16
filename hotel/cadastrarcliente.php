<?php
session_start();

if(isset($_SESSION["usuario"])){

}else{
    header("location: login.php");
}

$acao = isset($_GET["acao"])?$_GET["acao"]:"";
$id = isset($_GET["id"])?$_GET["id"]:"";

if ($acao == "editar"){
    try{
        include_once "config.php";
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

        $query = "SELECT * FROM cliente WHERE idcliente = :id";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':id',$id);

        $stmt->execute();
        $cliente = $stmt->fetch();


    }catch(PDOExeptio $e){
        print("Erro ao conectar com o banco de dados . . . <bre>".$e->getMenssage());
        die();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <h1 class="display-5">Clientes</h1>

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
    <br>

    <div class="d-flex justify-content-center">
        <form method="post" enctype="multipart/form-data" name="myForm" action="acaobd.php">
            <fieldset>
                <div class="form-floating mb-3">
                    <input type="text" readonly name="id" id="id" class="form-control" value=<?php if(isset($cliente)) echo $cliente["idcliente"]; else echo 0;?>>
                    <label for="id">Id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="nome" name="nome" class="form-control" value=<?php if(isset($cliente)) echo $cliente["nome"]?>>
                    <label for="nome">Nome</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" id="floatingEmail" name="email" class="form-control" value=<?php if(isset($cliente)) echo $cliente["email"]?>>
                    <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="cpf" name="cpf" class="form-control" value=<?php if(isset($cliente)) echo $cliente["cpf"]?>>
                    <label for="cpf">Cpf</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="telefone" name="telefone" class="form-control" value=<?php if(isset($cliente)) echo $cliente["telefone"]?>>
                    <label for="telefone">Telefone</label>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>