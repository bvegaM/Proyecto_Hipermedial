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
	var pT1=0,pT2=0,pT3=0,pT4=0,pT5=0;
	if(a == 1){
		var pu = Number(document.getElementById("pU1").value)
		pT1 =Number(document.getElementById("pT1").value)
		var pTg = pu*c
		pT1.value = pTg
		document.getElementById("c1").innerHTML=c
		document.getElementById("p1").innerHTML="$"+pTg
		document.getElementById("pT1").value=pTg
		document.getElementById("cF1").value=c
		document.getElementById("d1").style.visibility="visible";
	}
	if(a == 2){
		var pu = Number(document.getElementById("pU2").value)
		pT2 =Number(document.getElementById("pT2").value)
		var pTt = pu*c
		pT2.value = pTt
		document.getElementById("p2").innerHTML="$"+pTt
		document.getElementById("c2").innerHTML=c
		document.getElementById("pT2").value=pTt
		document.getElementById("cF2").value=c
		document.getElementById("d2").style.visibility="visible";
	}
	if(a == 3){
		var pu = Number(document.getElementById("pU3").value)
		pT3 =Number(document.getElementById("pT3").value)
		var pTp = pu*c
		pT3.value = pTp
		document.getElementById("p3").innerHTML="$"+pTp
		document.getElementById("c3").innerHTML=c
		document.getElementById("pT3").value=pTp
		document.getElementById("cF3").value=c
		document.getElementById("d3").style.visibility="visible";
	}
	if(a == 4){
		var pu = Number(document.getElementById("pU4").value)
		pT4 =Number(document.getElementById("pT4").value)
		var pTv = pu*c
		pT4.value = pTv
		document.getElementById("p4").innerHTML="$"+pTv
		document.getElementById("c4").innerHTML=c
		document.getElementById("pT4").value=pTv
		document.getElementById("cF4").value=c
		document.getElementById("d4").style.visibility="visible";
	}
	if(a == 5){
		var pu = Number(document.getElementById("pU5").value)
		pT5 =Number(document.getElementById("pT5").value)
		var pTb = pu*c
		pT5.value = pTb
		document.getElementById("p5").innerHTML="$"+pTb
		document.getElementById("c5").innerHTML=c
		document.getElementById("pT5").value=pTb
		document.getElementById("cF5").value=c
		document.getElementById("d5").style.visibility="visible";
	}
	var tI=Number(document.getElementById("totalI").value);
	t=pT1+pT2+pT3+pT4+pT5
	document.getElementById("total").innerHTML="$"+t;
}
function cambio(){
	document.getElementById("cant").value=0
}