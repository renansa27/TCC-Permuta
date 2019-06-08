<?php

class Usuarios {

    public function cadastrar($nome, $graduacao, $numero, $matricula, $senha, $contato) {
        global $pdo;
        $matricula = str_pad($matricula, 10, '0', STR_PAD_LEFT);
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE matricula = :matricula");
        $sql->bindValue(":matricula", $matricula);
        $sql->execute();

        if ($sql->rowCount() == 0) {

            $sql = $pdo->prepare("INSERT INTO usuarios SET nome=:nome, graduacao = :graduacao, numero = :numero, matricula = :matricula, senha = :senha, contato = :contato, tipo_usuario=:tipo_usuario");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":graduacao", $graduacao);
            $sql->bindValue(":numero", $numero);
            $sql->bindValue(":matricula", $matricula);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":contato", $contato);
            $sql->bindValue(":tipo_usuario", 0);

            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function login($matricula, $senha) {

        global $pdo;
        $matricula = str_pad($matricula, 10, '0', STR_PAD_LEFT);
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE matricula = :matricula AND senha = :senha");
        $sql->bindValue(":matricula", $matricula);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];
            $_SESSION['cLoginMatricula'] = $matricula;
            return true;
        } else {
            return false;
        }
    }

    public function getUsuarioByMat($matricula) {
        global $pdo;
        $matricula = str_pad($matricula, 10, '0', STR_PAD_LEFT);
        $array = array();

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE matricula=:matricula");
        $sql->bindValue(":matricula", $matricula);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }

    public function getUsuariobyID($id) {
        global $pdo;
        $array = array();

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id=:id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }

}
