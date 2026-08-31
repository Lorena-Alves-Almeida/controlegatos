<?php			
	include_once "../m/usuarioCRUD.php";
	
    $usuario = $_POST['usuario'];
    $idUsuario = $_POST['idUsuario'];

    $quantidade = verificarUsuario($idUsuario, $usuario);
 
    if($quantidade == 0){
        echo "true";
    } else{
        echo "false";
    }  
?>	

