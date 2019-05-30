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
			  FROM T_EVENTOS
			  WHERE evt_desc like '%$evento%'";
		
		$result1 = $conn->query($sql1);
?>
 <div class="detalle" style="background:white;">
                   	<table style="width:100%; color:black; text-align:center;">
                   		<tr>
                   			<th style="border-bottom:1px solid black;">Nombre del Evento</th>
                   			<th style="border-bottom:1px solid black;">Fecha del Evento</th>
                   			<th style="border-bottom:1px solid black;">Asientos</th>
                   			<th style="border-bottom:1px solid black;">Precio</th>
                   			<th style="border-bottom:1px solid black;">Vendidos</th>
                   			<th style="border-bottom:1px solid black;">Eliminar Evento</th>
                   		</tr>
                   		<?php
							while($row1 = $result1->fetch_assoc()){
								echo "<tr class='datos'>";
									echo "<td>".$row1["evt_desc"]."</td>";
									echo "<td>".$row1["evt_fec_evento"]."</td>";
									echo "<td>".$row1["evt_asientos"]."</td>";
									echo "<td>$".$row1["evt_precio"]."</td>";
									echo "<td>".$row1["evt_vendidos"]."</td>";
									if($row1["evt_estado_elimina"] == 'N'){
										echo "<td class='link_compra'><a href='../controladores/php/eliminar_evento.php?evt=".$row1["evt_id"]."&codigo=".$codigo."'><i class='fas fa-trash-alt' style='color:red;'></i></a></td>";
									}else{
										echo "<td>ANULADA</td>";
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