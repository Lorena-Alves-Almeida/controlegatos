$("#formulario").validate({
    rules: {
        usuario: {
            required: true,
            remote: {
                url: "c/usuarioVerificar.php",
                type: "post",
                data: {
                    idUsuario: function() {
                        return $("#idUsuario").val();
                    },
                    usuario: function() {
                        return $("#usuario").val();
                    }
                }
            }            
        },
        senha: {
            required: true      
        }                                           
    }, 
    messages: {
        usuario: {
            required: "Campo obrigatório",
            remote: "O usuário informado já existe"
        },          
        senha: {
            required: "Campo obrigatório"
        }              
    }
});

function previewImagem(){
	var arquivoFoto = document.getElementById('arquivoFoto').files[0];
	var fotoUsuario = document.getElementById('fotoUsuario');
	
	var reader = new FileReader();
	
	reader.onloadend = function () {
		fotoUsuario.src = reader.result;
	}
	
	if(arquivoFoto){
		reader.readAsDataURL(arquivoFoto);
	}else{
		fotoUsuario.src = "";
	}
}