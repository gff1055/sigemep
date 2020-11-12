
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

		// Percorre os campos obrigatorios do formulario para verificar se tem algum em branco
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

				success: function(answer){

					alert("AAAH");
					console.log(answer.success);
					console.log(answer.code);

					if(!answer.success){

						if(answer.code == '55418313'){
							alert("ERRO! Esse usuario existe cara palida");
						}

						else if(answer.code == '341313'){
							alert("ERRO! Esse email existe cara palida");
						}

						else{
							alert("FALHA GERAL....");
						}
					}	
				}
			})

		}
	});
})

