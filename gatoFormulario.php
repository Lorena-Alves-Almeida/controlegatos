<?php

require_once "m/gatoCRUD.php";
require_once "m/racaCRUD.php";

$CdGato = isset($_GET['CdGato'])
    ? (int) $_GET['CdGato']
    : 0;

$NmGato = '';
$Raca = '';
$Preco = '';
$Descricao = '';
$Foto = '';

if ($CdGato > 0) {

    $gato = recuperarGatoPorId($CdGato);

    if (!$gato) {
        header("Location: gatoTabela.php");
        exit;
    }

    $NmGato = $gato['NmGato'] ?? '';
    $Raca = $gato['Raca'] ?? '';
    $Preco = $gato['Preco'] ?? '';
    $Descricao = $gato['Descricao'] ?? '';
    $Foto = $gato['foto'] ?? '';
}

$racas = listarRaca();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?= $CdGato > 0 ? 'Editar Gato' : 'Cadastrar Gato' ?>
    </title>

    <link
        rel="stylesheet"
        href="css/bootstrap.css"
    >

    <link
        rel="stylesheet"
        href="css/estilos.css"
    >

</head>

<body>

<?php require_once "menu.php"; ?>

<div class="container mt-4">

    <h1>
        <?= $CdGato > 0 ? 'Editar Gato' : 'Cadastrar Gato' ?>
    </h1>

    <hr>

    <form
        action="c/gatoSalvar.php"
        method="post"
        enctype="multipart/form-data"
        id="formulario"
    >

        <input
            type="hidden"
            name="CdGato"
            value="<?= $CdGato ?>"
        >

        <div class="mb-3">

            <label
                for="NmGato"
                class="form-label"
            >
                Nome do gato
            </label>

            <input
                type="text"
                class="form-control"
                id="NmGato"
                name="NmGato"
                value="<?= htmlspecialchars($NmGato) ?>"
                maxlength="100"
                required
            >

        </div>

        <div class="mb-3">

            <label
                for="Raca"
                class="form-label"
            >
                Raça
            </label>

            <select
                class="form-select"
                id="Raca"
                name="Raca"
                required
            >

                <option value="">
                    Selecione uma raça
                </option>

                <?php foreach ($racas as $raca): ?>

                    <option
                        value="<?= (int) $raca['idRaca'] ?>"
                        <?= ((int) $Raca === (int) $raca['idRaca']) ? 'selected' : '' ?>
                    >
                        <?= htmlspecialchars($raca['nmRaca']) ?>
                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="mb-3">

            <label
                for="Preco"
                class="form-label"
            >
                Preço
            </label>

            <input
                type="number"
                class="form-control"
                id="Preco"
                name="Preco"
                value="<?= htmlspecialchars($Preco) ?>"
                min="0"
                step="0.01"
                required
            >

        </div>

        <div class="mb-3">

            <label
                for="Descricao"
                class="form-label"
            >
                Descrição
            </label>

            <textarea
                class="form-control"
                id="Descricao"
                name="Descricao"
                rows="4"
                maxlength="500"
            ><?= htmlspecialchars($Descricao) ?></textarea>

        </div>

        <div class="mb-3">

            <label
                for="foto"
                class="form-label"
            >
                Foto
            </label>

            <input
                type="file"
                class="form-control"
                id="foto"
                name="foto"
                accept="image/jpeg,image/png,image/webp"
            >

        </div>

        <?php if (!empty($Foto)): ?>

            <div class="mb-3">

                <p>Foto atual:</p>

                <img
                    src="imagens/<?= htmlspecialchars($Foto) ?>"
                    alt="Foto de <?= htmlspecialchars($NmGato) ?>"
                    class="img-thumbnail"
                    style="max-width: 200px;"
                >

            </div>

        <?php endif; ?>

        <div class="mt-4">

            <a
                href="gatoTabela.php"
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

        </div>

    </form>

</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/gatoFormulario.js"></script>

</body>

</html>