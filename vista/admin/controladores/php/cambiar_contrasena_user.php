<?php
	
	include '../../../../config/conexion.php';

	$codigo =isset($_POST["codigo"])?trim($_POST["codigo"]):null;
	$contrasena = isset($_POST["rcontrasena"]) ? trim($_POST["rcontrasena"]) : null;

	echo $codigo;
	echo $contrasena;
	$sql ="UPDATE T_USUARIOS
		  SET usu_contrasena = MD5('$contrasena')
		  WHERE usu_id = $codigo";

	$result = $conn->query($sql);

	header("location: ../../vista/usuario.php?codigo=".$codigo);
?>