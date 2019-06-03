<?php
	include '../../../../config/conexion.php';
	$estado = isset($_POST["cal"]) ? trim($_POST["cal"]): null;
	$cali = isset($_POST["cali"]) ? trim($_POST["cali"]): null;
	$idcal = isset($_POST["idcal"]) ? trim($_POST["idcal"]): null;
	$codigo = isset($_POST["user"]) ? trim($_POST["user"]): null;
	$promedio = ($cali+$estado)/2;
	$sql = "UPDATE T_EVENTOS
			SET evt_calificacion = $promedio
			WHERE evt_id = $idcal";
	$result = $conn->query($sql);
	header("location: ../../vista/resumen.php?codigo=".$codigo."&evt=".$idcal);
?>