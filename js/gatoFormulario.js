$(document).submit(function() {
    if ($("#formulario").valid()) {
        $('#NmGato').unmask();
        $('#Raca').unmask();
        $('#Preco').unmask();
    }
});

$(document).ready(function () {
    $('#NmGato').on('input', function () {
    	$(this).val($(this).val().replace(/[^a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g, ''));
 	});
    $('#Raca').on('input', function () {
    	$(this).val($(this).val().replace(/[^a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g, ''));
 	});
    $('#Preco').mask("#.##0,00", { reverse: true, alias: "numeric" });
});

$("#formulario").validate({
    onfocusout: function(element) {
        this.element(element); // Valida assim que o usuário clica fora
    },
	rules: {
		NmGato: {
			required: true,
			minlength: 3,
		},
        Raca: {
			required: true,
		},
		Preco: {
			required: true,
		},
        Descricao: {
			required: true, 
            minlength: 50
		},
		Foto: {
			required: true
		}
	},
	messages: {
		NmGato: {
			required: "campo obrigatório",
			minlength: "o nome precisa ter no mínimo 3 caracteres",
		},
        Raca: {
			required: "campo obrigatório",
		},
		Preco: {
			required: "campo obrigatório",
		},
        Descricao: {
			required: "campo obrigatório",
            minlength: "A descrição precisa ter, no mínimo, 50 caracteres"
		},
		Foto: {
			required: "campo obrigatório"
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