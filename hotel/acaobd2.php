<?php

include_once "config.php";

$andar = isset($_POST["andar"])?$_POST["andar"]:"";
$capacidade = isset($_POST["capacidade"])?$_POST["capacidade"]:"";
$ocupacao = isset($_POST["ocupacao"])?$_POST["ocupacao"]:"";
$numero = isset($_POST["numero"])?$_POST["numero"]:0;

$acao = isset($_GET["acao"])?$_GET["acao"]:"";

if ($acao == "excluir"){
    try{
        $numero = isset($_GET["numero"])?$_GET["numero"]:0;

        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);
        $query = "DELETE FROM quarto WHERE numero = :numero";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":numero",$numero);

        if($stmt->execute()){
            header("location: indexlogin.php");
        }else{
            echo "Erro";
        }

    }catch(PDOExeptio $e){
        print("Erro ao conectar com o banco de dados . . . <br>".$e->getMenssage());
        die();
    }
}else{

if($andar != "" && $capacidade != "" && $ocupacao != ""){
    try{
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

        if($numero > 0){
            $query = "UPDATE quarto SET andar = :andar, capacidade = :capacidade, ocupacao = :ocupacao WHERE numero = :numero";
        }else{
            $query = "INSERT INTO quarto (andar, capacidade, ocupacao) VALUES(:andar, :capacidade, :ocupacao)";
        }

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(":andar",$andar);
        $stmt->bindValue(":capacidade",$capacidade);
        $stmt->bindValue(":ocupacao",$ocupacao);
    
        if($numero > 0){
            $stmt->bindValue(":numero",$numero);
        }

        if ($stmt->execute()){
            header("location: indexlogin.php");
        }

    }catch(PDOExeptio $e){
        print("Erro ao conectar com o banco de dados . . . <br>".$e->getMenssage());
        die();
    }
}

}
?>