<?php

	include '../../../../config/conexion.php';

	$fc=$_GET["emp"];
	$codigo=$_GET["codigo"];

	$sql="UPDATE T_EMPRESAS
		  SET emp_estado_elimina ='S'
		  WHERE emp_id=$fc";
	
	$result=$conn->query($sql);

	header("Location: ../../vista/empresa.php?codigo=".$codigo);

?>