<?php
	include '../../../../config/conexion.php';


		$codigo = isset($_POST["codi"]) ? trim($_POST["codi"]): null;
		$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
		$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]): null;
		$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
		$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
		$estado = isset($_POST["ast"]) ? trim($_POST["ast"]): null;


		$sql = "INSERT INTO T_EMPRESAS VALUES(0,'$cedula','$nombres','$direccion','$telefono','N',$estado)";
		$result=$conn->query($sql);

		header("Location: ../../vista/empresa.php?codigo=".$codigo);
?>