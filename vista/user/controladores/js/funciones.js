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
	var t1=0,t2=0,t3=0,t4=0,t5=0;
	if(a == 1){
		var pu = Number(document.getElementById("pU1").value)
		var pT = pu*c
		t1 = pT
		document.getElementById("c1").innerHTML=c
		document.getElementById("p1").innerHTML="$"+pT
		document.getElementById("d1").style.visibility="visible";
	}
	if(a == 2){
		var pu = Number(document.getElementById("pU2").value)
		var pT = pu*c
		t2 = pT
		document.getElementById("p2").innerHTML="$"+pT
		document.getElementById("c2").innerHTML=c
		document.getElementById("d2").style.visibility="visible";
	}
	if(a == 3){
		var pu = Number(document.getElementById("pU3").value)
		var pT = pu*c
		t3=pT
		document.getElementById("p3").innerHTML="$"+pT
		document.getElementById("c3").innerHTML=c
		document.getElementById("d3").style.visibility="visible";
	}
	if(a == 4){
		var pu = Number(document.getElementById("pU4").value)
		var pT = pu*c
		t4 = pT
		document.getElementById("p4").innerHTML="$"+pT
		document.getElementById("c4").innerHTML=c
		document.getElementById("d4").style.visibility="visible";
	}
	if(a == 5){
		var pu = Number(document.getElementById("pU5").value)
		var pT = pu*c
		t5= pT
		document.getElementById("p5").innerHTML="$"+pT
		document.getElementById("c5").innerHTML=c
		document.getElementById("d5").style.visibility="visible";
	}
	
	var tI=Number(document.getElementById("totalI").value);
	t=tI+t1+t2+t3+t4+t5
	tI.value=tI
	document.getElementById("totalI").value=t;
	document.getElementById("total").innerHTML="$"+t;
}
function cambio(){
	document.getElementById("cant").value=0
}