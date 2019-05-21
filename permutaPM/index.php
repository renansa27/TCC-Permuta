<?php require './pages/header.php'; ?>
<?php require './classes/solicitacoes.class.php'; ?>
<?php
$s = new Solicitacoes();
$u = new Usuarios();
if (isset($_SESSION['cLogin'])) {
    $usu = $u->getUsuariobyID($_SESSION['cLogin']);
}
?>

<div class="container-fluid">
    <div class="jumbotron">
        <?php
        if (isset($_SESSION['cLogin']) && $usu['tipo_usuario'] == 2):
            ?>
            <h2>
                Você tem 
                <?php
                $numSol = $s->getNumSolicitacoesCom();
                echo $numSol;
                ?> 
                permutas para analisar.
            </h2>
            <?php
        elseif (isset($_SESSION['cLogin']) && $usu['tipo_usuario'] == 1):
            ?>
            <h2>Você tem 
                <?php
                $numSol = $s->getNumSolicitacoesSarg();
                echo $numSol;
                ?> permutas para analisar.</h2>
            <?php
        elseif (isset($_SESSION['cLogin']) && $usu['tipo_usuario'] == 0):
            ?>
            <h2>
                Você tem 
                <?php
                $numSol = $s->getNumSolicitacoesByMat();
                echo $numSol;
                ?> permutas em análise.
            </h2>
            <?php
        elseif (isset($_SESSION)):
            ?>
            <h2>
                Hoje temos <?php
                if ($s->getAllNumSolicitacoes() == 1) {
                    echo $s->getAllNumSolicitacoes();
                    ?> 
                    solicitação no sistema
                    <?php
                } else {
                    echo $s->getAllNumSolicitacoes();
                    ?> solicitações no sistema </h2>

            <?php }endif; ?>
    </div>
</div>
</body>
</html>

<?php
require './pages/footer.php';
