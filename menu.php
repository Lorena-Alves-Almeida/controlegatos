<?php
session_start();

if (!isset($_COOKIE['idUsuario'])) {
    echo "<script>alert('Acesso negado!'); location.href='login.php';</script>";
    exit();
}
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <div class="container-fluid">

        <a class="navbar-brand" href="index.php">PWII</a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav me-auto mb-2 mb-md-0">

                <li class="nav-item">
                    <a class="nav-link" href="usuarioTabela.php">
                        Usuários
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="gatoTabela.php">
                        Gatos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="racaTabela.php">
                        Raças
                    </a>
                </li>

            </ul>

        </div>

        <div class="form-inline my-2 my-lg-0">

            <label class="form-control mr-sm-2" readonly>

                <img
                    style="width: 35px; height: 35px; border-radius: 5px;"
                    name="fotoUsuario"
                    src="<?= !empty($_COOKIE['foto']) ? $_COOKIE['foto'] : 'imagens/padrao.png' ?>"
                    alt="Foto do usuário"
                >

                <?= !empty($_COOKIE['usuario']) ? $_COOKIE['usuario'] : 'visitante' ?>

            </label>

            <a
                class="btn btn-outline-danger my-2 my-sm-0"
                href="c/finalizarSessao.php"
            >
                Sair
            </a>

        </div>

    </div>

</nav>
