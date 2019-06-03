<?php

	include '../../../../config/conexion.php';
	date_default_timezone_set("America/Guayaquil");	

	$id = isset($_POST["id"]) ? trim($_POST["id"]): null;
	$evt = isset($_POST["event"]) ? trim($_POST["event"]): null;
	//DATOS PARA CREAR EVENTO
	$fechaC = date("y-m-d h:i:s",time());
	$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
	$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
	$fecha = isset($_POST["fecha"])? trim($_POST["fecha"]): null;
	$empresa = isset($_POST["emp"])?trim($_POST["emp"]):null;
	$nombre_archivo = $_FILES['imagenUpdate']['name'];
    $tipo_archivo = $_FILES['imagenUpdate']['type'];
    $tamano_archivo = $_FILES['imagenUpdate']['size'];
	//PARA EL MAPA
	$latitud =  isset($_POST["latitud"])?trim($_POST["latitud"]):null;
	$longitud =  isset($_POST["longitud"])?trim($_POST["longitud"]):null;
	//ASIENTOS PARA EL EVENTO
	$aG = isset($_POST["genA"]) ? trim($_POST["genA"]): null;
	$aT = isset($_POST["tribA"]) ? trim($_POST["tribA"]): null;
	$aP = isset($_POST["palA"]) ? trim($_POST["palA"]): null;
	$aV = isset($_POST["vipA"]) ? trim($_POST["vipA"]): null;
	$aB = isset($_POST["boxA"]) ? trim($_POST["boxA"]): null;
	$pG = isset($_POST["genP"]) ? trim($_POST["genP"]): null;
	$pT = isset($_POST["tribP"]) ? trim($_POST["tribP"]): null;
	$pP = isset($_POST["palP"]) ? trim($_POST["palP"]): null;
	$pV = isset($_POST["vipP"]) ? trim($_POST["vipP"]): null;
	$pB = isset($_POST["boxP"]) ? trim($_POST["boxP"]): null;

	if($nombre_archivo == ""){
		$sql = "UPDATE T_EVENTOS
			SET evt_desc='$nombres',
				evt_fec_evento='$fecha',
				evt_direccion='$direccion',
				evt_latitud=$latitud,
				evt_longitud=$longitud,
				evt_emp_id = $empresa
			WHERE evt_id = $evt";
		$result = $conn->query($sql);
	}else{
		//IMAGEN
    $archivo_objetivo = fopen($_FILES['imagenUpdate']['tmp_name'],'r');
    $contenido=fread($archivo_objetivo,$tamano_archivo);
    $contenido = addslashes($contenido);
    fclose($archivo_objetivo);

	$sql = "UPDATE T_EVENTOS
			SET evt_desc='$nombres',
				evt_fec_evento='$fecha',
				evt_direccion='$direccion',
				evt_latitud=$latitud,
				evt_longitud=$longitud,
				evt_emp_id = $empresa,
				evt_img = '$contenido',
				evt_img_tipo = '$tipo_archivo'
			WHERE evt_id = $evt";	
		$result = $conn->query($sql);
	}

		if($aG!="" && $pG !=""){
			$sql1="SELECT COUNT(*) as count 
				   FROM T_EVENTOS_ASIENTOS
				   WHERE eat_evt_id = $evt AND
	  					 eat_ast_id = 1";
			$result1=$conn->query($sql1);
			$row1=$result1->fetch_assoc();
			if($row1["count"] == 1){
				$sql1="UPDATE T_EVENTOS_ASIENTOS
					   SET eat_num_asientos = $aG,
					   	   eat_precio = $pG
					   WHERE eat_evt_id = $evt AND
					   		 eat_ast_id = 1";
			}else{
				$sql1="INSERT INTO T_EVENTOS_ASIENTOS VALUES(0,$pG,$aG,$evt_id,1)";
				$result1=$conn->query($sql1);
			}
		}
		if($aT!="" && $pT !=""){
			$sql2="SELECT COUNT(*) as count 
				   FROM T_EVENTOS_ASIENTOS
				   WHERE eat_evt_id = $evt AND
	  					 eat_ast_id = 2";
			$result2=$conn->query($sql2);
			$row2=$result2->fetch_assoc();
				if($row2["count"] == 1){
					$sql2="UPDATE T_EVENTOS_ASIENTOS
					   SET eat_num_asientos = $aG,
					   	   eat_precio = $pG
					   WHERE eat_evt_id = $evt AND
					   		 eat_ast_id = 2";
					$result2=$conn->query($sql2);
				}else{
					$sql2="INSERT INTO T_EVENTOS_ASIENTOS VALUES(0,$pG,$aG,$evt_id,1)";
					$result2=$conn->query($sql2);
				}
		}
		if($aV!="" && $pV !=""){
			$sql3="SELECT COUNT(*) as count 
				   FROM T_EVENTOS_ASIENTOS
				   WHERE eat_evt_id = $evt AND
	  					 eat_ast_id = 3";
			$result3=$conn->query($sql3);
			$row3=$result3->fetch_assoc();
				if($row3["count"] == 1){
					$sql3="UPDATE T_EVENTOS_ASIENTOS
					   SET eat_num_asientos = $aG,
					   	   eat_precio = $pG
					   WHERE eat_evt_id = $evt AND
					   		 eat_ast_id = 3";
					$result3=$conn->query($sql3);
				}else{
					$sql3="INSERT INTO T_EVENTOS_ASIENTOS VALUES(0,$pG,$aG,$evt_id,1)";
					$result3=$conn->query($sql3);
				}
		}
		if($aP!="" && $pP !=""){
			$sql4="SELECT COUNT(*) as count 
				   FROM T_EVENTOS_ASIENTOS
				   WHERE eat_evt_id = $evt AND
	  					 eat_ast_id = 4";
			$result4=$conn->query($sql4);
			$row4=$result4->fetch_assoc();
				if($row4["count"] == 1){
					$sql4="UPDATE T_EVENTOS_ASIENTOS
					   SET eat_num_asientos = $aG,
					   	   eat_precio = $pG
					   WHERE eat_evt_id = $evt AND
					   		 eat_ast_id = 4";
					$result4=$conn->query($sql4);
				}else{
					$sql4="INSERT INTO T_EVENTOS_ASIENTOS VALUES(0,$pG,$aG,$evt_id,1)";
					$result4=$conn->query($sql4);
				}
		}
		
		if($aB!="" && $pB !=""){
			$sql5="SELECT COUNT(*) as count 
				   FROM T_EVENTOS_ASIENTOS
				   WHERE eat_evt_id = $evt AND
	  					 eat_ast_id = 5";
			$result5=$conn->query($sql5);
			$row5=$result5->fetch_assoc();
				if($row5["count"] == 1){
					$sql5="UPDATE T_EVENTOS_ASIENTOS
					   SET eat_num_asientos = $aG,
					   	   eat_precio = $pG
					   WHERE eat_evt_id = $evt AND
					   		 eat_ast_id = 5";
					$result5=$conn->query($sql5);
				}else{
					$sql5="INSERT INTO T_EVENTOS_ASIENTOS VALUES(0,$pG,$aG,$evt_id,1)";
					$result5=$conn->query($sql5);
				}
		}
?>
