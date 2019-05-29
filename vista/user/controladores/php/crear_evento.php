<?php

	include '../../../../config/conexion.php';
	date_default_timezone_set("America/Guayaquil");	

	$id = isset($_POST["id"]) ? trim($_POST["id"]): null;
	$fechaC = date("y-m-d h:i:s",time());
	$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
	$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
	$fecha = isset($_POST["fecha"])? trim($_POST["fecha"]): null;
	$asientos = isset($_POST["asientos"]) ? trim($_POST["asientos"]): null;
	$asientosG = isset($_POST["asientosG"]) ? trim($_POST["asientosG"]): null;
	$asientosT = isset($_POST["asientosT"]) ? trim($_POST["asientosT"]): null;
	$asientosV = isset($_POST["asientosV"]) ? trim($_POST["asientosV"]): null;
	$asientosB = isset($_POST["asientosB"]) ? trim($_POST["asientosB"]): null;
	$precio = isset($_POST["precio"]) ? trim($_POST["precio"]): null;
	$precioG = isset($_POST["precioG"]) ? trim($_POST["precioG"]): null;
	$precioT = isset($_POST["precioT"]) ? trim($_POST["precioT"]): null;
	$precioV = isset($_POST["precioV"]) ? trim($_POST["precioV"]): null;
	$precioB = isset($_POST["precioB"]) ? trim($_POST["precioB"]): null;
	$empresa = isset($_POST["emp"])?trim($_POST["emp"]):null;
	$nombre_archivo = $_FILES['imagenUpdate']['name'];
    $tipo_archivo = $_FILES['imagenUpdate']['type'];
    $tamano_archivo = $_FILES['imagenUpdate']['size'];
	$latitud =  isset($_POST["latitud"])?trim($_POST["latitud"]):null;
	$longitud =  isset($_POST["longitud"])?trim($_POST["longitud"]):null;

    $archivo_objetivo = fopen($_FILES['imagenUpdate']['tmp_name'],'r');
    $contenido=fread($archivo_objetivo,$tamano_archivo);
    $contenido = addslashes($contenido);
    fclose($archivo_objetivo);


	$sql = "INSERT INTO T_EVENTOS VALUES(0,'$nombres',STR_TO_DATE('$fecha', '%d/%m/%y'),'$direccion',$latitud,$longitud,'$contenido','$tipo_archivo',$asientos,$asientosG,$asientosT,$asientosV,$asientosB,$precio,$precioG,$precioT,$precioV,$precioB,null,'admin','$fechaC',null,null,null,null,'N',$empresa)";
	
	echo $sql;
	
	if($conn->query($sql) == TRUE){
		header("Location: ../../vista/crear_evento.php?codigo=".$id);
	}else{
		echo "<p>error</p>";
	}

?>
