
<?php	
include_once "gatoCRUD.php";

	$CdGato= 0;
	$NmGato = "";
	$Raca = "";
	$Preco = 0;
	$Descricao = "";
	$foto = "imagens/padrao.png";

//transformar em função
if(isset($_GET['id'])){
			$id = $_GET['id'];

			$registro = recuperarRacaPorId($id);
			$descricao = $registro['descricao'];
			$idTipoExercicio = $registro['idTipoExercicio'];
		}
?>