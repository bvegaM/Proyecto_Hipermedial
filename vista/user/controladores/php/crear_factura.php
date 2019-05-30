<?php
	$evento=isset($_POST["evento"])?trim($_POST["evento"]):null;
	$codigo =isset($_POST["codigo"])?trim($_POST["codigo"]):null;
	$eventoId=isset($_POST["eventoId"])?trim($_POST["eventoId"]):null;
	$precio=isset($_POST["totalI"])?trim($_POST["totalI"]):null;
	$cantidad=isset($_POST["cnt"])?trim($_POST["cnt"]):null;

	echo $evento;
	echo $codigo;
	echo $precio;
	echo $cantidad;
	echo $eventoId;
?>