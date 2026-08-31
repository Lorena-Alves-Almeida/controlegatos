
<?php		
	include_once "../m/gatoCRUD.php";
	include_once "../m/util.php";
	
	$CdGato = isset($_POST['CdGato']) ? intval($_POST['CdGato']) : 0;	
	$NmGato = $_POST['NmGato'];
	$Raca = $_POST['Raca'];
	$Preco = floatval($_POST['Preco']) / 100;
	$Descricao = $_POST['Descricao'];
	$foto = $_POST['imagemFoto'];

	if($_FILES["arquivoFoto"]){
		$arquivoFoto = $_FILES["arquivoFoto"];

		if(!empty($arquivoFoto["name"])){
			$foto =  armazenarArquivo($arquivoFoto);
		}	
	}

	$quantidade = salvarGato($CdGato, $NmGato, $Raca, $Preco, $Descricao, $foto);

	if($quantidade > 0){
		echo  "<script>alert('Cadastro realizado com sucesso!');</script>";
		echo  "<script>window.location.replace('gatoTabela.php');</script>";
	}else{
		echo  "<script>alert('Erro ao cadastro e registro');</script>";
		echo  "<script>window.location.replace('gatoFormulario.php');</script>";		
	}
?>	


	