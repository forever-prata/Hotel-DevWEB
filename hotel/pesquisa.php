<?php 

include_once "config.php";
try{
    $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

    $busca = isset($_GET['busca'])?$_GET['busca']:"";
    $query = "SELECT * FROM contato";
    
    if ($busca != ""){
        $busca = '%'.$busca.'%';
        $query .= ' WHERE nome like :busca' ;
    }

    $stmt = $conexao->prepare($query);

    if ($busca != ""){
        $stmt->bindValue(':busca',$busca);
    }

    $stmt->execute();
    $usuarios = $stmt->fetchAll();
    
    echo json_encode($usuarios);

}catch(PDOExeptio $e){
    print("Erro ao conectar com o banco de dados . . . <bre>".$e->getMenssage());
    die();
}

?>