function buscarPorEvento(){
    var evento = document.getElementById("evento").value
    if(correo ==""){
        document.getElementById("informacion").innerHTML="";
    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("eventos").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../controladores/php/buscar.php?evt="+evento,true);
        xmlhttp.send();
    }
}