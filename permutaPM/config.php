<?php

session_start();

global $pdo;

try{
    $pdo = new PDO("mysql:dbname=permutapm;host=localhost;charset=utf8;","root","");
} catch (PDOException $ex) {
    echo "ERRO: ".$ex->getMessage();
    exit;
}