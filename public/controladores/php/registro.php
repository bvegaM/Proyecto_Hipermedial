<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exito</title>
</head>
<body>
	 <?php
    
        //incluir conexion a la base de datos
		include '../../../config/conexion.php';
		
		//comentario 
	
		date_default_timezone_set("America/Guayaquil");	
	
			$rol = isset($_POST["roles"]) ? trim($_POST["roles"]): null;
			$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
			$apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]),"UTF-8"): null;
			$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]): null;
			$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
			$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
			$correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
			$fecha = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
			$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]): null;
			$fechaC = date("y-m-d h:i:s",time());
			
			$sql = "INSERT INTO T_USUARIOS VALUES (0,STR_TO_DATE(REPLACE('$fecha','/','.') ,GET_FORMAT(date,'EUR')),'$cedula','$nombres','$apellidos','$telefono','$direccion','$correo',MD5('$contrasena'),null,null,'admin','$fechaC',null,null,null,null,'N',$rol)";
		
			if($conn->query($sql) == TRUE){
				header("Location: ../../vista/login.html");
			}else{
				echo "<p>error</p>";
			}
	
    ?>
</body>
</html>
