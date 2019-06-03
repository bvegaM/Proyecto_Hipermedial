<?php

	include '../../../../config/conexion.php';

	$codigo =isset($_POST["codigo"])?trim($_POST["codigo"]):null;
	$fc =isset($_POST["codi"])?trim($_POST["codi"]):null;
	$estado = isset($_POST["ast"]) ? mb_strtoupper(trim($_POST["ast"]),"UTF-8"):null;

	$sql="UPDATE T_FACTURA_CABECERA
		  SET fc_estado_entrega ='$estado'
		  WHERE fc_id=$fc";
	
	$result=$conn->query($sql);

	header("Location: ../../vista/facturas.php?codigo=".$codigo);

?>