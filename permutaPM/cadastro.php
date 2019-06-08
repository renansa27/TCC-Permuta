<?php require './pages/header.php'; ?>

<div class="container">
    <h1>Cadastre-se</h1>
    <?php
    //require './classes/usuarios.class.php';
    $u = new Usuarios();

    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $graduacao = addslashes($_POST['graduacao']);
        $numero = addslashes($_POST['numero']);
        $matricula = addslashes($_POST['matricula']);
        $senha = $_POST['senha'];
        $contato = addslashes($_POST['contato']);

        if (!empty($nome) && !empty($graduacao) && !empty($numero) && !empty($matricula) && !empty($senha) && !empty($contato)) {
            if ($u->cadastrar($nome, $graduacao, $numero, $matricula, $senha, $contato)) {
                ?>
                <div class="alert alert-success">
                    <strong>Parabéns!</strong> Cadastrado com sucesso!
                    <a href="login.php" class="alert-link">Faça o login agora</a>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-warning">
                    Este usuário já existe!
                    <a href="login.php" class="alert-link">Faça o login agora</a>
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
        <strong style="font-size: 20px">DADOS DO PM</strong>
        <div class="row">
            <div style="margin: 15px 0px" class="col-xs-6">
                <label for="nome">NOME</label>
                <input type='text' name="nome" id="nome" class="form-control"  />
            </div>
            <div style="margin: 15px 0px" class="col-xs-3">
                <label for="graduacao">GRADUAÇÃO</label>
                <select class="form-control">
                    <option value="Coronel">Coronel</option>
                    <option value="Tenente-Coronel">Tenente-Coronel</option>
                    <option value="Major">Major</option>
                    <option value="Capitão">Capitão</option>
                    <option value="Primeiro-Tenente">Primeiro-Tenente</option>
                    <option value="Segundo-Tenente">Segundo-Tenente</option>
                    <option value="Aspirante">Aspirante</option>
                    <option value="Subtenente">Subtenente</option>
                    <option value="Primeiro-Sargento">Primeiro-Sargento</option>
                    <option value="Segundo-Sargento">Segundo-Sargento</option>
                    <option value="Terceiro-Sargento">Terceiro-Sargento</option>
                    <option value="Cabo">Cabo</option>
                    <option value="Soldado">Soldado</option>
                </select>
            </div>
            <div style="margin: 15px 0px" class="col-xs-3">
                <label for="numero">NÚMERO</label>
                <input type='text' name="numero" id="numero" class="form-control" />
            </div>
        </div>
        <div style="margin-bottom: 15px" class="row">
            <div class="col-xs-4">
                <label for="matricula">MATRÍCULA</label>
                <input type='text' name="matricula" id="matricula" class="form-control" />
            </div>
            <div class="col-xs-4">
                <label for="contato">CONTATO</label>
                <input type='text' name="contato" id="contato" class="form-control" />
            </div>
            <div class="col-xs-4">
                <label for="senha">SENHA</label>
                <input type='password' name="senha" id="senha" class="form-control" />
            </div>
        </div>
        <input type="submit" value="Cadastrar"/>
    </form>
</div>

<?php
require './pages/footer.php';
