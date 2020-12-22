
inputMenuSandwich = document.getElementById("inputMenuSandwich");
body = document.getElementsByTagName("body")[0];
menuToggle = document.getElementById("menuToggle");
menu = document.getElementById("menu");
flagCloseMenuBar = false;




/** Funcao impede o evento 'click' ser acionado no body  */
menu.addEventListener("click", function(e){
	e.stopPropagation();
}, false);




/** Funcao impede o evento 'click' ser acionado no body  */
inputMenuSandwich.addEventListener("click", function(e){
	e.stopPropagation();
}, false);




/** Evento no body é acionado e o menu suspenso é fechado */
body.addEventListener("click", function(e){
	inputMenuSandwich.checked = false;
});
