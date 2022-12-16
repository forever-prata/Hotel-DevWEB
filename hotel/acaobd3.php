<?php

include_once "config.php";

$numeroRegistro = isset($_POST["numeroRegistro"])?$_POST["numeroRegistro"]:"";
$senha = isset($_POST["senha"])?$_POST["senha"]:"";

if($numeroRegistro != "" && $senha != "" ){
    try{
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

        $query = "INSERT INTO adm (numeroRegistro, senha) VALUES(:numeroRegistro, :senha)";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(":numeroRegistro",$numeroRegistro);
        $stmt->bindValue(":senha",$senha);

        if ($stmt->execute()){
            header("location: indexlogin.php");
        }

    }catch(PDOExeptio $e){
        print("Erro ao conectar com o banco de dados . . . <br>".$e->getMenssage());
        die();
    }
}

?>