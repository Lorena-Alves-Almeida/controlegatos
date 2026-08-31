<?php      
include_once "menu.php";
include_once "m/gatoCRUD.php";

$registros = listarGato();
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>Tabela Gatos</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/datatables.css" />
    <link type="text/css" rel="stylesheet" href="css/estilos.css" />
</head>

<body>
    <img alt="lamp" src="https://i.postimg.cc/brDfYfj1/pink.gif" class="lamp">
    <div class="container">
        <br><br>
        <h1 class="henny-penny-regular fonteClara">Consulta - Gatos</h1>
        <br>
        <img alt="caveira" src="https://i.postimg.cc/hPxn9BLk/IMG_8818.png" class="iconeTitulo">
        <a href="gatoFormulario.php" class="btn btn-primary float-right mb-2">Cadastrar</a>
        <div id="fundoTabela">
            <table id="tabela" class="table" style="border: 2px dotted black; border-radius: 10px;">
                <thead class="thead-dark">
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Raça</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $fotoExibir = "";
                        foreach($registros as $registro){
                            $fotoExibir = ($registro['foto'] != null) ? $registro['foto'] : "imagens/padrao.png";
                    ?>
                            <tr> 
                                <td><img class='fotoPequena' src='<?= $fotoExibir ?>'></td>
                                <td><?= $registro['NmGato'] ?></td>
                                <td><?= $registro['idRaca'] ?></td>
                                <td>R$ <?= number_format($registro['Preco'], 2, ',', '.') ?></td>
                                <td><?= $registro['Descricao'] ?></td>
                                <td>
                                    <button onclick='confirmarExclusao(<?= $registro['CdGato'] ?>)' class='btn btn-danger float-right' style='background-color: #bf0066'>Excluir</button>
                                    <a href='gatoFormulario.php?CdGato=<?= $registro['CdGato'] ?>' class='btn btn-warning float-right mr-1' style='margin: 4px; background-color: #fff387;'>Editar</a>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
    <script type="text/javascript" src="js/datatables.js"></script>
    <script type="text/javascript" src="js/gatoTabela.js"></script>
</body>
</html>