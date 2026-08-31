<?php			
	include_once "../m/racaCRUD.php";

	$id = $_POST['id'];
	$quantidade = excluirRaca($id);
	
	echo $quantidade;
?>