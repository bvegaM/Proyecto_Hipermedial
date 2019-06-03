<?php
	include '../../../../config/conexion.php';


		$id = isset($_POST["id"]) ? trim($_POST["id"]): null;
		$codigo = isset($_POST["codi"]) ? trim($_POST["codi"]): null;
		$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
		$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]): null;
		$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
		$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
		$estado = isset($_POST["estado"]) ? mb_strtoupper(trim($_POST["estado"]),"UTF-8"):null;


		$sql = "UPDATE T_EMPRESAS
				SET emp_nombre = '$nombres',
					emp_ruc = '$cedula',
					emp_direccion = '$direccion',
					emp_telefono = '$telefono',
					emp_cat_id = $estado
				WHERE emp_id = $id";

		$result=$conn->query($sql);

		header("Location: ../../vista/empresa.php?codigo=".$codigo);
?>