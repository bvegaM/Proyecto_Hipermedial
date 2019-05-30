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
			  FROM T_EMPRESAS
			  WHERE emp_nombre like '%$evento%'";
		
		$result1 = $conn->query($sql1);
?>
 <div class="detalle" style="background:white;">
                   	<table style="width:100%; color:black; text-align:center;">
                   		<tr>
                   			<th style="border-bottom:1px solid black;">Nombre de la empresa</th>
                   			<th style="border-bottom:1px solid black;">RUC</th>
                   			<th style="border-bottom:1px solid black;">Direccion</th>
                   			<th style="border-bottom:1px solid black;">Telefono</th>
                   			<th style="border-bottom:1px solid black;">Eliminar Empresa</th>
                   		</tr>
                   		<?php
							while($row1 = $result1->fetch_assoc()){
								echo "<tr class='datos'>";
									echo "<td>".$row1["emp_nombre"]."</td>";
									echo "<td>".$row1["emp_ruc"]."</td>";
									echo "<td>".$row1["emp_direccion"]."</td>";
									echo "<td>".$row1["emp_telefono"]."</td>";
									if($row1["emp_estado_elimina"] == 'N'){
										echo "<td class='link_compra'><a href='../controladores/php/eliminar_empresa.php?emp=".$row1["emp_id"]."&codigo=".$codigo."'><i class='fas fa-trash-alt' style='color:red;'></i></a></td>";
									}else{
										echo "<td>ELIMINADA</td>";
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