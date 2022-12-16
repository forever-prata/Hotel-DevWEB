<?php

include_once "config.php";

$nome = isset($_POST["nome"])?$_POST["nome"]:"";
$email = isset($_POST["email"])?$_POST["email"]:"";
$telefone = isset($_POST["telefone"])?$_POST["telefone"]:"";
$cpf = isset($_POST["cpf"])?$_POST["cpf"]:"";
$id = isset($_POST["id"])?$_POST["id"]:0;

$acao = isset($_GET["acao"])?$_GET["acao"]:"";

if ($acao == "excluir"){
    try{
        $id = isset($_GET["id"])?$_GET["id"]:0;

        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);
        $query = "DELETE FROM cliente WHERE idcliente = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id",$id);

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

if($nome != "" && $email != "" && $cpf != ""){
    try{
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

        if($id > 0){
            $query = "UPDATE cliente SET nome = :nome, email = :email, cpf = :cpf , telefone = :telefone WHERE idcliente = :id";
        }else{
            $query = "INSERT INTO cliente (nome, email, cpf, telefone) VALUES(:nome, :email, :cpf, :telefone)";
        }

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(":nome",$nome);
        $stmt->bindValue(":email",$email);
        $stmt->bindValue(":cpf",$cpf);
        $stmt->bindValue(":telefone",$telefone);
    
        if($id > 0){
            $stmt->bindValue(":id",$id);
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