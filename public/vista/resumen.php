<?php
		$evento = $_GET["evt"];
		include '../../config/conexion.php';
	
		$sql1="SELECT *
			   FROM T_EVENTOS
			   WHERE evt_id = $evento";
	
		$result1 = $conn->query($sql1);
		$row1 = $result1->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comprar</title>
	<link rel="stylesheet" href="css/styles_resumen.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoJ3ujl8XgJZMJ3H8Hfu4wXa41tY_Eozc"></script>
    <script type="text/javascript">
        function initialize() {
            // Creating map object
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 12,
                center: new google.maps.LatLng(<?php echo $row1["evt_latitud"]?>,<?php echo $row1["evt_longitud"]?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // creates a draggable marker to the given coords
            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo $row1["evt_latitud"]?>,<?php echo $row1["evt_longitud"]?>),
                draggable: true
            });

            // adds a listener to the marker
            // gets the coords when drag event ends
            // then updates the input with the new coords
            google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));

                map.panTo(evt.latLng);
            });

            // centers the map on markers coords
            map.setCenter(vMarker.position);

            // adds the marker on the map
            vMarker.setMap(map);
        }
    </script>
    <style>
		.info-block{
			background: #181818;
			color: white;
			padding: 10px;
			display: grid;
			grid-template-columns: 1fr 1fr; 
		}
		.img_event{
			margin: 0 auto;
		}
		td a i{
			color: greenyellow;
			text-align: center;
			font-size: 20px;
		}
		
		.link_compra{
			text-align: center;
		}
	</style>
</head>
<body onload="initialize();">
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
				<li class="menu__item"><a href="index.html" class="menu__link menu__link--select"><i class="fas fa-home"><span>Home</span></i></a></li>
				<li class="menu__item"><a href="about.html" class="menu__link"><i class="fas fa-book-open"><span>About</span></i></a></li>
				<li class="menu__item"><a href="category.php" class="menu__link"><i class="fab fa-buffer"><span>Category</span></i></a></li>
				<li class="menu__item"><a href="eventos.php" class="menu__link"><i class="far fa-calendar"><span>Events</span></i></a></li>
				<li class="menu__item"><a href="contact.html" class="menu__link"><i class="fas fa-address-card"><span>Contact</span></i></a></li>
			</ul>
		</div>
		<div class="rol">
			<a href="login.html" class="sesion"><i class="fas fa-sign-in-alt" id="inicio"><span>Iniciar Sesión</span></i></a>
			<a href="registro.html" class="sesion"><i class="fas fa-user-plus" id="registro"><span>Registrate</span></i></a>
		</div>
	</nav>
	<main class="main" style="background: white;">
		<section class="info-block">
			<article style="display:block; margin: 0 auto;">
				<h1 style="color:red; font-size:40px; margin:0;"><?php echo $row1["evt_desc"]?></h1>
				<h2>Fecha: <?php echo $row1["evt_fec_evento"]?></h2>
				<h2>Direccion: <?php echo $row1["evt_direccion"]?></h2>	
			</article>
			<?php echo "<img class='img_event' src='data:".$row1['evt_img_tipo']."; base64,".base64_encode($row1['evt_img'])."'>"; ?>
		</section>
		<section class="info-block">
			<div id="map_canvas" style="width: 100%; height: 400px;"></div>
			<section class="compra" style="display:block; margin:auto 0;">
					<table border="1" style="width:100%;" >
						<tr>
							<th>Tipo</th>
							<th>Precio</th>
							<th>Asientos</th>
							<th>Comprar</th>
						</tr>
						<?php
							$sql = "SELECT * 
									FROM T_EVENTOS
									WHERE evt_id=$evento";

							$result = $conn->query($sql);
							$row = $result->fetch_assoc();

							if($row["evt_gen"]>0){
								echo "<tr>";
								echo "<td>GENERAL</td>";
								echo "<td>$".$row["evt_gen_precio"]."</td>";
								echo "<td>".$row["evt_gen"]."</td>";
								echo "<td class='link_compra'><a href='login.html'><i class='fas fa-ticket-alt'></i></a></td>";
								echo "</tr>";
							}
							if($row["evt_trib"]>0){
								echo "<tr>";
								echo "<td>TRIBUNA</td>";
								echo "<td>$".$row["evt_trib_precio"]."</td>";
								echo "<td>".$row["evt_trib"]."</td>";
								echo "<td class='link_compra'><a href='login.html'><i class='fas fa-ticket-alt'></i></a></td>";
								echo "</tr>";
							}
							if($row["evt_vip"]>0){
								echo "<tr>";
								echo "<td>VIP</td>";
								echo "<td>$".$row["evt_vip_precio"]."</td>";
								echo "<td>".$row["evt_vip"]."</td>";
								echo "<td class='link_compra'><a href='login.html'><i class='fas fa-ticket-alt'></i></a></td>";
								echo "</tr>";
							}
							if($row["evt_box"]>0){
								echo "<tr>";
								echo "<td>BOX</td>";
								echo "<td>$".$row["evt_box_precio"]."</td>";
								echo "<td>".$row["evt_box"]."</td>";
								echo "<td class='link_compra'><a href='login.html'><i class='fas fa-ticket-alt'></i></a></td>";
								echo "</tr>";
							}
						?>
				</table>
				<p style="color:white; text-align:center; margin:15px;">Para comprar hacer click en el enlace de compra para que te pueda llevar al proceso de compra, recuerde que una vez hecha la compra, se puede ir a la sección de mis compras para poder anular la factura y anular su compra</p>
			</section>	
		</section>	
	</main>
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
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">Quienes Somos</a></li>
				<li><a href="category.php">Categorias</a></li>
				<li><a href="eventos.php">Eventos</a></li>
				<li><a href="contact.html">Contactos</a></li>
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
