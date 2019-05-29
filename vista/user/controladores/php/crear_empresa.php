<?php
	include '../../../../config/conexion.php';
	
	date_default_timezone_set("America/Guayaquil");	

	$categoria = isset($_POST["cat"])?trim($_POST["cat"]):null;
	$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
	$ruc = isset($_POST["ruc"]) ? trim($_POST["ruc"]): null;
	$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
	$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
	$id = isset($_POST["id"]) ? trim($_POST["id"]): null;
	$fechaC = date("y-m-d h:i:s",time());
	$latitud =  isset($_POST["latitud"])?trim($_POST["latitud"]):null;
	$longitud =  isset($_POST["longitud"])?trim($_POST["longitud"]):null;
	
<<<<<<< HEAD
	$sql ="INSERT INTO T_EMPRESAS VALUES(0,'$ruc','$nombres','$direccion','$telefono',$latitud,$longitud,'admin','$fechaC',null,null,null,null,'N',$categoria)";
	echo $sql;
=======
	$sql ="INSERT INTO T_EMPRESAS VALUES(0,'$ruc','$nombres','$direccion','$telefono',$latitud,$longitud,'admin','$fecha',null,null,null,null,'N',$categoria)";

	echo $sql;

>>>>>>> b418876c404687654970bba0cef92f50f6d715c0
	if($conn->query($sql) == TRUE){
		header("Location: ../../vista/crear_evento.php?codigo=".$id);
	}else{
		echo "<p>error</p>";
	}
?>
