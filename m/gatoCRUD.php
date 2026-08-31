<?php
    include_once "bancoDadosCRUD.php";

    function salvarGato($CdGato, $NmGato, $Raca, $Preco, $Descricao, $foto){
        $conexao = criarConexao();

        if ($CdGato > 0){
		$sql = "UPDATE tbgato SET 
		NmGato = :NmGato, 
		Raca = :Raca, 
		Preco = :Preco, 
		Descricao = :Descricao,
        foto = :foto
		WHERE CdGato = :CdGato;";

		$sentenca = $conexao->prepare($sql);
		$sentenca->bindValue(':CdGato', $CdGato);
		$sentenca->bindValue(':NmGato', $NmGato);
		$sentenca->bindValue(':Raca', $Raca);
		$sentenca->bindValue(':Preco', $Preco);
		$sentenca->bindValue(':Descricao', $Descricao);
        $sentenca->bindValue(':foto', $foto);

	    }else{
		    $sql = "INSERT INTO tbgato(CdGato, NmGato, Raca, Preco, Descricao, foto) VALUES(null, :NmGato, :Raca, :Preco, :Descricao, :foto);";
		    $sentenca = $conexao->prepare($sql);

		    $sentenca->bindValue(':NmGato', $NmGato);
		    $sentenca->bindValue(':Raca', $Raca);
		    $sentenca->bindValue(':Preco', $Preco);
		    $sentenca->bindValue(':Descricao', $Descricao);
            $sentenca->bindValue(':foto', $foto);
	    }
            
        $sentenca->execute();     
        fecharConexao();   
        return $sentenca->rowCount();
    }

    function excluirGato($CdGato){

        $conexao = criarConexao();

        $sql = "DELETE FROM tbgato WHERE CdGato = :CdGato;";
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':CdGato', $CdGato); 

        $sentenca->execute(); 
        $conexao = null;
        return $sentenca->rowCount();
    }

    function listarGato(){
        $sql = "SELECT * FROM tbgato;";

        $conexao = criarConexao();
		$sentenca = $conexao->prepare($sql);
	
		$sentenca->execute(); 
		$conexao = null;
        return $sentenca->fetchAll();
    }

    function buscarGatoCd($CdGato){
        $sql = "SELECT * FROM tbgato WHERE CdGato = :CdGato;";

        $conexao = criarConexao();
        
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':CdGato', $CdGato); 
    
        $sentenca->execute(); 
        $conexao = null;
        
        return $sentenca->fetch();
    }  

?>