<?php

require_once "../m/racaCRUD.php";

$idRaca = isset($_POST['idRaca'])
    ? (int) $_POST['idRaca']
    : 0;

$nmRaca = trim($_POST['nmRaca'] ?? '');
$descricao = trim($_POST['descricao'] ?? '');

if ($nmRaca === '' || $descricao === '') {
    echo "<script>
        alert('Preencha todos os campos.');
        window.location.replace('../racaFormulario.php');
    </script>";
    exit;
}

$idSalvo = salvarRaca(
    $idRaca,
    $nmRaca,
    $descricao
);

if ($idSalvo > 0) {

    echo "<script>
        alert('Raça salva com sucesso!');
        window.location.replace('../racaTabela.php');
    </script>";

} else {

    echo "<script>
        alert('Erro ao salvar a raça.');
        window.location.replace('../racaFormulario.php');
    </script>";
}
