<?php

require './config.php';
if (empty($_SESSION['cLogin'])) {
    header("Location: login.php");
    exit();
}
require './classes/solicitacoes.class.php';
require './classes/usuarios.class.php';

$a = new Solicitacoes();

if (isset($_GET['id']) && (!empty($_GET['id']))) {

    $a->enviarSolMaj($_GET['id']);
}

header("Location: solicitacoes.php");
