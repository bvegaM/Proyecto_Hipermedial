<?php
	$evento=isset($_POST["evento"])?trim($_POST["evento"]):null;
	$codigo =isset($_POST["codigo"])?trim($_POST["codigo"]):null;
	

	$precio=isset($_POST["precio"])?trim($_POST["precio"]):null;
	$cantidad=isset($_POST["cantidad"])?trim($_POST["cantidad"]):null;

	echo $evento;
	echo $codigo;
	echo $precio;
	echo $cantidad;
?>