<?php require './pages/header.php'; ?>

<div class="container">
    <img src="assets/images/Banner-SSPDS.jpg" height="100" alt="Responsive image" class="img-rounded"/>
    <?php
    require './classes/solicitacoes.class.php';
    $s = new Solicitacoes();

    if (isset($_POST['servico']) && !empty($_POST['servico'])) {
        $mat_usu_substituido = addslashes($_POST['matricula1']);
        $mat_usu_substituto = addslashes($_POST['matricula2']);
        $tipo_servico = addslashes($_POST['servico']);
        $data = addslashes($_POST['data']);
        $turno = addslashes($_POST['turno']);

        if (!empty($mat_usu_substituido) && !empty($mat_usu_substituto) && !empty($tipo_servico) && !empty($data) && !empty($turno)) {
            if ($s->addSolicitacao($mat_usu_substituido, $mat_usu_substituto, $tipo_servico, $data, $turno)) {
                ?>
                <div class="alert alert-success">
                    <strong>Solicitaçao realizada!</strong>
                    <a href="solicitacoes.php" class="alert-link">Confira o status</a>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-warning">
                    Solicitação não realizada!
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-warning">
                Preencha todos os campos!
            </div>
            <?php
        }
    }
    ?>
    <form method="POST">
        <div>
            <strong style="font-size: 20px">Polícia Militar do Ceará</strong>
        </div>
        <div>
            <strong style="font-size: 20px">5º BPM - Núcleo da 1ª Cia de Polícia Militar</strong>
        </div>
        <div>
            <strong style="font-size: 20px">REQUISIÇÃO PARA SUBSTITUIÇÃO CONSENSUAL DE SERVIÇO</strong>
        </div>
        <div class="row">
            <div style="margin: 15px 0px" class="col-xs-6">
                <label for="servico">TIPO DE SERVIÇO</label>
                <input type='text' name="servico" id="servico" class="form-control"  />
            </div>
            <div style="margin: 15px 0px" class="col-xs-3">
                <label for="data">DATA</label>
                <input type='date' name="data" id="data" class="form-control" />
            </div>
            <div style="margin: 15px 0px" class="col-xs-3">
                <label for="turno">TURNO</label>
                <input type='text' name="turno" id="turno" class="form-control" />
            </div>
        </div>
        <strong style="font-size: 20px">DADOS DO PM SUBSTITUTO</strong>
        <div class="row">
            <div style="margin: 15px 0px" class="col-xs-6">
                <label for="nome2">NOME</label>
                <input style="background-color: #D3D3D3" type='text' name="nome2" id="nome2" class="form-control" readonly  />
            </div>
            <div style="margin: 15px 0px" class="col-xs-3">
                <label for="graduacao2">GRADUAÇÃO</label>
                <input style="background-color: #D3D3D3" type='text' name="graduacao2" id="graduacao2" class="form-control" readonly />
            </div>
            <div style="margin: 15px 0px" class="col-xs-3">
                <label for="numero2">NÚMERO</label>
                <input style="background-color: #D3D3D3" type='text' name="numero2" id="numero2" class="form-control" readonly />
            </div>
        </div>
        <div style="margin-bottom: 15px" class="row">
            <div class="col-xs-6">
                <label for="matricula2">MATRÍCULA</label>
                <input type='text' placeholder="Digite uma matrícula" name="matricula2" id="matricula2" class="form-control" />
            </div>
            <script>
                $('#matricula2').blur(function () {
                    $(document).ready(function () {
                        var matricula2 = $("#matricula2").val();
                        var matricula_ajax = {
                            "matricula": matricula2
                        };
                        $.ajax({
                            type: 'GET',
                            url: "ajax.php",
                            data: matricula_ajax,
                            success: function (response) {
                                try {
                                    var dados = JSON.parse(response);
                                    $("#nome2").val(dados[0].nome);
                                    $("#graduacao2").val(dados[0].graduacao);
                                    $("#numero2").val(dados[0].numero);
                                    $("#contato2").val(dados[0].contato);
                                } catch (e) {
                                    alert("Matrícula inexistente");
                                }
                            },
                            error: function () {
                                alert("Não foi possivel");
                            }
                        });
                    });
                });
            </script>
            <div class="col-xs-6">
                <label for="contato2">CONTATO</label>
                <input style="background-color: #D3D3D3" type='tel' name="contato2" id="contato2" class="form-control" readonly />
            </div>
        </div>
        <strong style="font-size: 20px">DADOS DO PM SUBSTITUÍDO</strong>
        <div class="row">
            <div style="margin: 15px 0px" class="col-xs-6">
                <label for="nome1">NOME</label>
                <input style="background-color: #D3D3D3" type='text' name="nome1" id="nome1" class="form-control" readonly  />
            </div>
            <div style="margin: 15px 0px" class="col-xs-3">
                <label for="graduacao1">GRADUAÇÃO</label>
                <input style="background-color: #D3D3D3" type='text' name="graduacao1" id="graduacao1" class="form-control" readonly />
            </div>
            <div style="margin: 15px 0px" class="col-xs-3">
                <label for="numero1">NÚMERO</label>
                <input style="background-color: #D3D3D3" type='text' name="numero1" id="numero1" class="form-control" readonly />
            </div>
        </div>
        <div style="margin-bottom: 15px" class="row">
            <div class="col-xs-6">
                <label for="matricula1">MATRÍCULA</label>
                <input type='text' placeholder="Digite uma matrícula" name="matricula1" id="matricula1" class="form-control" />
            </div>
            <script>
                $('#matricula1').blur(function () {
                    $(document).ready(function () {
                        var matricula1 = $("#matricula1").val();
                        var matricula_ajax = {
                            "matricula": matricula1
                        };
                        $.ajax({
                            type: 'GET',
                            url: "ajax.php",
                            data: matricula_ajax,
                            success: function (response) {
                                try {
                                    var dados = JSON.parse(response);
                                    $("#nome1").val(dados[0].nome);
                                    $("#graduacao1").val(dados[0].graduacao);
                                    $("#numero1").val(dados[0].numero);
                                    $("#contato1").val(dados[0].contato);
                                } catch (e) {
                                    alert("Matrícula inexistente");
                                }
                            },
                            error: function () {
                                alert("Não foi possivel");
                            }
                        });
                    });
                });
            </script>
            <div class="col-xs-6">
                <label for="contato1">CONTATO</label>
                <input style="background-color: #D3D3D3" type='tel' name="contato1" id="contato1" class="form-control" readonly />
            </div>
        </div>
        <input style="margin-bottom: 50px" class="btn btn-default" type="submit" value="Solicitar permuta" />
    </form>
</div>

<?php
require './pages/footer.php';
