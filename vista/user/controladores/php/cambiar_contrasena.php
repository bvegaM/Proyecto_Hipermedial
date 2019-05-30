<?php
	$codigo =isset($_POST["codigo"])?trim($_POST["codigo"]):null;
	$contrasena = isset($_POST["rcontrasena"]) ? trim($_POST["rcontrasena"]) : null;

	$sql ="UPDATE T_USUARIOS
		  SET usu_contrasena = MD5('$contrasena')
		  WHERE usu_id = $codigo";

	$result = $conn->query($sql);

	header("Location: cerrar_sesion.php");

?>