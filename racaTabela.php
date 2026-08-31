<?php

require_once "m/racaCRUD.php";

$registros = listarRaca();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Raças</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/datatables.css">
</head>

<body>

<?php require_once "menu.php"; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Raças</h1>

        <a href="racaFormulario.php" class="btn btn-primary">
            Cadastrar
        </a>
    </div>

    <table id="tabela" class="table table-striped table-bordered">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome da raça</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach ($registros as $registro): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($registro['idRaca']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($registro['nmRaca']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($registro['descricao']) ?>
                </td>

                <td>

                    <a
                        href="racaFormulario.php?id=<?= $registro['idRaca'] ?>"
                        class="btn btn-warning btn-sm"
                    >
                        Editar
                    </a>

                    <button
                        type="button"
                        onclick="confirmarExclusao(<?= $registro['idRaca'] ?>)"
                        class="btn btn-danger btn-sm"
                    >
                        Excluir
                    </button>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/datatables.js"></script>
<script src="js/jquery.mask.js"></script>
<script src="js/racaTabela.js"></script>

</body>
</html>
