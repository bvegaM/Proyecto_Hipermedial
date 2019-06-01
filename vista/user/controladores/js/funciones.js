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
		document.getElementById("d1").style.visibility="visible";
	}
	if(a == 2){
		document.getElementById("c2").innerHTML=c
		document.getElementById("d2").style.visibility="visible";
	}
	if(a == 3){
		document.getElementById("c3").innerHTML=c
		document.getElementById("d3").style.visibility="visible";
	}
	if(a == 4){
		document.getElementById("c4").innerHTML=c
		document.getElementById("d4").style.visibility="visible";
	}
	if(a == 5){
		document.getElementById("c5").innerHTML=c
		document.getElementById("d5").style.visibility="visible";
	}
}
function cambio(){
	document.getElementById("cant").value=1
}