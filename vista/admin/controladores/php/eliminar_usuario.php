<?php

	include '../../../../config/conexion.php';

	$codigo=$_GET["codigo"];
	$usu=$_GET["usu"];

	$sql="UPDATE T_USUARIOS
		  SET usu_estado_elimina ='S'
		  WHERE usu_id=$fc";
	
	$result=$conn->query($sql);

	header("Location: ../../vista/usuario.php?codigo=".$codigo);

?>