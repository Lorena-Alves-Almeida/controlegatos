<?php

require_once "m/racaCRUD.php";

$idRaca = isset($_GET['id'])
    ? (int) $_GET['id']
    : 0;

$nmRaca = '';
$descricao = '';

if ($idRaca > 0) {

    $registro = recuperarRacaPorId($idRaca);

    if (!$registro) {
        header('Location: racaTabela.php');
        exit;
    }

    $nmRaca = $registro['nmRaca'];
    $descricao = $registro['descricao'];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">

    <title>
        <?= $idRaca > 0 ? 'Editar Raça' : 'Cadastrar Raça' ?>
    </title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<?php require_once "menu.php"; ?>

<div class="container mt-4">

    <h1>
        <?= $idRaca > 0 ? 'Editar Raça' : 'Cadastrar Raça' ?>
    </h1>

    <hr>

    <form
        action="c/racaSalvar.php"
        method="post"
        id="formulario"
    >

        <input
            type="hidden"
            name="idRaca"
            value="<?= $idRaca ?>"
        >

        <div class="mb-3">

            <label for="nmRaca" class="form-label">
                Nome da raça
            </label>

            <input
                type="text"
                class="form-control"
                id="nmRaca"
                name="nmRaca"
                value="<?= htmlspecialchars($nmRaca) ?>"
                maxlength="100"
                required
            >

        </div>

        <div class="mb-3">

            <label for="descricao" class="form-label">
                Descrição
            </label>

            <textarea
                class="form-control"
                id="descricao"
                name="descricao"
                rows="4"
                required
            ><?= htmlspecialchars($descricao) ?></textarea>

        </div>

        <a
            href="racaTabela.php"
            class="btn btn-secondary"
        >
            Voltar
        </a>

        <button
            type="submit"
            class="btn btn-success"
        >
            Salvar
        </button>

    </form>

</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/racaFormulario.js"></script>

</body>
</html>
