
<?php
	include "m/gatomodel.php";
	include_once "menu.php";
?>



	<html>
		<head>
			<meta charset="utf-8"/>
			<title> Cadastro Gato </title>
			<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
			<link type="text/css" rel="stylesheet" href="css/estilos.css"/>	
		</head>
		<body>
		<img alt="lamp" src="https://i.postimg.cc/brDfYfj1/pink.gif" style="" title="" class="lamp">
		<div class="container">
				<br>
				<h1 class="henny-penny-regular fonteClara">Cadastro do Gato</h1>
				<br>
				<img alt="caveira" src="https://i.postimg.cc/hPxn9BLk/IMG_8818.png" style="" title="" class="iconeTitulo">		
					
				<br>
			<form id="formularioGato" action="gatoSalvar.php" method="post" enctype="multipart/form-data">
					
				<div id="esquerda">
					<div>
						<input type="hidden" id="CdGato" name="CdGato" value="<? echo $CdGato ?>">
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<label for="NmGato">Nome</label>  
							<input class="form-control" id="NmGato" name="NmGato" value="<? echo $NmGato ?>" 
							type="text" placeholder="Informe o nome do Gato">
						</div>	
					</div>
					<div class="row form-group">

            <label
                for="Raca"
                class="form-label"
            >
                Raça
            </label>

            <select
                class="form-select form-control"
                id="Raca"
                name="Raca"
                required
            >

                <option value="">
                    Selecione uma raça
                </option>

                <?php foreach ($racas as $raca): ?>

                    <option
                        value="<?= (int) $raca['idRaca'] ?>"
                        <?= ((int) $Raca === (int) $raca['idRaca']) ? 'selected' : '' ?>
                    >
                        <?= htmlspecialchars($raca['nmRaca']) ?>
                    </option>

                <?php endforeach; ?>

            </select>

        </div>
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<label for="Preco">Preço</label>  
							<div class="input-group mb-3">
        						<span class="input-group-text">R$</span>
								<input class="form-control" id="Preco" name="Preco" value="<? if ($Preco > 0) echo $Preco ?>" 
								type="text" placeholder="Informe o Preço Gato">
							</div>
							<label id="Preco-error" class="error" for="Preco" style=""></label>
						</div>	
					</div>	
				</div>
				<div id="direita" class="d-flex flex-column justify-content-between">
					<div class="row form-group">
						<div class="col-md-12">
							<label for="Descricao">Descrição</label>  
							<textarea id="Descricao" name="Descricao" class="form-control" value="" placeholder="Descreva o gato"><? echo $Descricao ?></textarea>
						</div>	
					</div>	
					<div class="row form-group" id="foto">
						<div class="col-md-12">
							<label for="arquivoFoto">Foto</label>  						
							
							<img id='fotoUsuario' name='fotoUsuario' src='imagens/padrao.png'> 
						
							<input type="hidden" class="form-control" id="imagemFoto" name="imagemFoto" value="">
							<input type="file" class="form-control mt-3" id="arquivoFoto" name="arquivoFoto" onchange="previewImagem()" accept="image/png, image/jpeg, image/jpg">
						</div>							
					</div>
				
					<div class="row form-group text-end mt-auto">
						<div class="col-md-12">
							<button type="submit" class="btn btn-success float-right">Salvar</button>											
						</div>											
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
		<script type="text/javascript" src="js/gatoFormulario.js"></script>				
	</body>
</html>