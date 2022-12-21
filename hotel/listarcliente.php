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
    <title>Lista de Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    
</head>
<body>

    <h1 class="display-4">Lista de Clientes</h1>

    <ul class="nav nav-tabs" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="indexlogin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="listarcliente.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listarquarto.php">Quartos</a>
        </li>
    </ul>
    <br>
    
    <br>
    <div class="table-responsive">
        <div class="d-flex justify-content-center">
            <form action="" method="get" id='pesquisa'>
                <input type="search" name='busca' id='busca' class="form-control">
                <br>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-dark" type="submit" name='pesquisa'>Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <br>
        <table class="table table-striped table-hover">
            <?php
                    include_once "config.php";
                    try{
                        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

                        $busca = isset($_GET['busca'])?$_GET['busca']:"";
                        $query = "SELECT * FROM cliente";
                        
                        if ($busca != ""){
                            $busca = '%'.$busca.'%';
                            $query .= ' WHERE nome like :busca' ;
                        }

                        $stmt = $conexao->prepare($query);

                        if ($busca != ""){
                        $stmt->bindValue(':busca',$busca);
                        }

                        $stmt->execute();
                        $clientes = $stmt->fetchAll();
                        
                        echo "<tr><th>IdCliente</th><th>Nome</th><th>Email</th><th>Cpf</th><th>Telefone</th><th>Editar</th><th>Excluir</th></tr>";
                        foreach($clientes as $cliente){
                            $editar = "<a href=cadastrarcliente.php?acao=editar&id=".$cliente["idcliente"].">Alt</a>";
                            $excluir = "<a href='acaobd.php?acao=excluir&id=".$cliente["idcliente"]."'>Exc</a>";;
                            echo "<tr><td>".$cliente["idcliente"]."</td>"."<td>".$cliente["nome"]."</td>"."<td>".$cliente["email"]."</td>"."<td>".$cliente["cpf"]."</td>"."<td>".$cliente["telefone"]."</td><td>$editar</td>"."<td>$excluir</td>"."</tr>";
                        }

                    }catch(PDOExeptio $e){
                        print("Erro ao conectar com o banco de dados . . . <bre>".$e->getMenssage());
                        die();
                    }
            ?>
        </table>
    </div>
    
</body>
</html>