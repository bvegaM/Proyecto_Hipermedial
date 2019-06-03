<?php

	
	include '../../../../config/conexion.php';
	
	//datos generales
	date_default_timezone_set("America/Guayaquil");
	$fecha = date("y-m-d h:i:s",time());
	$codigo = isset($_POST["codigo"]) ? trim($_POST["codigo"]): null;
	$evento = isset($_POST["evento"]) ? trim($_POST["evento"]): null;
	$nombre =isset($_POST["nombreDesc"]) ? mb_strtoupper(trim($_POST["nombreDesc"]),"UTF-8"): null;

	//precios Unitarios
	$pu1 =  isset($_POST["pU1"])?trim($_POST["pU1"]):null; 
	$pu2 =  isset($_POST["pU2"])?trim($_POST["pU2"]):null;
	$pu3 =  isset($_POST["pU3"])?trim($_POST["pU3"]):null;
	$pu4 =  isset($_POST["pU4"])?trim($_POST["pU4"]):null;
	$pu5 =  isset($_POST["pU5"])?trim($_POST["pU5"]):null;

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
	$sql = "INSERT INTO T_FACTURA_CABECERA VALUES(0,'$fecha',-79.45,29.48,'ES','N',$codigo)";
	$result=$conn->query($sql);
	$fc_id = $conn->insert_id;
	
	//Agregando factura detalle
	if($cf1 !=0){
		$sql1= "INSERT INTO T_FACTURA_DETALLE VALUES(0,'$nombre General',$cf1,$pu1,$pt1,$fc_id,$evento)";
		$result1=$conn->query($sql1);
		$sqlU="UPDATE T_EVENTOS_ASIENTOS
			   SET eat_num_asientos = eat_num_asientos - $cf1
			   WHERE eat_evt_id = $evento AND
			   		 eat_ast_id = 1";
		$resultU=$conn->query($sqlU);
	}
	if($cf2 !=0){
		$sql2= "INSERT INTO T_FACTURA_DETALLE VALUES(0,'$nombre Tribuna',$cf2,$pu2,$pt2,$fc_id,$evento)";
		$result2=$conn->query($sql2);
		$sqlU="UPDATE T_EVENTOS_ASIENTOS
			   SET eat_num_asientos = eat_num_asientos - $cf2
			   WHERE eat_evt_id = $evento AND
			   		 eat_ast_id = 2";
		$resultU=$conn->query($sqlU);
	}
	if($cf3 !=0){
		$sql3= "INSERT INTO T_FACTURA_DETALLE VALUES(0,'$nombre VIP',$cf3,$pu3,$pt3,$fc_id,$evento)";
		$result3=$conn->query($sql3);
		$sqlU="UPDATE T_EVENTOS_ASIENTOS
			   SET eat_num_asientos = eat_num_asientos - $cf3
			   WHERE eat_evt_id = $evento AND
			   		 eat_ast_id = 3";
		$resultU=$conn->query($sqlU);
	}
	if($cf4 !=0){
		$sql4= "INSERT INTO T_FACTURA_DETALLE VALUES(0,'$nombre Palco',$cf4,$pu4,$pt4,$fc_id,$evento)";
		$result4=$conn->query($sql4);
		$sqlU="UPDATE T_EVENTOS_ASIENTOS
			   SET eat_num_asientos = eat_num_asientos - $cf4
			   WHERE eat_evt_id = $evento AND
			   		 eat_ast_id = 4";
		$resultU=$conn->query($sqlU);
	}
	if($cf5 !=0){
		$sql5= "INSERT INTO T_FACTURA_DETALLE VALUES(0,'$nombre BOX',$cf5,$pu5,$pt5,$fc_id,$evento)";
		$result5=$conn->query($sql5);
		$sqlU="UPDATE T_EVENTOS_ASIENTOS
			   SET eat_num_asientos = eat_num_asientos - $cf5
			   WHERE eat_evt_id = $evento AND
			   		 eat_ast_id = 5";
		$resultU=$conn->query($sqlU);
	}
	header("Location: ../../vista/evento.php?codigo=".$codigo);
?>