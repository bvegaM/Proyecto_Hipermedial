<?php

	
	include '../../../../config/conexion.php';
	
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

	echo $cf4;
	echo $cf5;

	echo $cf1;
	echo $cf2;
	echo $cf3;
	if($cf4 ==""){
		echo "hola";
	}
	
?>