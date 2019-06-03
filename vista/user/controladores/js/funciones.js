var btnMenu = document.getElementById('btnmenu');
var menu = document.getElementById('menu');
btnMenu.addEventListener('click',function(){
	'use strict';
	menu.classList.toggle('mostrar');
});
function cambiarCantidad(){
	var c = Number(document.getElementById("cant").value)
	var a = Number(document.getElementById("ast").value)
	var t=  0;
	var pT1 =Number(document.getElementById("pT1").value)
	var pT2 =Number(document.getElementById("pT2").value)
	var pT3 =Number(document.getElementById("pT3").value)
	alert(c)
	alert(a)
	if(a == 1){
		var pu = Number(document.getElementById("pU1").value)
		var pT = pu*c
		document.getElementById("c1").innerHTML=c
		document.getElementById("p1").innerHTML="$"+pT
		pT1.value=pT
		document.getElementById("cF1").value=c
		document.getElementById("d1").style.visibility="visible";
	}
	if(a == 2){
		var pu = Number(document.getElementById("pU2").value)
		var pT = pu*c
		document.getElementById("p2").innerHTML="$"+pT
		document.getElementById("c2").innerHTML=c
		pT2.value=pT
		document.getElementById("cF2").value=c
		document.getElementById("d2").style.visibility="visible";
	}
	if(a == 3){
		var pu = Number(document.getElementById("pU3").value)
		var pT = pu*c
		document.getElementById("p3").innerHTML="$"+pT
		document.getElementById("c3").innerHTML=c
		pT3.value=pT
		document.getElementById("cF3").value=c
		document.getElementById("d3").style.visibility="visible";
	}
	if(a == 4){
		var pu = Number(document.getElementById("pU4").value)
		var pT = pu*c
		document.getElementById("p4").innerHTML="$"+pT
		document.getElementById("c4").innerHTML=c
		document.getElementById("pT4").value=pT
		document.getElementById("cF4").value=c
		document.getElementById("d4").style.visibility="visible";
	}
	if(a == 5){
		var pu = Number(document.getElementById("pU5").value)
		var pT = pu*c
		document.getElementById("p5").innerHTML="$"+pT
		document.getElementById("c5").innerHTML=c
		document.getElementById("pT5").value=pT
		document.getElementById("cF5").value=c
		document.getElementById("d5").style.visibility="visible";
	}
	
	var tI=Number(document.getElementById("totalI").value);
	alert(pT1)
	alert(pT2)
	alert(pT3)
	t=pT1+pT2+pT3
	document.getElementById("total").innerHTML="$"+t;
}
function cambio(){
	document.getElementById("cant").value=1
}