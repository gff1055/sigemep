
password = document.getElementById('password');	// Campo de senha
checkPassword = document.getElementById('checkPassword');	// Campo de checagem de senha
submitUserRegister = document.getElementById('submitUserRegister');	// Elemento submit
passwordWarning = document.getElementById('passwordWarning');	// Area de aviso de checagem de senha

submitUserRegister.disabled = true;				// Dessabilitando o elemento submit

// Evento ao digitar no campo verificador de senha
checkPassword.addEventListener("keyup", function(){

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


// Evento ao digitar no campo de senha
password.addEventListener("keyup", function(){

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


// Metodo para testar se os dados passados sao iguais
passwordFieldSame = function(d1, d2){
	var rtrnValue;

	// Os dados sao iguais?
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


/*Ao clicar no botao submit é feita uma verificacao do nome do usuario e email*/
$(function(){

	$('.formUserRegister').submit(function(event){
		event.preventDefault();
		blankFieldCounter = 0;
		var requiredField = $('.requiredField');

		// Percorre os campos obrigatorios do formulario para verificar se tem algum campo em branco
		for(var i in requiredField){
			if(requiredField[i].value == ""){
				requiredField[i].style.borderColor = "red";
				blankFieldCounter++;
			}
		}

		// Se existir campos em branco é exibida uma mensagem
		if(blankFieldCounter){
			alert("Existem campos obrigatorios não preenchidos")
		}

		// Se todos os campos estiverem preenchidos a operacao de cadastro continua...
		else{

			// Escopo da requisicao
			$.ajax({
				url: "/user",
				type: "post",
				data: $(this).serialize(),
				dataType: "json",

				// Funcao em resposta da requisicao
				success: function(answer){

					// Se o cadastro não for concluido é verificado se nome de o usuario e o email
					// informados estão sendo usados em outra conta
					if(!answer.success){

						alert("Um ou mais campos possuem informações não válidas. Verifique")

						// Se o nome de usuario informado ja estiver sendo usado em outra conta,
						// o nome de usuario é apagado do formulario e 
						// é enviada uma mensagem para o usuario
						if(answer.code == '55418313'){
							idInputUserName = $('#idInputUserName');
							idInputUserName[0].value = "";
							idInputUserName.css("border-color","red");
							idLabelUserName = $('#idLabelUserName');
							idLabelUserName.css("color","red");
							idLabelUserName.html(idLabelUserName.html() + "  (ERRO: Já existe uma conta cadastrada com este nome de usuario. Digite outro)");
						}

						// Se o email informado ja estiver sendo usado em outra conta, é enviada
						// uma mensagem para o usuario
						else if(answer.code == '341313'){
							console.log("ERRO! Esse email existe cara palida");
						}

						// Outra falha...
						else{
							console.log("FALHA GERAL....");
						}
					}
				}
			})

		}
	});
})

