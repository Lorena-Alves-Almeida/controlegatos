<?php			
	include_once "../m/usuarioCRUD.php";
	session_start();
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
	//antes tinha foto aqui

    $registro = autenticarUsuario($usuario, $senha);
 
    if($registro != null){		
		$_SESSION['idUsuario'] = $registro['idUsuario'];
		$_SESSION['usuario'] = $registro['usuario'];
		$_SESSION['senha'] = $registro['senha'];
		$_SESSION['foto'] = $registro['foto'];
		$dadosUsuario = $registro;
		
		  // Cookie
  		$exp = time () + 3600;

		setcookie("idUsuario", $registro['idUsuario'], $exp, "/");
        setcookie("usuario", $registro['usuario'], $exp, "/");
        setcookie("foto", $registro['foto'], $exp, "/");
		echo "<script>location.href='../usuarioTabela.php';</script>"; 
	}else{
		echo "<script>alert('Login ou senha inválido!'); location.href='../login.php';</script>"; 			
	}
?>	