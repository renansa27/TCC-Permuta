<?php require 'pages/header.php'; ?>

<?php
if (empty($_SESSION['cLogin'])) {
    ?>
    <script type="text/javascript">window.location.href = "login.php";</script>
    <?php
    exit();
}
require './classes/solicitacoes.class.php';
$s = new Solicitacoes();
$u = new Usuarios();
$usu = $u->getUsuariobyID($_SESSION['cLogin']);
?>
<div class="container">
    <?php if ($usu['tipo_usuario'] == 0): ?>
        <h1>Minhas Permutas</h1>

        <!--a href="solicitacaoPermuta.php" class="btn btn-default">Adicionar solicitação</a-->

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Subtituído</th>
                    <th>Substituto</th>
                    <th>Tipo de Serviço</th>
                    <th>Data</th>
                    <th>Turno</th>
                    <th>Status</th>
                    <!--th>Ações</th-->
                </tr>
            </thead>
            <?php
            //require './classes/solicitacoes.class.php';
            //$s = new Solicitacoes();
            $solicitacoes = $s->getSolicitacoes();

            foreach ($solicitacoes as $solicitacao):
                ?>
                <tr>
                    <td>
                        <?php
                        $usuCopy = new Usuarios();
                        $nome_requerinte = $usuCopy->getUsuarioByMat($solicitacao['id_usu_ped']);
                        echo $nome_requerinte['graduacao'] . " " . $nome_requerinte['nome'];
                        ?>
                    </td>
                    <td>
                        <?php
                        //$usu = new Usuarios();
                        $nome_requerido = $u->getUsuarioByMat($solicitacao['id_usu_sub']);
                        echo $nome_requerido['graduacao'] . " " . $nome_requerido['nome'];
                        ?>
                    </td>
                    <td>
                        <?php echo $solicitacao['tipo_servico']; ?>
                    </td>
                    <td>
                        <?php echo date("d/m/Y", strtotime($solicitacao['data'])); ?>
                    </td>
                    <td><?php echo $solicitacao['turno']; ?>
                    <td><?php
                        if ($solicitacao['status'] == 0) {
                            echo "Substituto avaliando";
                        } elseif ($solicitacao['status'] == 1) {
                            echo "Sargento avaliando";
                        } elseif ($solicitacao['status'] == 2) {
                            echo "Comandante avaliando";
                        } elseif ($solicitacao['status'] == 3) {
                            echo "Substituto recusou";
                        } elseif ($solicitacao['status'] == 4) {
                            echo "Sargento recusou";
                        } elseif ($solicitacao['status'] == 5) {
                            echo "Comandante recusou";
                        } elseif ($solicitacao['status'] == 6) {
                            echo "Permuta aceita";
                        }
                        ?>
                    </td>
                    <!--td>
                        <a href="editar-anuncio.php?id=<!--?php echo $solicitacao['id']; ?>" class="btn btn-success">Editar</a>
                        <a href="excluir-anuncio.php?id=</*?php echo $solicitacao['id']; ?>*/" class="btn btn-danger">Excluir permuta</a>
                    </td-->
                </tr>
            <?php endforeach;
            ?>
        </table>
    <?php endif; ?>
    <h1>Permutas para avaliação</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Subtituído</th>
                <th>Substituto</th>
                <th>Tipo de Serviço</th>
                <th>Data</th>
                <th>Turno</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
        //require './classes/solicitacoes.class.php';
        //$s = new Solicitacoes();
        if ($usu['tipo_usuario'] == 0) {
            $solicitacoes = $s->getSolicitacoesAnalise();
        } elseif ($usu['tipo_usuario'] == 1) {
            $solicitacoes = $s->getSolicitacoesAnaliseSarg();
        } elseif ($usu['tipo_usuario'] == 2) {
            $solicitacoes = $s->getSolicitacoesAnaliseCom();
        }

        foreach ($solicitacoes as $solicitacao):
            ?>
            <tr>
                <td>
                    <?php
                    $usuCopy = new Usuarios();
                    $nome_requerinte = $usuCopy->getUsuarioByMat($solicitacao['id_usu_ped']);
                    echo $nome_requerinte['graduacao'] . " " . $nome_requerinte['nome'];
                    ?>
                </td>
                <td>
                    <?php
                    $nome_requerido = $usuCopy->getUsuarioByMat($solicitacao['id_usu_sub']);
                    echo $nome_requerido['graduacao'] . " " . $nome_requerido['nome'];
                    ?>
                </td>
                <td>
                    <?php echo $solicitacao['tipo_servico']; ?>
                </td>
                <td>
                    <?php echo date("d/m/Y", strtotime($solicitacao['data'])); ?>
                </td>
                <td><?php echo $solicitacao['turno']; ?>
                <td><?php
                    if ($solicitacao['status'] == 0) {
                        echo "Substituto avaliando";
                    } elseif ($solicitacao['status'] == 1) {
                        echo "Sargento avaliando";
                    } elseif ($solicitacao['status'] == 2) {
                        echo "Comandante avaliando";
                    } elseif ($solicitacao['status'] == 3) {
                        echo "Substituto recusou";
                    } elseif ($solicitacao['status'] == 4) {
                        echo "Sargento recusou";
                    } elseif ($solicitacao['status'] == 5) {
                        echo "Comandante recusou";
                    } elseif ($solicitacao['status'] == 6) {
                        echo "Permuta aceita";
                    }
                    ?>
                </td>
                <td>
                    <?php if ($usu['tipo_usuario'] == 1): ?>
                        <a href="aceitar-permuta.php?id=<?php echo $solicitacao['id']; ?>" class="btn btn-success">Aceitar</a>
                        <a href="envia-maj.php?id=<?php echo $solicitacao['id']; ?>" class="btn btn-warning">Enviar Comandante</a>
                        <a href="recusar-permuta.php?id=<?php echo $solicitacao['id']; ?>" class="btn btn-danger">Recusar</a>
                    <?php elseif ($usu['tipo_usuario'] == 2): ?>
                        <a href="aceitar-permuta.php?id=<?php echo $solicitacao['id']; ?>" class="btn btn-success">Aceitar</a>
                        <a href="recusar-permuta.php?id=<?php echo $solicitacao['id']; ?>" class="btn btn-danger">Recusar</a>
                    <?php elseif ($usu['tipo_usuario'] == 0): ?>
                        <a href="aceitar-permuta.php?id=<?php echo $solicitacao['id']; ?>" class="btn btn-success">Aceitar</a>
                        <a href="recusar-permuta.php?id=<?php echo $solicitacao['id']; ?>" class="btn btn-danger">Recusar</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach;
        ?>
    </table>
</div>
<?php
require './pages/footer.php';
