<?php
session_start();

$user = isset($_POST["user"])?$_POST["user"]:"";
$senha = isset($_POST["senha"])?$_POST["senha"]:"";

    include "conexao.php";

    $query = "SELECT * FROM adm WHERE numeroRegistro = :user AND senha = :senha";

    $stmt = $conexao->prepare($query);

    $stmt->bindValue(":user",$user);
    $stmt->bindValue(":senha",$senha);

    if ($stmt->execute()){
        $adm = $stmt->fetch();

        if($adm){ 
            $_SESSION["usuario"] = $adm["numeroRegistro"];
            header("location: indexlogin.php");
        }else{
            header("location: login.php");
        }
    }
?>