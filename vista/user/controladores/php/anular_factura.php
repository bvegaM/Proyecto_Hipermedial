<?php

	include '../../../../config/conexion.php';

	$fc=$_GET["fc"];
	$fd=$_GET["fd"];
	$codigo=$_GET["codigo"];

	$sql="UPDATE T_FACTURA_CABECERA
		  SET fc_estado_elimina ='S'
		  WHERE fc_id=$fc";
	
	$result=$conn->query($sql);

	header("Location: ../../vista/mis_compras.php?codigo=".$codigo);

?>