
password = document.getElementById('password');	// Campo de senha
checkPassword = document.getElementById('checkPassword');	// Campo de checagem de senha
submitUserRegister = document.getElementById('submitUserRegister');	// Elemento submit
passwordWarning = document.getElementById('passwordWarning');	// Area de aviso de checagem de senha

submitUserRegister.disabled = true;				// Dessabilitando o elemento submit

// Evento ao digitar no campo de senha
checkPassword.addEventListener("keyup", function(){

	// A senha foi digitada corretamente nos dois campos?
	if(passwordFieldSame(password.value, checkPassword.value) == 1){
		submitUserRegister.disabled = false;
		passwordWarning.innerHTML = "";
	}

	else if(passwordFieldSame(password.value, checkPassword.value) == -1){
		submitUserRegister.disabled = true;
		passwordWarning.style.color = "#ff0000";
		passwordWarning.innerHTML = "<br>*As senhas nao coincidem ou nao foram preenchidas<br>";
	}
},false);

// Evento ao digitar no campo de senha
password.addEventListener("keyup", function(){

	// A senha foi digitada corretamente nos dois campos?
	if(passwordFieldSame(password.value, checkPassword.value) == 1){
		submitUserRegister.disabled = false;
		passwordWarning.innerHTML = "";
	}

	else if(passwordFieldSame(password.value, checkPassword.value) == -1){
		submitUserRegister.disabled = true;
		passwordWarning.style.color = "#ff0000";
		passwordWarning.innerHTML = "<br>*As senhas nao coincidem ou nao foram preenchidas<br>";
	}
},false);

// Meotodo para testar se os dados passados sao iguais
passwordFieldSame = function(d1, d2){
	var rtrnValue;
	if(d1 == d2){
	
		if(d1 != ""){
			rtrnValue = 1;
		}
		
		else{
			rtrnValue = 0;
		}
	
	}
	else{
		rtrnValue = -1;
	}
	return rtrnValue;
}

