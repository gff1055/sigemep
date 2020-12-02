/*
Arquivo que valida a entrada do usuario no sistema.
Se houver exito, passa para a pagina inicial.
Senao é exibida uma mensagem de erro
*/

$(function(){
	$('.formLogin').submit(function(event){

		// Previnindo o comportamento padrao do botao submit
		event.preventDefault();	
		
		// Escopo da requisicao ajax
		$.ajax({
			url: "/login",						// Endereco onde sera enviada a requisicao
			type: "post",						// Tipo de envio
			data: $(this).serialize(),
			dataType: 'json',					// Tipo de dados a seren enviados

			// Funcao a ser executada em caso de sucesso no envio da requisicao
			success: function(response){		
				
				// Se os dados de login conferem o usuario é direcionado para a pagina
				if(response.success === true){
					window.location.href = "/user";
				}

				// Se os dados de login nao conferem, é exibido o feedback
				else{
					$('#feedbackLogin').removeClass("d-none").html(response.message);
					$('#feedbackLogin').css("color","red");
					$('#feedbackLogin').css("background-color","pink");

				}
			}
		});
	});
});