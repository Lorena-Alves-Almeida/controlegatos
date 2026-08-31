$(document).ready(function () {
	$('#tabela').DataTable({
		language: {
			url: 'js/dataTables.pt_br.json'
		}
	});

});

function confirmarExclusao(codigo) {
	var resposta = confirm('Confirma a exclusão do registro?');

	if (resposta) {		
		//realiza uma requisição remota (assíncrona) 
		$.ajax({
			url  : 'gatoExcluir.php',
			type : 'post',
			data : {
				CdGato : codigo
			}
		})
		.done(function(resultado){
			if(resultado == 1){
				alert('Registro excluído com sucesso!');
				window.location.replace('gatoTabela.php');
			}else{
				alert('Erro ao excluir o registro');
			}
		});  		
	}
}