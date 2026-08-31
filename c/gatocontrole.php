<?php
include_once "../m/gatoModel.php";
if(isset($_GET['CdGato']) ){
		$CdGato = $_GET['CdGato'];
		$conexao = new PDO('mysql:host=localhost; dbname=controlegatos', 'root', '');
		
		$sql = "SELECT * FROM tbgato WHERE CdGato = :CdGato;";//PROVAVELMENTE TERÁ QUE TROCAR PARA SESSION
		$sentenca = $conexao->prepare($sql);
		$sentenca->bindValue(':CdGato', $_GET['CdGato']);//PROVAVELMENTE TERÁ QUE TROCAR PARA SESSION
	
		$sentenca->execute(); 

		$conexao = null;

		$registro = $sentenca->fetch();

		$CdGato = $registro['CdGato'];
		$NmGato = $registro['NmGato'];
		$Raca = $registro['Raca'];
		$Preco = floatval($registro['Preco']) * 100;
		$Descricao = $registro['Descricao'];
		$foto = $registro['foto'];
	}



?>