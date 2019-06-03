<?php

	
	include '../../../../config/conexion.php';
	
	//datos generales
	date_default_timezone_set("America/Guayaquil");
	$fecha = date("y-m-d h:i:s",time());
	$codigo = isset($_POST["codigo"]) ? trim($_POST["codigo"]): null;
	$evento = isset($_POST["evento"]) ? trim($_POST["evento"]): null;

	//precios totales
	$pt1 =  isset($_POST["pT1"])?trim($_POST["pT1"]):null; 
	$pt2 =  isset($_POST["pT2"])?trim($_POST["pT2"]):null;
	$pt3 =  isset($_POST["pT3"])?trim($_POST["pT3"]):null;
	$pt4 =  isset($_POST["pT4"])?trim($_POST["pT4"]):null;
	$pt5 =  isset($_POST["pT5"])?trim($_POST["pT5"]):null;
	
	//cantidades

	$cf1 =  isset($_POST["cF1"])?trim($_POST["cF1"]):null;
	$cf2 =  isset($_POST["cF2"])?trim($_POST["cF2"]):null;
	$cf3 =  isset($_POST["cF3"])?trim($_POST["cF3"]):null;
	$cf4 =  isset($_POST["cF4"])?trim($_POST["cF4"]):null;
	$cf5 =  isset($_POST["cF5"])?trim($_POST["cF5"]):null;

	//insertamos la factura cabecera
	$sql = "INSERT INTO T_FACTURA_CABECERA(0,'$fecha',-79.45,29.48,'ES','N',$codigo)";

	echo $pt2;

	if($cf1 ==""){
		echo "hola";
	}
	if($cf2 ==""){
		echo "hola";
	}
	if($cf3 ==""){
		echo "hola";
	}
	if($cf4 ==""){
		echo "hola";
	}
	if($cf5 ==""){
		echo "hola";
	}
	
?>