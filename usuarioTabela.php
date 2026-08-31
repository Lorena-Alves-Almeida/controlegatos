	<?php		
		include_once "m/usuarioCRUD.php";
		include_once "menu.php";
		$registros = listarUsuario();

	?>

	<html>

	<head>
	    <meta charset="utf-8" />
	    <title> Usuário </title>
	    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="css/datatables.css" />
	    <link type="text/css" rel="stylesheet" href="css/estilos.css" />
	</head>

	<body>
	    <div class="container">
			<h1 class="henny-penny-regular fonteClara">Usuários</h1>
			<hr/>
	        <a href="usuarioFormulario.php" class="btn btn-primary float-right mb-2">Cadastrar</a>
	        <table id="tabela" class="table">
	            <thead class="thead-dark">
	                <tr>
						<th></th>
	                    <th>Usuário</th>
						<th></th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php	
						$fotoExibir = "";
						foreach($registros as $registro){
							($registro['foto'] != null)? $fotoExibir = $registro['foto'] : $fotoExibir = "imagens/padrao.png" ;
							echo "<tr>";
							echo "<td> <img class=\"fotoPequena\" src=\"" . $fotoExibir . "\"> </td>";
							echo "<td>{$registro['usuario']} </td>";
							echo "<td> <button onclick='confirmarExclusao({$registro['idUsuario']})' class='btn btn-danger float-right'> Excluir</button>";
							echo "<a href='usuarioFormulario.php?idUsuario={$registro['idUsuario']}' class='btn btn-warning float-right mr-1'> Editar</a> </td>";							
							echo "</tr>";
						} 
					?>
	            </tbody>
	        </table>
	    </div>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.mask.js"></script>
		<script type="text/javascript" src="js/datatables.js"></script>
		<script type="text/javascript" src="js/usuarioTabela.js"></script>	
	</body>

	</html>