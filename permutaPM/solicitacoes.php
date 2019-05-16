<?php require 'pages/header.php'; ?>
<?php
if (empty($_SESSION['cLogin'])) {
    ?>
    <script type="text/javascript">window.location.href = "login.php";</script>
    <?php
    exit();
}
?>
<div class="container">
    <h1>Minhas Permutas</h1>

    <!--a href="solicitacaoPermuta.php" class="btn btn-default">Adicionar solicitação</a-->

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Substituto</th>
                <th>Tipo de Serviço</th>
                <th>Data</th>
                <th>Turno</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
        require './classes/solicitacoes.class.php';
        $s = new Solicitacoes();
        $solicitacoes = $s->getSolicitacoes();

        foreach ($solicitacoes as $solicitacao):
            ?>
            <tr>
                <td>
                    <?php
                    $usu = new Usuarios();
                    $nome_requerido = $usu->getUsuarioByMat($solicitacao['id_usu_sub']);
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
                    }
                    ?>
                </td>
                <td>
                    <!--a href="editar-anuncio.php?id=<!--?php echo $solicitacao['id']; ?>" class="btn btn-success">Editar</a-->
                    <a href="excluir-anuncio.php?id=<?php echo $solicitacao['id']; ?>" class="btn btn-danger">Excluir permuta</a>
                </td>
            </tr>
        <?php endforeach;
        ?>
    </table>
    <h1>Permutas para avaliação</h1>
</div>
<?php
require './pages/footer.php';
