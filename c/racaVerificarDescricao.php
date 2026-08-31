<?php			
	include_once "../m/racaCRUD.php";
	
    $descricao = $_POST['descricao'];
    $id = $_POST['id'];

    $quantidade = verificarRacaPorDescricao($id, $descricao);
 
    if($quantidade == 0){
        echo "true";
    } else{
        echo "false";
    }  
?>	