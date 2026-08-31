<?php
//include_once "menu.php";
?>
<html>
		<head>
			<meta charset="utf-8"/>
			<title> Autenticação </title>
			<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
			<link type="text/css" rel="stylesheet" href="css/estilos.css"/>	
		</head>
		<body>
						
			<div class="container mt-5">
				
				<form id="formulario" action="c/loginAutenticar.php" method="post" autocomplete="off">
					<div class="row form-group">
						<div class="col-md-12">
							<label for="usuario">Usuário</label>  
							<input class="form-control" name="usuario" id="usuario" type="text">
						</div>			
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<label for="senha">Senha</label>
							<input class="form-control" id="senha" name="senha" type="password">
						</div>			
					</div>	
					<div class="row form-group">								
							<div class="col-md-12"> 
								<button type="submit" class="btn btn-success float-right">Entrar</button>	
							</div>											
					</div>	

				</form>			
			</div> 	
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" src="js/jquery.validate.js"></script>		
			<script type="text/javascript" src="js/jquery.mask.js"></script>			
			<script type="text/javascript" src="js/login.js"></script>				
		</body>
	</html>

	
	
	