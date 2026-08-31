<?php		
	session_start();
    include_once "m/usuarioCRUD.php";
	//include_once "menu.php";	

	$_SESSION['idUsuario'] = 0;
	$usuario = "";
	$senha = "";
	$foto = "";

	if(isset($_GET['idUsuario']) ){

		$registro = buscarUsuarioPorId($_GET['idUsuario']);

		$_SESSION['idUsuario'] = $registro['idUsuario'];
		$usuario = $registro['usuario'];
		$senha = $registro['senha'];
		$foto = $registro['foto'];
	}
?>
	<html>
		<head>
			<meta charset="utf-8"/>
			<title> Usuários </title>
			<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
			<link type="text/css" rel="stylesheet" href="css/estilos.css"/>	
		</head>
		<body>
			<div class="containerUsuario">
				<br>
				<h1 class="henny-penny-regular fonteClara">Usuários</h1>
				<hr/>				
				<form id="formulario" action="c/usuarioSalvar.php" method="post" enctype="multipart/form-data">
					<div class="row form-group">
						<div class="col-md-6">
							<div>
								<input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['idUsuario']?>">
							</div>
							<label for="usuario">Usuário</label>  
							<input class="form-control" id="usuario" name="usuario" value="<?php echo $usuario?>" 
							type="text" placeholder="Informe o usuário">
						</div>	
						<div class="col-md-6">
							<label for="senha">Senha</label>  
							<input class="form-control" id="senha" name="senha" value="<?php echo $senha?>" 
							type="password" placeholder="Informe a senha">
						</div>						
					</div>	
					<div class="row form-group">
						<div class="col-md-12">
							<label for="arquivoFoto">Foto</label>  						
							
							<img id='fotoUsuario' name='fotoUsuario' src='<?php echo ($foto != null)? $foto : "imagens/padrao.png"?>'> 
						
							<input type="hidden" class="form-control" id="imagemFoto" name="imagemFoto" value="">
							<input type="file" class="form-control mt-3" id="arquivoFoto" name="arquivoFoto" onchange="previewImagem()" accept="image/png, image/jpeg, image/jpg">
						</div>							
					</div>											
					<div class="row form-group">
						<div class="col-md-12">
							<a href="usuarioTabela.php" class="btn btn-primary float-left">Voltar</a>
							<button type="submit" class="btn btn-success float-right">Salvar</button>											
						</div>											
					</div>					
				</form>			
			</div> 	
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" src="js/jquery.mask.js"></script>
			<script type="text/javascript" src="js/jquery.validate.js"></script>
			<script type="text/javascript" src="js/additional-methods.js"></script>
			<script type="text/javascript" src="js/localization/messages_pt_BR.js"></script>			
			<script type="text/javascript" src="js/usuarioFormulario.js"></script>				
		</body>
	</html>

	
	
	