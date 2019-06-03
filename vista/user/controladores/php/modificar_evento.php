<?php

	include '../../../../config/conexion.php';
	date_default_timezone_set("America/Guayaquil");	

	$id = isset($_POST["id"]) ? trim($_POST["id"]): null;

	//DATOS PARA CREAR EVENTO
	$fechaC = date("y-m-d h:i:s",time());
	$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
	$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
	$fecha = isset($_POST["fecha"])? trim($_POST["fecha"]): null;
	$empresa = isset($_POST["emp"])?trim($_POST["emp"]):null;
	$nombre_archivo = $_FILES['imagenUpdate']['name'];
    $tipo_archivo = $_FILES['imagenUpdate']['type'];
    $tamano_archivo = $_FILES['imagenUpdate']['size'];
	//PARA EL MAPA
	$latitud =  isset($_POST["latitud"])?trim($_POST["latitud"]):null;
	$longitud =  isset($_POST["longitud"])?trim($_POST["longitud"]):null;
	//ASIENTOS PARA EL EVENTO
	$aG = isset($_POST["genA"]) ? trim($_POST["genA"]): null;
	$aT = isset($_POST["tribA"]) ? trim($_POST["tribA"]): null;
	$aP = isset($_POST["palA"]) ? trim($_POST["palA"]): null;
	$aV = isset($_POST["vipA"]) ? trim($_POST["vipA"]): null;
	$aB = isset($_POST["boxA"]) ? trim($_POST["boxA"]): null;
	$pG = isset($_POST["genP"]) ? trim($_POST["genP"]): null;
	$pT = isset($_POST["tribP"]) ? trim($_POST["tribP"]): null;
	$pP = isset($_POST["palP"]) ? trim($_POST["palP"]): null;
	$pV = isset($_POST["vipP"]) ? trim($_POST["vipP"]): null;
	$pB = isset($_POST["boxP"]) ? trim($_POST["boxP"]): null;
	
	//IMAGEN
    $archivo_objetivo = fopen($_FILES['imagenUpdate']['tmp_name'],'r');
    $contenido=fread($archivo_objetivo,$tamano_archivo);
    $contenido = addslashes($contenido);
    fclose($archivo_objetivo);

	$sql = "UPDATE T_EVENTOS
			SET evt_desc='$nombres',
				evt_fecha='$fecha',
				evt_direccion='$direccion',
				evt_latitud=$latitud,
				evt_longitud=$longitud";
?>
