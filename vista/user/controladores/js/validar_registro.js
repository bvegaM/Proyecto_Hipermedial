function validar(){
    var banderaT= validarTelefono()
    var banderaC = validarCedula()
    var banderaE = validarCorreo()
    var banderaF = validarFecha()
    var bandera= validarCamposObligatorios()
    
    if(banderaT == false){
        alert("Telefono Incorrecto")
    }
    if(banderaC == false){
        alert("Cedula Incorrecta")
    }
    if(banderaE == false){
        alert("El correo debe tener mas de tres caracteres antes del @ y tener el  dominio ups.edu.ec o con est.ups.edu.ec")
    }
    if(banderaF == false){
        alert("Fecha Incorretca su fecha debe estar con el formato dd/mm/yyyy o su fecha no es valida")
    }
    if(bandera == false){
        alert("Llenar Campos")
    }
    if(banderaT== false || banderaC == false || bandera == false || banderaF == false){
        return false
    }
    
}

function limpiar(){
  for(var i = 0; i < document.forms[0].length ; i++){
        var elemento = document.forms[0].elements[i]
        if(elemento.id == 'botonA' || elemento.id == 'botonB'){
            
        }else{
           elemento.style.background ='none'  
        }
    }  
}

function validarCamposObligatorios(){
    var bandera = true
    for(var i = 0; i < document.forms[0].length ; i++){
        var elemento = document.forms[0].elements[i]
        if(elemento.value.trim() == ''){
            bandera=false
            if(elemento.id == 'cedula' || elemento.id == 'telefono' || elemento.id == 'correo' || elemento.id == 'nombres' || elemento.id == 'apellidos' || elemento.id == 'contrasena' || elemento.id == 'fechaNacimiento' || elemento.id == 'direccion' ){
                elemento.style.background ='rgba(194, 32, 32,0.7)'
                elemento.style.color = 'white'
                elemento.value ="Llenar"
            }
            
        }
    }
    if(bandera == true){
        return true
    }else{
        return false
    }
}

function validarLetras(frase,identificador){
    var palabra =frase.value.substring(frase.value.length-1,frase.value.length).charCodeAt()
    var x = document.getElementById(identificador)
    var limite =frase.value.split(" ")
    if((palabra >=65 && palabra <= 90)||(palabra >=97 && palabra <= 122) || palabra ==32){
         if(identificador === "nombres" || identificador === "apellidos" ){
            if(limite.length>=3){
                alert("No puede escribir mas de dos "+identificador)
                x.value = x.value.substring(0,x.value.length-1)
                document.getElementById(identificador).style.background = "rgba(255,0,0,0.2)"
            }else{
                document.getElementById(identificador).style.background = "rgba(135, 246, 7,0.5)"
            }
        }else{
            document.getElementById(identificador).style.background = "rgba(135, 246, 7,0.5)"
        }
    }else{
         x.value = x.value.substring(0,x.value.length-1)    
        
    }
}

function validarNumeros(numero,idNum){
    var palabra =numero.value.substring(numero.value.length-1,numero.value.length).charCodeAt()
    var x = document.getElementById(idNum)
    if((palabra >=48 && palabra <= 57)){
    }else{
        x.value = x.value.substring(0,x.value.length-1) 
    }
}

function validarTelefono(){
    var x =document.getElementById("telefono").value
    if(x.length == 10){
        document.getElementById("telefono").style.background = "rgba(135, 246, 7,0.5)"
        return true
    }else{
        document.getElementById("telefono").style.background = "rgba(255,0,0,0.2)"
        return false
    }
}

function validarCedula(){
     var x =document.getElementById("cedula").value
     var total = 0;
     var longitud = x.length;
     var longcheck = longitud - 1;
    if(x.length<10){
        document.getElementById("cedula").style.background = "rgba(255,0,0,0.2)"
    }else{
      if(longitud == 10){
        for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
              var aux = x.charAt(i) * 2;
              if (aux >= 10) aux -= 9;
              total += aux;
            } else {
              total += parseInt(x.charAt(i));
            }
        }
        total = total % 10 !=0 ? 10 - total % 10 : 0;

        if (x.charAt(longitud-1) == total) {
            document.getElementById("cedula").style.background = "rgba(135, 246, 7,0.5)"
            return true
        }else{
            alert("Su cedula no corresponde a ecuador")
            return false
        }
      }else{
        return false
      }  
    }
    
}
                
function validarCorreo(){
    var x = document.getElementById("correo").value
    var correo = x.split("@")
    if(x == correo){
        document.getElementById("correo").style.background = "rgba(255,0,0,0.2)"
    }
    if(correo[0].length <= 3 ){
        document.getElementById("correo").style.background = "rgba(255,0,0,0.2)"
        return false
    }else if(correo[1] != "ups.edu.ec" && correo[1] != "est.ups.edu.ec"){
        document.getElementById("correo").style.background = "rgba(255,0,0,0.2)"
        return false
    }else{
        document.getElementById("correo").style.background = "rgba(135, 246, 7,0.5)"
        return true
    }
    
}


function validarFecha(){
    var x = document.getElementById("fechaNacimiento").value
    var regEx = /^\d{2}[/]\d{2}[/]\d{4}$/;
  if(!x.match(regEx)){
    document.getElementById("fechaNacimiento").style.background = "rgba(255,0,0,0.2)"
    return false;  
  }else{
    document.getElementById("fechaNacimiento").style.background = "rgba(135, 246, 7,0.5)"  
  }
    var dateParts = x.split("/");
  var fecha = new Date(dateParts[2], dateParts[1],dateParts[0])
  var anio = fecha.getFullYear()
  if(dateParts[1]==12){
      var mes =12
  }else{
      var mes = fecha.getMonth()
  }
  var dia = fecha.getDate()
  if(anio > 2019 || anio < 1900){
      document.getElementById("fechaNacimiento").style.background = "rgba(255,0,0,0.2)"
      return false;
  }else{
      if (mes < 1 || mes > 12){
          document.getElementById("fechaNacimiento").style.background = "rgba(255,0,0,0.2)"
          return false;
      }else if (dia < 1 || dia> 31){
          document.getElementById("fechaNacimiento").style.background = "rgba(255,0,0,0.2)"
          return false;
      }else if ((mes==4 || mes==6 || mes==9 || mes==11) && dia ==31){
          document.getElementById("fechaNacimiento").style.background = "rgba(255,0,0,0.2)"
          return false;
      }else if (mes == 2) {
            var bisiesto = (anio % 4 == 0 && (anio% 100 != 0 || anio % 400 == 0));
            if (dia> 29 || (dia ==29 && !bisiesto)){
             document.getElementById("fechaNacimiento").style.background = "rgba(255,0,0,0.2)"
             return false;   
            }else{
             document.getElementById("fechaNacimiento").style.background = "rgba(135, 246, 7,0.5)"   
            }
      }
  }
  
}
