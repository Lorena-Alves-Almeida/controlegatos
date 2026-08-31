<?php
    include_once "bancoDadosCRUD.php";

    function salvarRaca($idRaca, $nmRaca, $descricao){
        try{
            $conexao = criarConexao();

            if($idExercicio > 0){
                $sql = "UPDATE tbraca SET nmRaca = :nmRaca, descricao = :descricao WHERE idRaca = :idRaca;";
                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':nmRaca', $nmRaca); 
                $sentenca->bindValue(':descricao', $descricao); 
                $sentenca->execute();  
            }else{
                // O 1 PRA N ESTÁ ERRADO AQUI !!!!!!!!!!
                $sql = "INSERT INTO tbraca(nmRaca, descricao) VALUES(:nmRaca, :descricao);";
                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':nmRaca', $nmRaca); 
                $sentenca->bindValue(':descricao', $descricao); 
                $sentenca->execute(); 
                $idRaca = $conexao->lastInsertId(); 
            }
        
            $conexao = null;    
            return $idRaca;
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            return 0;
        }        
    }

    function excluirRaca($idRaca){
        try{
            $sql = "DELETE FROM tbraca WHERE idRaca = :idRaca;";

            $conexao = criarConexao();

            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':idRaca', $idRaca); 
        
            $sentenca->execute(); 
            $conexao = null;
            return $sentenca->rowCount();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            return 0;
        }
    }    

    function listarRaca(){
        try{
            $sql = "SELECT * FROM tbraca;";

            $conexao = criarConexao();        
            $sentenca = $conexao->prepare($sql);
        
            $sentenca->execute();     
            $conexao = null;
            return $sentenca->fetchAll();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
        }
    }  

    function recuperarRacaPorId($idRaca){
        try{
            $sql = "SELECT * FROM tbraca WHERE idRaca = :idRaca;";

            $conexao = criarConexao();        
            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':idRaca', $idRaca); 
        
            $sentenca->execute();     
            $conexao = null;
            return $sentenca->fetch();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
        }
    }    

    function verificarRacaPorDescricao($idRaca, $descricao){
        try{   
            $sql = "SELECT * FROM tbraca WHERE descricao = :descricao AND idRaca <> :idRaca;";

            $conexao = criarConexao();
            $sentenca = $conexao->prepare($sql);	
            $sentenca->bindValue(':descricao', $descricao); 		
            $sentenca->bindValue(':idRaca', $idRaca); 				

            $sentenca->execute(); 
            $conexao = null;

            return $sentenca->rowCount();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
        }
    } 
    
?>


