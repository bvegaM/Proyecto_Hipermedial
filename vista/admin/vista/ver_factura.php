<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>
 <?php
		include '../../../config/conexion.php';
		$codigo = $_GET["codigo"];
		$codA = $_GET["codA"];
		$fc = $_GET["fc"];
		
		
		$sql="SELECT *
			  FROM T_USUARIOS
			  WHERE usu_id = $codA";
		
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		$sqlu="SELECT *
			  FROM T_USUARIOS
			  WHERE usu_id = $codigo";
		
		$resultu = $conn->query($sqlu);
		$rowu = $resultu->fetch_assoc();
		
		


	?>
<?php
			include '../../../config/conexion.php';

			$codigoc = $_GET['codA'];
			$sqlc = "SELECT * 
					FROM T_USUARIOS 
					where usu_id = $codigoc";
			$resultc = $conn->query($sqlc);
			$rowc = $resultc->fetch_assoc();
			if($rowc["usu_rol_id"] == 2){
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
				<li class="menu__item"><a href="eventos_creados.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="far fa-plus-square"><span>Eventos Creados</span></i></a></li>
				<li class="menu__item"><a href="mis_compras.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="fas fa-money-check-alt"><span>Mis Compras</span></i></a></li>
			</ul>
		</div>
		<div class="rol">
			<a href="perfil.php?codigo=<?php echo $codigo?>" class="sesion"><i class="fas fa-smile-beam"><span>Bienvenido <?php echo $row["usu_nombres"]; ?></span></i></a>
			<a href="../controladores/php/cerrar_sesion.php" class="sesion"><i class="fas fa-sign-in-alt" id="inicio"><span>Cerrar Sesión</span></i></a>
		</div>
	</nav> 
    <div class="content">
        <h1 class="logo">Tu<span>Factura</span></h1>
        <div class="contact-wrapper-compras">
            <div class="contact-form-compras" style="width:50%; margin:0 auto;">
                <form action="../controladores/php/crear_factura.php" method="post" onsubmit="return validar()" enctype="multipart/form-data" style="display:block;">
                   <div class="cabecera" style="background: white;">
                   	<i class="fas fa-ticket-alt" style="font-size:35px; color:red;"></i>
                   	<h2 style="margin:0; font-size:20px; color:black;">TIcket Home</h2>
                   	<article class="datos">
                   		<p class="datos-info"><?php echo $rowu["usu_nombres"]?></p>
                   		<p class="datos-info"><?php echo $rowu["usu_cedula"]?></p>
                   		<p class="datos-info"><?php echo $rowu["usu_direccion"]?></p>
                   	</article>
                   </div>
                   <div class="detalle" style="background:white;">
                   	<table style="width:100%; color:black; text-align:center;">
                   		<tr>
                   			<th >Cantidad</th>
                   			<th>Descripcion</th>
                   			<th>Precio U</th>
                   			<th>Precio</th>
                   		</tr>
                   		<br>
                   		<br>
                   		<br>
                   		<?php
	
						 $sql1="SELECT * 
			   					FROM T_EVENTOS,
								T_FACTURA_CABECERA,
								T_FACTURA_DETALLE
								WHERE fc_id = fd_fc_id AND
									  evt_id = fd_evt_id AND
									  fd_fc_id =$fc";
		
						$result1 = $conn->query($sql1);
						while($row1 = $result1->fetch_assoc()){
								echo "<tr>";
									echo "<td>".$row1["fd_cantidad"]."</td>";
									echo "<td style='font-size:13px;'>".$row1["fd_desc"]."</td>";
									echo "<td>$".$row1["fd_precio"]."</td>";
									echo "<td>$".$row1["fd_total"]."</td>";
								echo "</tr>";
						}
						?>
                  		<?php
						$sql1="SELECT SUM(fd_total) as sub
							   FROM T_FACTURA_CABECERA,
	 								T_FACTURA_DETALLE
									WHERE fd_fc_id = fc_id AND
										  fd_fc_id = $fc";
		
						$result1 = $conn->query($sql1);
						$row1 = $result1->fetch_assoc();
						echo "<tr>";
                   				echo "<td></td>";
								echo "<td></td>";
                   				echo "<td style='font-weight: bolder;'>Subtotal:</td>";
                   				echo "<td id='total'>$".$row1["sub"]."</td>";
                   		echo "</tr>";
						echo "<tr>";
                   				echo "<td></td>";
								echo "<td></td>";
                   				echo "<td style='font-weight: bolder;'>Iva:</td>";
                   				echo "<td id='iva'>0.12%</td>";
                   		echo "</tr>";
						echo "<tr>";
                   				echo "<td></td>";
								echo "<td></td>";
                   				echo "<td style='font-weight: bolder;'>Total:</td>";
                   				echo "<td id='totalTo'>$".($row1["sub"]+$row1["sub"]*0.12)."</td>";
                   		echo "</tr>";
						$sql1="SELECT *
							   FROM T_FACTURA_CABECERA,
	 								T_FACTURA_DETALLE
									WHERE fd_fc_id = fc_id AND
										  fd_fc_id = $fc";
		
						$result1 = $conn->query($sql1);
						$row1 = $result1->fetch_assoc();
						?>
                  		
                   	</table>   
            	</div>
			  </form>
			  <h1 class="logo">Ruta de <span>Envio</span></h1>
			</div>
       	<div id="map" style="width: 100%; height: 500px;"></div>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoJ3ujl8XgJZMJ3H8Hfu4wXa41tY_Eozc&callback=initMap">
		</script>

			<script>
		  function initMap() {
			var directionsDisplay = new google.maps.DirectionsRenderer;
			var directionsService = new google.maps.DirectionsService;
			var map = new google.maps.Map(document.getElementById('map'), {
			  zoom: 1,
			  center: {lat: -2.908447, lng: -79.007989}
			});
			directionsDisplay.setMap(map);
			calculateAndDisplayRoute(directionsService, directionsDisplay);
		  }
		  function calculateAndDisplayRoute(directionsService, directionsDisplay) {
			directionsService.route({
			  origin: {lat: -2.919045 , lng: -79.014853 },  // Haight.
			  destination: {lat:<?php echo (float)$row1["fc_latitud"]?>, lng:<?php echo (float)$row1["fc_longitud"]?> },  // Ocean Beach.
			  // Note that Javascript allows us to access the constant
			  // using square brackets and a string value as its
			  // "property."
			  travelMode: google.maps.TravelMode["DRIVING"]
			}, function(response, status) {
			  if (status == 'OK') {
				directionsDisplay.setDirections(response);
			  } else {
				window.alert('Directions request failed due to ' + status);
			  }
			});
		  }
		</script>
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
	<script src="../controladores/js/funcion.js"></script>
</body>
</html>
</html>