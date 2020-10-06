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
	if(passwordFieldSame(password.value, checkPassword.value)){
		submitUserRegister.disabled = false;
		passwordWarning.innerHTML = "";
	}
	else{
		submitUserRegister.disabled = true;
		passwordWarning.style.color = "#ff0000";
		passwordWarning.innerHTML = "<br>*As senhas nao coincidem ou nao foram preenchidas<br>";
	}
},false);

passwordFieldSame = function(d1, d2){
	if(d1 == d2 && d1 != ""){
		return true;
	}
	else{
		return false;
	}
}

