<?php

require_once "bancoDadosCRUD.php";

function salvarRaca($idRaca, $nmRaca, $descricao)
{
    try {

        $conexao = criarConexao();

        if ($idRaca > 0) {

            $sql = "
                UPDATE tbraca
                SET
                    nmRaca = :nmRaca,
                    descricao = :descricao
                WHERE idRaca = :idRaca
            ";

        } else {

            $sql = "
                INSERT INTO tbraca
                    (nmRaca, descricao)
                VALUES
                    (:nmRaca, :descricao)
            ";
        }

        $sentenca = $conexao->prepare($sql);

        $sentenca->bindValue(':nmRaca', $nmRaca);
        $sentenca->bindValue(':descricao', $descricao);

        if ($idRaca > 0) {
            $sentenca->bindValue(':idRaca', $idRaca);
        }

        $sentenca->execute();

        if ($idRaca == 0) {
            $idRaca = (int) $conexao->lastInsertId();
        }

        return $idRaca;

    } catch (PDOException $erro) {

        criarArquivoErro($erro);

        return 0;
    }
}


function excluirRaca($idRaca)
{
    try {

        $conexao = criarConexao();

        $sql = "
            DELETE FROM tbraca
            WHERE idRaca = :idRaca
        ";

        $sentenca = $conexao->prepare($sql);

        $sentenca->bindValue(':idRaca', $idRaca, PDO::PARAM_INT);

        $sentenca->execute();

        return $sentenca->rowCount();

    } catch (PDOException $erro) {

        criarArquivoErro($erro);

        return 0;
    }
}


function listarRaca()
{
    try {

        $conexao = criarConexao();

        $sql = "
            SELECT
                idRaca,
                nmRaca,
                descricao
            FROM tbraca
            ORDER BY nmRaca
        ";

        $sentenca = $conexao->prepare($sql);

        $sentenca->execute();

        return $sentenca->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $erro) {

        criarArquivoErro($erro);

        return [];
    }
}


function recuperarRacaPorId($idRaca)
{
    try {

        $conexao = criarConexao();

        $sql = "
            SELECT
                idRaca,
                nmRaca,
                descricao
            FROM tbraca
            WHERE idRaca = :idRaca
        ";

        $sentenca = $conexao->prepare($sql);

        $sentenca->bindValue(':idRaca', $idRaca, PDO::PARAM_INT);

        $sentenca->execute();

        return $sentenca->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $erro) {

        criarArquivoErro($erro);

        return false;
    }
}


function verificarRacaPorDescricao($idRaca, $descricao)
{
    try {

        $conexao = criarConexao();

        $sql = "
            SELECT COUNT(*)
            FROM tbraca
            WHERE descricao = :descricao
              AND idRaca <> :idRaca
        ";

        $sentenca = $conexao->prepare($sql);

        $sentenca->bindValue(':descricao', $descricao);
        $sentenca->bindValue(':idRaca', $idRaca, PDO::PARAM_INT);

        $sentenca->execute();

        return (int) $sentenca->fetchColumn();

    } catch (PDOException $erro) {

        criarArquivoErro($erro);

        return 0;
    }
}
