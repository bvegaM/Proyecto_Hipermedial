function buscarPorEvento(){
    var evento = document.getElementById("evento").value
	var usuario = document.getElementById("usuario").value
    if(evento ==""){
        document.getElementById("factura").innerHTML="";
    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("factura").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../controladores/php/buscar.php?evt="+evento+"&usu="+usuario,true);
        xmlhttp.send();
    }
}

function buscarPorEmpresa(){
    var evento = document.getElementById("evento").value
	var usuario = document.getElementById("usuario").value
    if(evento ==""){
        document.getElementById("empresa").innerHTML="";
    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("empresa").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../controladores/php/buscarE.php?evt="+evento+"&usu="+usuario,true);
        xmlhttp.send();
    }
}

function buscarPorEvt(){
    var evento = document.getElementById("evento").value
	var usuario = document.getElementById("usuario").value
    if(evento ==""){
        document.getElementById("empresa").innerHTML="";
    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("empresa").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../controladores/php/buscarEvt.php?evt="+evento+"&usu="+usuario,true);
        xmlhttp.send();
    }
}