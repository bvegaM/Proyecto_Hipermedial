<?php

	include '../../../../config/conexion.php';

	$fc=$_GET["fc"];
	$fd=$_GET["fd"];
	$codigo=$_GET["codigo"];

	$sql="UPDATE T_FACTURA_CABECERA
		  SET fc_estado ='S'
		  WHERE fc_id=$fc";
	
	$result=$conn->query($sql);

	$sql="UPDATE T_FACTURA_DETALLE
		  SET fd_estado ='S'
		  WHERE fd_id=$fd";

	$result=$conn->query($sql);

	header("Location: ../../vista/facturas.php?codigo=".$codigo);

?>