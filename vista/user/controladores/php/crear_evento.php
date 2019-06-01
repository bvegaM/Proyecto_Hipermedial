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

	$sql = "INSERT INTO T_EVENTOS VALUES(0,'$nombres',STR_TO_DATE(REPLACE('$fecha','/','.') ,GET_FORMAT(date,'EUR')),'$direccion',$latitud,$longitud,'$contenido','$tipo_archivo','D',0,'admin','$fechaC','N',$empresa)";


	if($conn->query($sql) === TRUE){
		$evt_id = $conn->insert_id;
		if($aG!="" && $pG !=""){
			$sql1="INSERT INTO T_EVENTOS_ASIENTOS VALUES(0,$pG,$aG,$evt_id,1)";
			$result1=$conn->query($sql1);
		}
		if($aT!="" && $pT !=""){
			$sql1="INSERT INTO T_EVENTOS_ASIENTOS VALUES(0,$pT,$aT,$evt_id,2)";
			$result1=$conn->query($sql1);
		}
		if($aP!="" && $pP !=""){
			$sql1="INSERT INTO T_EVENTOS_ASIENTOS VALUES(0,$pP,$aP,$evt_id,4)";
			$result1=$conn->query($sql1);
		}
		if($aV!="" && $pV !=""){
			$sql1="INSERT INTO T_EVENTOS_ASIENTOS VALUES(0,$pV,$aV,$evt_id,3)";
			$result1=$conn->query($sql1);
		}
		if($aB!="" && $pB !=""){
			$sql1="INSERT INTO T_EVENTOS_ASIENTOS VALUES(0,$pB,$aB,$evt_id,5)";
			$result1=$conn->query($sql1);
		}
		header("Location: ../../vista/crear_evento.php?codigo=".$id);
	}else{
		echo "error";
	}

?>
