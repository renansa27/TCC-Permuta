<?php

class Solicitacoes {

    public function getSolicitacoes() {

        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT * FROM servico WHERE id_usu_ped =:id_usuario");
        $sql->bindValue(':id_usuario', $_SESSION['cLoginMatricula']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function addSolicitacao($mat_usu_ped, $mat_usu_sub, $tipo_servico, $data, $turno) {

        global $pdo;

        $sql = $pdo->prepare("INSERT INTO servico SET id_usu_ped=:mat_usu_ped, id_usu_sub=:mat_usu_sub, tipo_servico=:tipo_servico, data=:data, turno=:turno, status=:status");

        $sql->bindValue(":mat_usu_ped", $mat_usu_ped);
        $sql->bindValue(":mat_usu_sub", $mat_usu_sub);
        $sql->bindValue(":tipo_servico", $tipo_servico);
        $sql->bindValue(":data", $data);
        $sql->bindValue(":turno", $turno);
        $sql->bindValue(":status", 0);

        $sql->execute();

        return true;
    }

    public function updateSolicitacao($titulo, $categoria, $valor, $descricao, $estado, $id) {

        global $pdo;

        $sql = $pdo->prepare("UPDATE servico SET titulo=:titulo, id_categoria=:id_categoria, id_usuario=:id_usuario, valor=:valor, descricao=:descricao, estado=:estado WHERE id=:id");

        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":estado", $estado);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function excluirSolicitacao($id) {

        global $pdo;

        $sql = $pdo->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio=:id_anuncio");
        $sql->bindValue(":id_anuncio", $id);
        $sql->execute();

        $sql = $pdo->prepare("DELETE FROM servico WHERE id=:id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function getSolicitacao($id) {
        $array = array();

        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM servico where id=:id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }

    public function getNumUsuarios() {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM usuarios");
        $sql->execute();
        $numUsu = $sql->rowCount();

        if ($numUsu == NULL) {
            $numUsu = 0;
        }
        return $numUsu;
    }

    public function getAllNumSolicitacoes() {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM servico");
        $sql->execute();
        $numSol = $sql->rowCount();
        if ($numSol == NULL) {
            $numSol = 0;
        }
        return $numSol;
    }
    
    public function getNumSolicitacoesByMat() {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM servico WHERE id_usu_ped=:id");
        $sql->bindvalue(":id",$_SESSION['cLoginMatricula']);
        $sql->execute();
        $numSol = $sql->rowCount();
        if ($numSol == NULL) {
            $numSol = 0;
        }
        return $numSol;
    }

}