var btnMenu = document.getElementById('btnmenu');
var menu = document.getElementById('menu');
btnMenu.addEventListener('click',function(){
	'use strict';
	menu.classList.toggle('mostrar');
});
function cambiarCantidad(){
	var c = Number(document.getElementById("cant").value)
	var a = Number(document.getElementById("ast").value)
	alert(a)
}
function reset(){
	document.getElementById("cant").innerHTML=1;
	document.getElementById("cant").value=1;
}