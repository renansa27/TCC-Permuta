<!DOCTYPE html>
<?php require './config.php'; ?>
<?php require './classes/usuarios.class.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Permuta PM</title>
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="./assets/css/style.css"/>
        <script type="text/javascript" src="./assets/js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./assets/js/script.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                        <a href="./?id=<?php echo $_SESSION['cLogin'] ?>" class="navbar-brand">Permuta PM</a>
                    <?php else: ?>
                        <a href="./" class="navbar-brand">Permuta PM</a>
                    <?php endif; ?>
                </div>
                <div class="navbar-nav">
                    <ul class="nav navbar-nav navbar-center">
                        <?php
                        /* Vai ser aqui o código para criar um usuario */
                        if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])):
                            $info;
                            if (isset($_GET['id']) && !empty($_GET['id'])):
                                $u = new Usuarios();
                                $info = $u->getUsuariobyID($_GET['id']);
                                ?>
                                <li>
                                    <a><?php echo " " . $info['graduacao'] . " " . $info['nome'] ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li>
                                <a>Seja bem vindo</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                        <?php
                        if (empty($info)) {
                            $u = new Usuarios;
                            $info = $u->getUsuariobyID($_SESSION['cLogin']);
                        }
                        ?>
                        <?php if ($info['tipo_usuario'] == 0): ?>
                            <li>
                                <a href="./solicitacaoPermuta.php">Solicitar permuta</a>
                            </li>
                            <li>
                                <a href="./solicitacoes.php">Solicitações</a>
                            </li>
                            <li>
                                <a href="./sair.php">Sair</a>
                            </li>
                        <?php elseif ($info['tipo_usuario'] == (1 || 2)): ?>
                            <li>
                                <a href='./solicitacoes.php'>Analisar</a>
                            </li>
                            <li>
                                <a href="./sair.php">Sair</a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li>
                            <a href='./cadastro.php'>Cadastre-se</a>
                        </li>
                        <li>
                            <a href="./login.php">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>