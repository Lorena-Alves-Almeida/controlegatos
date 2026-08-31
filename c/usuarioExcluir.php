<?php			
	include_once "../m/usuarioCRUD.php";

	$idUsuario = $_POST['idUsuario'];

	$quantidade = excluirUsuario($idUsuario);	

	echo $quantidade;
?>	


	