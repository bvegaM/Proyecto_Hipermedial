<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>
 <?php
		$evt=$_GET["evt"];
		$evtId=$_GET["evtId"];
		$codigo = $_GET["codigo"];
		include '../../../config/conexion.php';
		
		$sql="SELECT *
			  FROM T_USUARIOS
			  WHERE usu_id = $codigo";
		
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		$sql1="SELECT *
			  FROM T_EVENTOS
			  WHERE evt_id = $evt";
		
		$result1 = $conn->query($sql1);
		$row1 = $result1->fetch_assoc();


	?>
<?php
			include '../../../config/conexion.php';

			$codigoc = $_GET['codigo'];
			$sqlc = "SELECT * 
					FROM T_USUARIOS 
					where usu_id = $codigoc";
			$resultc = $conn->query($sqlc);
			$rowc = $resultc->fetch_assoc();
			if($rowc["usu_rol_id"] == 1){
			   header("Location: ../../../public/vista/blanco.html"); 
			}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comprar</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles_evento.css">
    <style>
		.datos .datos-info{
			color: black;
			margin: 0;
			padding: 0;
			text-align: right;
			font-size: 10px;
		}
	</style>
</head>
<body>  
 	<header class="header">
		<div class="cabecera">
			<h1 class="logo"><i class="fas fa-ticket-alt"></i>Ticket Home</h1>
	
			<div class="info">
				<i class="fas fa-phone"><span>09-85164142</span></i>
				<i class="fas fa-map-marker-alt"><span>Mall del Rio Planta Baja</span></i>
			</div>
		</div>
	</header>
	<nav class="navegador">
		<div class="menu_despegable">
			<i class="fas fa-bars" id="btnmenu"></i>
			<ul class="menu" id="menu">
				<li class="menu__item"><a href="index.php?codigo=<?php echo $codigo?>" class="menu__link menu__link--select"><i class="fas fa-home"><span>Home</span></i></a></li>
				<li class="menu__item"><a href="perfil.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="fas fa-user-edit"><span>Mi Perfil</span></i></a></li>
				<li class="menu__item"><a href="evento.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="fas fa-ticket-alt"><span>Comprar</span></i></a></li>
				<li class="menu__item"><a href="crear_evento.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="far fa-plus-square"><span>Crear Evento</span></i></a></li>
				<li class="menu__item"><a href="mis_compras.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="fas fa-money-check-alt"><span>Mis Compras</span></i></a></li>
			</ul>
		</div>
		<div class="rol">
			<a href="perfil.php?codigo=<?php echo $codigo?>" class="sesion"><i class="fas fa-smile-beam"><span>Bienvenido <?php echo $row["usu_nombres"]; ?></span></i></a>
			<a href="../controladores/php/cerrar_sesion.php" class="sesion"><i class="fas fa-sign-in-alt" id="inicio"><span>Cerrar Sesión</span></i></a>
		</div>
	</nav> 
    <div class="content">
        <h1 class="logo">Revisa TU <span>Compra</span></h1>
        <div class="contact-wrapper">
            <div class="contact-info">
                <h3>Selecciona la cantidad de Tickets a comprar</h3>
                <form enctype="multipart/form-data" style="display:block;">
                   <p>
                   	 <label for="cant">Cantidad de Boletos </label>
                   	 <input type="number" name="cant" id="cant" min="0" max="3" step="1" onclick="cambiarCantidad();" onchange="cambiarCantidad();" onkeyup="cambiarCantidad();">
                   </p>
                   <p style="text-align:center display:block;"> 
                   	 Te recordamos que solo puedes escoger hasta tres boletos ya que más de 3 es excederse del limite acordado, si deseas más tickets
                   	 genera otra compra y se te creara otra factura.
                   </p>
                </form>
            </div>
            <div class="contact-form">
                <h3>Vista Previa</h3>
                <form action="../controladores/php/crear_factura.php" method="post" onsubmit="return validar()" enctype="multipart/form-data">
                  <input type="text" name="cnt" id="cnt" value="" hidden="hidden">
                  <input type="text" name="codigo" id="codigo" value="<?php echo $codigo;?>" hidden="hidden">
                  <input type="text" name="evento" id="evento" value="<?php echo $evt;?>" hidden="hidden">
                  <input type="text" name="eventoId" id="eventoId" value="<?php echo $evtId;?>" hidden="hidden">
                   <div class="cabecera" style="background: white;">
                   	<i class="fas fa-ticket-alt" style="font-size:35px; color:red;"></i>
                   	<h2 style="margin:0; font-size:20px; color:black;">TIcket Home</h2>
                   	<article class="datos">
                   		<p class="datos-info"><?php echo $row["usu_nombres"]?></p>
                   		<p class="datos-info"><?php echo $row["usu_cedula"]?></p>
                   		<p class="datos-info"><?php echo $row["usu_direccion"]?></p>
                   	</article>
                   </div>
                   <div class="detalle" style="background:white;">
                   	<table style="width:100%; color:black; text-align:center;">
                   		<tr>
                   			<th >Cantidad</th>
                   			<th>Descripcion</th>
                   			<th>Precio</th>
                   		</tr>
                   		<br>
                   		<br>
                   		<br>
                   		<?php 
						 if($evtId == 1){
							echo "<tr>";
                   				echo "<td id='cantidad'>1</td>";
                   				echo "<td>".$row1["evt_desc"]." General</td>";
                   				echo "<td>$".$row1["evt_gen_precio"]."</td>";
							 	echo "<input type='number' id='precio' name='precio' value='".$row1["evt_gen_precio"]."' hidden='hidden'></td>";
							 	echo "<input type='number' id='totalI' name='total' value='' hidden='hidden'></td>";
                   			echo "</tr>";
                   			echo "<tr>";
                   				echo "<td></td>";
                   				echo "<td style='font-weight: bolder;'>Total:</td>";
                   				echo "<td id='total'>$".$row1["evt_gen_precio"]."</td>";
                   			echo "</tr>";
						 }
						if($evtId == 2){
							echo "<tr>";
                   				echo "<td id='cantidad'>1</td>";
                   				echo "<td>".$row1["evt_desc"]." Tribuna</td>";
                   				echo "<td>$".$row1["evt_trib_precio"]."</td>";
								echo "<input type='number' id='precio' name='precio' value='".$row1["evt_trib_precio"]."' hidden='hidden'></td>";
								echo "<input type='number' id='totalI' name='total' value='' hidden='hidden'></td>";
                   			echo "</tr>";
                   			echo "<tr>";
                   				echo "<td></td>";
                   				echo "<td style='font-weight: bolder;'>Total:</td>";
                   				echo "<td id='total'>$".$row1["evt_trib_precio"]."</td>";
                   			echo "</tr>";
						 }
						if($evtId == 3){
							echo "<tr>";
                   				echo "<td id='cantidad'>1</td>";
                   				echo "<td>".$row1["evt_desc"]." VIP</td>";
                   				echo "<td>$".$row1["evt_vip_precio"]."</td>";
								echo "<input type='number' id='precio' name='precio' value='".$row1["evt_vip_precio"]."' hidden='hidden'></td>";
								echo "<input type='number' id='totalI' name='total' value='' hidden='hidden'></td>";
                   			echo "</tr>";
                   			echo "<tr>";
                   				echo "<td></td>";
                   				echo "<td style='font-weight: bolder;'>Total:</td>";
                   				echo "<td id='total'>$".$row1["evt_vip_precio"]."</td>";
                   			echo "</tr>";
						 }
						if($evtId == 4){
							echo "<tr>";
                   				echo "<td id='cantidad'>1</td>";
                   				echo "<td>".$row1["evt_desc"]." BOX</td>";
                   				echo "<td>$".$row1["evt_box_precio"]."</td>";
								echo "<input type='number' id='precio' name='precio' value='".$row1["evt_box_precio"]."' hidden='hidden'></td>";
								echo "<input type='number' id='totalI' name='total' value='' hidden='hidden'></td>";
                   			echo "</tr>";
                   			echo "<tr>";
                   				echo "<td></td>";
                   				echo "<td style='font-weight: bolder;'>Total:</td>";
                   				echo "<td id='total'>$".$row1["evt_box_precio"]."</td>";
                   			echo "</tr>";
						 }
						?>
                   		
                   	</table>
                   </div>
                    <p class="block">
                        <input type="submit" value="Comprar" class="button" id="botonA">
                        <input type="reset" value="Cancelar" class="button" onclick="limpiar()" id="botonB">
                    </p>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
		<div class="footer-social-icons">
			<ul>
				<li><a href="" target="blank"><i class="fab fa-facebook-square"></i>
				</a></li>
				<li><a href="" target="blank"><i class="fab fa-instagram"></i></a></li>
				<li><a href="" target="blank"><i class="fab fa-github"></i></a></li>
			</ul>
		</div>
		<div class="footer-menu-one">
			<ul>
				<li><a href="index.php?codigo=<?php echo $codigo?>">Home</a></li>
				<li><a href="perfil.php?codigo=<?php echo $codigo?>">Mi Perfil</a></li>
				<li><a href="evento.php?codigo=<?php echo $codigo?>">Comprar</a></li>
				<li><a href="#">Crear Eventos</a></li>
				<li><a href="mis_compras.php?codigo=<?php echo $codigo?>">Mis Compras</a></li>
			</ul>
		</div>
		<div class="footer-txt">
			<p> &copy; Todos Los Derechos Reservados Universidad Politécnica Salesiana</p>
			<p id="f-min">Cuenca-Ecuador</p>
		</div>
	</footer>
	<script src="../controladores/js/funciones.js"></script>
</body>
</html>