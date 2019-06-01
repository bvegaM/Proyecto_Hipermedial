<?php

	include '../../../../config/conexion.php';
	date_default_timezone_set("America/Guayaquil");	

	$id = isset($_POST["id"]) ? trim($_POST["id"]): null;
	$fechaC = date("y-m-d h:i:s",time());
	$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
	$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
	$fecha = isset($_POST["fecha"])? trim($_POST["fecha"]): null;
	$aG = isset($_POST["genAA"]) ? trim($_POST["genAA"]): null;
	$aT = isset($_POST["tribA"]) ? trim($_POST["tribA"]): null;
	$aV = isset($_POST["vipA"]) ? trim($_POST["vipA"]): null;
	$aB = isset($_POST["boxA"]) ? trim($_POST["boxA"]): null;
	$pG = isset($_POST["genAP"]) ? trim($_POST["genAP"]): null;
	$pT = isset($_POST["tribP"]) ? trim($_POST["tribP"]): null;
	$pV = isset($_POST["vipP"]) ? trim($_POST["vipP"]): null;
	$pB = isset($_POST["boxP"]) ? trim($_POST["boxP"]): null;
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

	echo $aG;
	echo $pG;
	
	if($conn->query($sql) == TRUE){
		header("Location: ../../vista/crear_evento.php?codigo=".$id);
	}else{
		echo "<p>error</p>";
	}

?>
