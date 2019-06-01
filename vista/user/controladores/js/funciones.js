var btnMenu = document.getElementById('btnmenu');
var menu = document.getElementById('menu');
btnMenu.addEventListener('click',function(){
	'use strict';
	menu.classList.toggle('mostrar');
});
function cambiarCantidad(){
	var c = Number(document.getElementById("cant").value)
	var a = Number(document.getElementById("ast").value)
	
	if(a == 1){
		document.getElementById("c1").innerHTML=c
	}
}
function cambio(){
	document.getElementById("cant").value=1
}