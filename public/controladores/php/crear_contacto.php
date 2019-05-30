<?php
	include '../../../config/conexion.php';
	$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
	$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
	$correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
	$asunto = isset($_POST["asunto"]) ? trim($_POST["asunto"]): null;
	$calificacion = isset($_POST["cali"]) ? trim($_POST["cali"]): null;
	$mensaje = isset($_POST["mensaje"]) ? trim($_POST["mensaje"]): null;

	$sql="INSERT INTO T_CONTACTOS VALUES (0,'$nombres','$correo','$telefono','$asunto','$mensaje',$calificacion)";

	$result= $conn->query($sql);

	header("Location: ../../vista/login.html");
?>