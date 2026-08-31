<?php
    include_once "bancoDadosCRUD.php";

    function salvarUsuario($idUsuario, $usuario, $senha, $foto){
        $conexao = criarConexao();

        if($idUsuario > 0){
            $sql = "UPDATE tbUsuario SET usuario = :usuario, senha = :senha, foto = :foto WHERE idUsuario = :idUsuario;";
            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':usuario', $usuario); 
            $sentenca->bindValue(':senha', $senha); 
            $sentenca->bindValue(':foto', $foto); 
            $sentenca->bindValue(':idUsuario', $idUsuario); 
        }else{
            $sql = "INSERT INTO tbUsuario(usuario, senha, foto) VALUES(:usuario, :senha, :foto);";
            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':usuario', $usuario); 
            $sentenca->bindValue(':senha', $senha); 
            $sentenca->bindValue(':foto', $foto); 
        }        
    
        $sentenca->execute();     
        fecharConexao();   
        return $sentenca->rowCount();
    }

    function excluirUsuario($idUsuario){

        $conexao = criarConexao();

        $sql = "DELETE FROM tbUsuario WHERE idUsuario = :idUsuario;";
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':idUsuario', $idUsuario); 

        $sentenca->execute(); 
        $conexao = null;
        return $sentenca->rowCount();
    }

    function listarUsuario(){
        $sql = "SELECT * FROM tbUsuario;";

        $conexao = criarConexao();
		$sentenca = $conexao->prepare($sql);
	
		$sentenca->execute(); 
		$conexao = null;
        return $sentenca->fetchAll();
    }

    function buscarUsuarioPorId($idUsuario){
        $sql = "SELECT * FROM tbUsuario WHERE idUsuario = :idUsuario;";

        $conexao = criarConexao();
        
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':idUsuario', $idUsuario); 
    
        $sentenca->execute(); 
        $conexao = null;
        
        return $sentenca->fetch();
    }

    function verificarUsuario($idUsuario, $usuario){
        $sql = "SELECT * FROM tbUsuario WHERE usuario = :usuario AND idUsuario <> :idUsuario;";

        $conexao = criarConexao();
        $sentenca = $conexao->prepare($sql);	
        $sentenca->bindValue(':usuario', $usuario); 		
        $sentenca->bindValue(':idUsuario', $idUsuario); 				

        $sentenca->execute(); 
        $conexao = null;

        return $sentenca->rowCount();
    } 

    function autenticarUsuario($usuario, $senha) {
    try {
        // A consulta seleciona todas as colunas onde o usuário e a senha coincidem
        $sql = "SELECT * FROM tbUsuario WHERE usuario = :usuario AND senha = :senha;";

        $conexao = criarConexao();
        $sentenca = $conexao->prepare($sql);
        
        // Vincule apenas os parâmetros presentes na instrução SQL
        $sentenca->bindValue(':usuario', $usuario); 
        $sentenca->bindValue(':senha', $senha); 

        $sentenca->execute(); 
        
        // Retorna um array associativo com todas as colunas da conta (ou false se não encontrar)
        $dadosUsuario = $sentenca->fetch(PDO::FETCH_ASSOC);
        
        $conexao = null;

        return $dadosUsuario; 
    } catch (PDOException $erro) {
        criarArquivoErro($erro);
        die();
    }
}  

?>    