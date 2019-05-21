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
    $u = new Usuarios();
    $usu = $u->getUsuariobyID($_SESSION['cLogin']);
    if ($usu['tipo_usuario'] == 0) {
        $a->recusaSolSub($_GET['id']);
    } elseif ($usu['tipo_usuario'] == 1) {
        $a->recusaSolSarg($_GET['id']);
    } elseif ($usu['tipo_usuario'] == 2) {
        $a->recusaSolCom($_GET['id']);
    }
}

header("Location: solicitacoes.php");
