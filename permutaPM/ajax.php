<?php

require "./config.php";

global $pdo;

$matricula = $_GET['matricula'];

$dados = array();

$sql = $pdo->prepare("SELECT nome,numero,graduacao,contato FROM usuarios WHERE matricula = :matricula ");
$sql->bindValue(":matricula",$matricula);
$sql->execute();

if($sql->rowCount()>0){
    $dados = $sql->fetchAll();
    echo json_encode($dados);
    return true;
}
return false;
