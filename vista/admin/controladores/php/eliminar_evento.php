<?php

	include '../../../../config/conexion.php';

	$fc=$_GET["evt"];
	$codigo=$_GET["codigo"];

	$sql="UPDATE T_EVENTOS
		  SET evt_estado_elimina ='S'
		  WHERE fc_id=$fc";
	
	$result=$conn->query($sql);

	header("Location: ../../vista/evento.php?codigo=".$codigo);

?>