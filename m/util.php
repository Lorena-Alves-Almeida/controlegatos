<?php

	function armazenarArquivo($arquivo){
        $nomeArquivo = $arquivo["name"];
		$tamanhoArquivo = $arquivo["size"];
        $extensaoArquivo = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

		if((($extensaoArquivo == "jpg") || ($extensaoArquivo == "jpeg") || ($extensaoArquivo == "png")) && $tamanhoArquivo < 100000){
			$caminhoArquivo = "imagens/" . md5(uniqid(rand(), true)) .".". $extensaoArquivo;
			move_uploaded_file($arquivo["tmp_name"], $caminhoArquivo );
			return $caminhoArquivo;
		}else{
			echo  "<script>alert('Formato ou tamanho do arquivo inválido.');</script>";
			echo  "<script>window.location.replace('usuarioFormulario.php');</script>";
		}
    }

	function criarArquivoErro($erro){
        echo "<script>alert('Foi gerada uma exceção.');</script>"; 
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y H:i:s');
        $nomeArquivo = "erro-". date('d_m_Y-H_i_s').".txt";
        $arquivo = fopen($nomeArquivo,'a+');
        $texto = "Data: {$data} \n";
        $texto = $texto . "\t Arquivo: {$erro->getFile()} - Linha: {$erro->getLine()} \n"; 
        $texto = $texto . "\t Erro: {$erro->getMessage()} \n";
        fwrite($arquivo, $texto);
        fclose($arquivo);
    }
    ?>