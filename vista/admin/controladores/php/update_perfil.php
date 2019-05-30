<?php

		include '../../../../config/conexion.php';


		$id = isset($_POST["id"]) ? trim($_POST["id"]): null;
		$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
		$apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]),"UTF-8"): null;
		$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]): null;
		$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
		$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
		$correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
		$fecha = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
		$fechaC = date("y-m-d h:i:s",time());
 		$nombre_archivo = $_FILES['imagenUpdate']['name'];
       		$tipo_archivo = $_FILES['imagenUpdate']['type'];
        	$tamano_archivo = $_FILES['imagenUpdate']['size'];
		
		echo $nombre_archivo;        
		//IMAGEN
		
		if($nombre_archivo == ''){
			   $sql ="UPDATE T_USUARIOS 
			   SET usu_nombres = '$nombres',
			   	   usu_apelidos = '$apellidos',
				   usu_cedula = '$cedula',
				   usu_direccion = '$direccion',
				   usu_telefono = '$telefono',
				   usu_correo = '$correo',
				   usu_fec_nac = '$fecha',
				   usu_modifica = 'admin',
				   usu_fec_modifica = '$fechaC'
				WHERE usu_id = $id";
		}else{
		$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] .'/Proyecto_Hipermedial/images';
        	$archivo_objetivo = fopen($_FILES['imagenUpdate']['tmp_name'],'r');
		$contenido=fread($archivo_objetivo,$tamano_archivo);
        	$contenido = addslashes($contenido);
		fclose($archivo_objetivo);	
			$sql ="UPDATE T_USUARIOS 
			   SET usu_nombres = '$nombres',
			   	   usu_apelidos = '$apellidos',
				   usu_cedula = '$cedula',
				   usu_direccion = '$direccion',
				   usu_telefono = '$telefono',
				   usu_correo = '$correo',
				   usu_fec_nac = '$fecha',
				   usu_img = '$contenido',
				   usu_img_tipo = '$tipo_archivo',
				   usu_modifica = 'admin',
				   usu_fec_modifica = '$fechaC'
				WHERE usu_id = $id";
		};
		if($conn->query($sql) === TRUE){
            		 header("location: ../../vista/index.php?codigo=".$id);
        	} else {
             		echo "<div>";
                    		echo "<p class='exito'>Actualización erronea</p>";
                	echo "</div>";
        	}
?>
