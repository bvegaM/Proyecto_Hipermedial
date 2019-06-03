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
			  FROM T_FACTURA_CABECERA
			  WHERE fc_id = $evento";
		
		$result1 = $conn->query($sql1);
?>
<div class="detalle" style="background:white;">
                   <div class="detalle" style="background:white;">
                   	<table style="width:100%; color:black; text-align:center;">
                   		<tr>
                   			<th style="border-bottom:1px solid black;">N° Factura</th>
                   			<th style="border-bottom:1px solid black;">fecha de Emisión</th>
                   			<th style="border-bottom:1px solid black;">Estado</th>
                   			<th style="border-bottom:1px solid black;">Ver</th>
                   			<th style="border-bottom:1px solid black;">Anular Factura</th>
                   		</tr>
                   		<?php
							while($row1 = $result1->fetch_assoc()){
								echo "<tr class='datos'>";
									echo "<td>".$row1["fc_id"]."</td>";
									echo "<td>".$row1["fc_fecha"]."</td>";
									if($row1["fc_estado_entrega"] == 'ES'){
										echo "<td>EN ESPERA</td>";
									}
									if($row1["fc_estado_entrega"] == 'NP'){
										echo "<td>EN PROGRESO</td>";
									}
									if($row1["fc_estado_entrega"] == 'R'){
										echo "<td>RECIBIDO</td>";
									}
									echo "<td>"."<a href='ver_factura.php?fc=".$row1["fc_id"]."&codigo=".$row1["fc_usu_id"]."&codA=".$codigo."'>"."<i class='far fa-eye' style='color:greenyellow;'></i>"."</a>"."</td>";
									if($row1["fc_estado_elimina"] == 'N'){
										echo "<td class='link_compra'><a href='../controladores/php/anular_factura.php?fc=".$row1["fc_id"]."&codigo=".$codigo."'><i class='fas fa-trash-alt' style='color:red;'></i></a></td>";
									}else{
										echo "<td>ANULADA</td>";
									}
									
								echo "</tr>";
							}
						?>
                   	</table>
                   </div>
                   </div>
</body>
</html>


</body>
</html>