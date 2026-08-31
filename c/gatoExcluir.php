<?php			
	include_once "../m/gatoCRUD.php";

	$CdGato = $_POST['CdGato'];

	$quantidade = excluirGato($CdGato);	

	echo $quantidade;
	

/*	if($quantidade > 0){
		echo  "<script>alert('Registro excluído com sucesso!');</script>";
		echo  "<script>window.location.replace('gatoTabela.php');</script>";
	}else{
		echo  "<script>alert('Erro ao excluir e registro');</script>";
		echo  "<script>window.location.replace('gatoTabela.php');</script>";		
	}*/
?>