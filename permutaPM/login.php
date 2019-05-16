<?php require './pages/header.php'; ?>

<div class="container">
    <h1>Login</h1>
    <?php
    //require './classes/usuarios.class.php';
    $u = new Usuarios();
    if (isset($_POST['matricula']) && !empty($_POST['matricula'])) {
        $matricula = addslashes($_POST['matricula']);
        $senha = $_POST['senha'];

        if ($u->login($matricula, $senha)) {
            ?>
            <script type="text/javascript">window.location.href = "./?id=<?php echo $_SESSION['cLogin'] ?>";</script>
            <?php
        } else {
            ?>
            <div class="alert alert-danger">
                Usuário e/ou Senha errados!
            </div>
            <?php
        }
    }
    ?>
    <form method="POST">

        <dl>
            <dt>
                <label for="matricula">Matrícula</label>
            </dt>
            <dd>
                <input type='text' name="matricula" id="matricula" />
            </dd>
            <dt>
                <label for="senha">Senha</label>
            </dt>
            <dd>
                <input type='password' name="senha" id="senha" />
            </dd>
            <dt>
            <input style="margin-top: 10px" type='submit' value="Login" class="btn btn-default" />
            </dt>
        </dl>
    </form>
</div>

<?php
require './pages/footer.php';
