<?php
session_start();

if(isset($_SESSION["usuario"])){

}else{
    header("location: login.php");
}

$acao = isset($_GET["acao"])?$_GET["acao"]:"";
$numero = isset($_GET["numero"])?$_GET["numero"]:"";

if ($acao == "editar"){
    try{
        include_once "config.php";
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

        $query = "SELECT * FROM quarto WHERE numero = :numero";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':numero',$numero);

        $stmt->execute();
        $quarto = $stmt->fetch();


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
    <title>Cadastro Quartos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <h1 class="display-5">Quartos</h1>

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
        <form method="post" enctype="multipart/form-data" name="myForm" action="acaobd2.php">
            <fieldset>
                <div class="form-floating mb-3">
                    <input type="text" readonly name="numero" id="numero" class="form-control" value=<?php if(isset($quarto)) echo $quarto["numero"]; else echo 0;?>>
                    <label for="numero">Numero</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="andar" name="andar" class="form-control" value=<?php if(isset($quarto)) echo $quarto["andar"]?>>
                    <label for="andar">Andar</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="capacidade" name="capacidade" class="form-control" value=<?php if(isset($quarto)) echo $quarto["capacidade"]?>>
                    <label for="capacidade">Capacidade</label>
                </div>
                <div>
                    <label for="ocupado">Estado:</label>
                    <br>
                    <input type="radio" id="ocupacao1" class="form-check-input" name="ocupacao" value="0" <?php if((isset($quarto)) && $quarto["ocupacao"]=='0') echo 'checked'; ?> required> Livre
                    <input type="radio" id="ocupacao2" class="form-check-input" name="ocupacao" value="1" <?php if((isset($quarto)) && $quarto["ocupacao"]=='1') echo 'checked'; ?> required> Ocupado
                </div>
                    <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>