var btnMenu = document.getElementById('btnmenu');
var menu = document.getElementById('menu');
btnMenu.addEventListener('click',function(){
	'use strict';
	menu.classList.toggle('mostrar');
});
var t1=0,t2=0,t3=0,t4=0,t5=0;
function cambiarCantidad(){
	var c = Number(document.getElementById("cant").value)
	var a = Number(document.getElementById("ast").value)
	var t=  0
	if(a == 1){
		var pT1 =Number(document.getElementById("pT1").value)
		var pu = Number(document.getElementById("pU1").value)
		pT1 = pu*c
		t1=pT1
		document.getElementById("c1").innerHTML=c
		document.getElementById("p1").innerHTML="$"+pT1
		document.getElementById("cF1").value=c
		document.getElementById("d1").style.visibility="visible";
	}
	if(a == 2){
		var pT2 =Number(document.getElementById("pT2").value)
		var pu = Number(document.getElementById("pU2").value)
		pT2 = pu*c
		t2=pT2
		document.getElementById("p2").innerHTML="$"+pT2
		document.getElementById("c2").innerHTML=c
		document.getElementById("cF2").value=c
		document.getElementById("d2").style.visibility="visible";
	}
	if(a == 3){
		var pT3 =Number(document.getElementById("pT3").value)
		var pu = Number(document.getElementById("pU3").value)
		pT3 = pu*c
		t3=pT3
		document.getElementById("p3").innerHTML="$"+pT3
		document.getElementById("c3").innerHTML=c
		document.getElementById("cF3").value=c
		document.getElementById("d3").style.visibility="visible";
	}
	if(a == 4){
		var pT4 =Number(document.getElementById("pT3").value)
		var pu = Number(document.getElementById("pU4").value)
		pT4 = pu*c
		t4=pT4
		document.getElementById("p4").innerHTML="$"+pT4
		document.getElementById("c4").innerHTML=c
		document.getElementById("pT4").value=pT
		document.getElementById("cF4").value=c
		document.getElementById("d4").style.visibility="visible";
	}
	if(a == 5){
		var pT5 =Number(document.getElementById("pT3").value)
		var pu = Number(document.getElementById("pU5").value)
		pT5 = pu*c
		t5=pT5
		document.getElementById("p5").innerHTML="$"+pT5
		document.getElementById("c5").innerHTML=c
		document.getElementById("pT5").value=pT
		document.getElementById("cF5").value=c
		document.getElementById("d5").style.visibility="visible";
	}
	t=t1+t2+t3+t4+t5
	var tI=Number(document.getElementById("totalI").value);
	document.getElementById("total").innerHTML="$"+t;
}
function cambio(){
	document.getElementById("cant").value=1
}