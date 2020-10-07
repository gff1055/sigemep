password = document.getElementById('password');
checkPassword = document.getElementById('checkPassword');
submitUserRegister = document.getElementById('submitUserRegister');
submitUserRegister.disabled = true;
passwordWarning = document.getElementById('passwordWarning');

checkPassword.addEventListener("keyup", function(){
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

password.addEventListener("keyup", function(){
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

