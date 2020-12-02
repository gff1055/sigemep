
password = document.getElementById('password');	// Campo de senha
checkPassword = document.getElementById('checkPassword');	// Campo de checagem de senha
submitUserRegister = document.getElementById('submitUserRegister');	// Elemento submit
passwordWarning = document.getElementById('passwordWarning');	// Area de aviso de checagem de senha

submitUserRegister.disabled = true;				// Dessabilitando o elemento submit


checkPassword.addEventListener("keyup",
/**
 * Funcao: Anonima associada ao evento de pressionamento de tecla
 * Objetivo: Checar se a senha foi digitada corretamente nos campos 'senha' e 'confirmar senha'
 */
function(){

	// A senha foi digitada corretamente nos dois campos?
	if(passwordFieldSame(password.value, checkPassword.value) == 1){
		submitUserRegister.disabled = false;
		passwordWarning.innerHTML = "";
	}

	// A senha nao foi digitada corretamente nos dois campos
	else if(passwordFieldSame(password.value, checkPassword.value) == -1){
		submitUserRegister.disabled = true;
		passwordWarning.style.color = "#ff0000";
		passwordWarning.style.fontSize = "0.8em";
		passwordWarning.innerHTML = "*As senhas nao coincidem ou nao foram preenchidas<br>";
	}
},false);


password.addEventListener("keyup",
/**
 * Funcao: Anonima associada ao evento de pressionamento de tecla
 * Objetivo: Checar se a senha foi digitada corretamente nos campos 'senha' e 'confirmar senha'
 */
function(){

	// A senha foi digitada corretamente nos dois campos?
	if(passwordFieldSame(password.value, checkPassword.value) == 1){
		submitUserRegister.disabled = false;
		passwordWarning.innerHTML = "";
	}

	// A senha nao foi digitada corretamente nos dois campos
	else if(passwordFieldSame(password.value, checkPassword.value) == -1){
		submitUserRegister.disabled = true;
		passwordWarning.style.color = "#ff0000";
		passwordWarning.style.fontSize = "0.8em";
		passwordWarning.innerHTML = "*As senhas nao coincidem ou nao foram preenchidas<br>";
	}
},false);



/*
Funcao: passwordFieldSame
Objetivo: Testar se os valores passados sao iguais
Argumentos: dois valores
Retorno:
	1:	Os valores sao iguais
	0:	Os valores sao iguais pois ambos estao em branco
	-1:	Os valores sao diferentes
*/

passwordFieldSame = function(d1, d2){
	var rtrnValue;

	/* Se os dados sao iguais, ele testa se os dados são mesmo diferentes ou eles estão apenas
	em branco */
	if(d1 == d2){
	
		// Ambos os dados nao estao em branco?
		if(d1 != ""){
			rtrnValue = 1;
		}
		
		// Os dados estao em branco
		else{
			rtrnValue = 0;
		}
	
	}

	//Os dados nao sao iguais
	else{
		rtrnValue = -1;
	}
	
	return rtrnValue;
}


$(function(){

	/**
	 * Funcao: anonima associada com o evento de enviar(submeter) formulario
	 * Objetivo: Fazer a validacao das informações e o enviar o formulario para cadastro
	 */
	$('.formUserRegister').submit(function(event){
		event.preventDefault();

		// Variavel que conta os campos que estao em branco
		blankFieldCounter = 0;

		// Variavel que recebe a referencia dos campos obriogatorios do formulario
		var requiredField = $('.requiredField');

		// Percorre os campos obrigatorios do formulario para verificar se tem algum campo em branco
		for(var i = 0; i < requiredField.length; i++){
			
			// Se tiver um campo em branco ele é realçado em vermelho e
			// o contador de campos em branco incrementado
			if(requiredField[i].value == ""){
				requiredField[i].style.borderColor = "red";
				blankFieldCounter++;
			}

			// Caso contrario o campo é realçado com o estilo original
			else{
				requiredField[i].style.borderColor = "";
			}
		}

		// Se existir campos em branco é exibido um alerta para o usuario
		if(blankFieldCounter){
			alert("Existem campos obrigatorios não preenchidos")
		}

		// Caso contrario a operacao de cadastro continua...
		else{
			feedbackUserName = $('#feedbackUserName'); 
			feedbackEmail = $('#feedbackEmail'); 
			

			// Resetando a area de avisos no rotulo dos formularios

			if(feedbackUserName[0].textContent!=""){
				feedbackUserName.html("");
			}
			
			if(feedbackEmail[0].textContent!=""){
				feedbackEmail.html("");
			}

			// Escopo da requisicao
			$.ajax({
				url: "/user",
				type: "post",
				data: $(this).serialize(),
				dataType: "json",

				/**
	 			* Funcao: success
	 			* Objetivo: validar os dados do formulario e fazer o cadastro
	 			*/
				success: function(answer){

					// Se a resposta da operacao for uma falha,
					// é verificado qual tipo de erro ocorreu
					console.log(answer);
					if(!answer[0].success){
						alert("Um ou mais campos possuem informações não válidas. Verifique")

						/* O array de resposta é percorrido a fim de coletar todos as mensagens de
						feedback*/
						for(var ind = 0; ind < answer.length; ind++){

							/* Se o nome de usuario informado ja estiver sendo usado em outra conta,
							os dados sao apagados no formulario e
							é enviado um alerta para o usuario */
							if(answer[ind].code == '55418313'){
								idInputUserName = $('#idInputUserName');
								idInputUserName.css("border-color","red");
								idInputUserName[0].value = "";
								feedbackUserName.css("color","red");
								feedbackUserName.html("  (ERRO: Já existe uma conta cadastrada com o nome de usuario informado. Digite outro)");
							}

							/* O mesmo acontece com o email... */
							else if(answer[ind].code == '341313'){
								idInputEmail = $('#idInputEmail');
								idInputEmail.css("border-color","red");
								idInputEmail[0].value = "";
								feedbackEmail.css("color","red");
								feedbackEmail.html("  (ERRO: Já existe uma conta cadastrada com o Email informado. Digite outro)");
							}

							/* No caso de ocorrer outra falha... */
							else{
								console.log("FALHA GERAL....");
							}
						}
					}

					/* Se a resposta da operacao for sucesso, o usuario é redirecionado para a
					view do usuario */
					else{
						window.location.href = "/user";
					}
				}
			})

		}
	});
})

