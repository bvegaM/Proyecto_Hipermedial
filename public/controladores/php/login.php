<?php


	session_start();
	//incluir conexion a la base de datos
    include '../../../config/conexion.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

    $sql = "SELECT count(*) as login  
            FROM T_USUARIOS
            WHERE usu_correo = '$usuario' and 
                  usu_contrasena = MD5('$contrasena') and
                  usu_estado_elimina = 'N'";


    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if ($row["login"] == 1) {
        
        $sql_1 ="SELECT usu_rol_id as rol,
                        usu_id as id
               FROM T_USUARIOS
               WHERE usu_correo = '$usuario' and
                     usu_contrasena = MD5('$contrasena')";
        
        $result_1 = $conn->query($sql_1);
        $row_1 = $result_1 ->fetch_assoc();
        
        if($row_1["rol"] == 1){
            $_SESSION['isLogged'] = TRUE;
            header("Location: ../../vista/admin/vista/index.php?codigo=".$row_1["id"]);    
        }else{
            $_SESSION['isLogged'] = TRUE;
            header("Location: ../../../vista/user/vista/index.php?codigo=".$row_1["id"]);
        }
        
    }else{
        	header("Location: ../../vista/login.html");
    }
    $conn->close();

?>