<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../../public/vista/login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eventos</title>
    <style type="text/css">
        .holi{
            background: red;
        }
    </style>
</head>
<body>
<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../../public/vista/login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eventos</title>
    <style type="text/css">
        .holi{
            background: red;
        }
    </style>
</head>
<body>
<?php
	include '../../../../config/conexion.php';
            $evento = $_GET['evt'];
			$codigo = $_GET['usu'];
	
			$sql="SELECT *
			  FROM T_USUARIOS
			  WHERE usu_id = $codigo";
		
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		$sql1="SELECT *
			  FROM T_USUARIOS
			  WHERE usu_correo like '%$evento%'";
		
		$result1 = $conn->query($sql1);
?>
<div class="detalle" style="background:white;">
                   	<table style="width:100%; color:black; text-align:center;">
                   		<tr>
                   			<th style="border-bottom:1px solid black;">Nombres</th>
                   			<th style="border-bottom:1px solid black;">Apellidos</th>
                   			<th style="border-bottom:1px solid black;">Cádula</th>
                   			<th style="border-bottom:1px solid black;">Correo</th>
                   			<th style="border-bottom:1px solid black;">Modificar</th>
                   			<th style="border-bottom:1px solid black;">Eliminar</th>
                   		</tr>
                   		<?php
							while($row1 = $result1->fetch_assoc()){
								echo "<tr class='datos'>";
									echo "<td>".$row1["usu_nombres"]."</td>";
									echo "<td>".$row1["usu_apelidos"]."</td>";
									echo "<td>".$row1["usu_cedula"]."</td>";
									echo "<td>".$row1["usu_correo"]."</td>";
									echo "<td class='link_compra'><a href='perfil.php?usu=".$row1["usu_id"]."&codigo=".$codigo."'><i class='fas fa-user-edit' style='color:greenyellow;'></i></a></td>";
									if($row1["usu_estado_elimina"] == 'N'){
										echo "<td class='link_compra'><a href='../controladores/php/eliminar_usuario.php?usu=".$row1["usu_id"]."&codigo=".$codigo."'><i class='fas fa-trash-alt' style='color:red;'></i></a></td>";
									}else{
										echo "<td>ELIMINADO</td>";
									}
									
								echo "</tr>";
							}
						?>
                   	</table>
                   </div>
</body>
</html>


</body>
</html>