<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>

<?php
		$codigo = $_GET["codigo"];
		$evento = $_GET["evt"];
		include '../../../config/conexion.php';
		
		$sql="SELECT *
			  FROM T_USUARIOS
			  WHERE usu_id = $codigo";
		
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	
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
	<link rel="stylesheet" href="css/styles.css">
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
				<li class="menu__item"><a href="index.php?codigo=<?php echo $codigo?>" class="menu__link menu__link--select"><i class="fas fa-home"><span>Home</span></i></a></li>
				<li class="menu__item"><a href="perfil.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="fas fa-user-edit"><span>Mi Perfil</span></i></a></li>
				<li class="menu__item"><a href="evento.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="fas fa-ticket-alt"><span>Comprar</span></i></a></li>
				<li class="menu__item"><a href="crear_evento.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="far fa-plus-square"><span>Crear Evento</span></i></a></li>
				<li class="menu__item"><a href="contact.html" class="menu__link"><i class="fas fa-money-check-alt"><span>Mis Compras</span></i></a></li>
			</ul>
		</div>
		<div class="rol">
			<a href="perfil.php?codigo=<?php echo $codigo?>" class="sesion"><i class="fas fa-smile-beam"><span>Bienvenido <?php echo $row["usu_nombres"]; ?></span></i></a>
			<a href="../controladores/php/cerrar_sesion.php" class="sesion"><i class="fas fa-sign-in-alt" id="inicio"><span>Cerrar Sesión</span></i></a>
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
			<table border="1" >
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
						echo "</tr>";
					}
					if($row["evt_trib"]>0){
						echo "<tr>";
						echo "<td>GENERAL</td>";
						echo "<td>$".$row["evt_gen_precio"]."</td>";
						echo "<td>".$row["evt_gen"]."</td>";
						echo "</tr>";
					}
					if($row["evt_vip"]>0){
						echo "<tr>";
						echo "<td>GENERAL</td>";
						echo "<td>$".$row["evt_gen_precio"]."</td>";
						echo "<td>".$row["evt_gen"]."</td>";
						echo "</tr>";
					}
					if($row["evt_box"]>0){
						echo "<tr>";
						echo "<td>GENERAL</td>";
						echo "<td>$".$row["evt_gen_precio"]."</td>";
						echo "<td>".$row["evt_gen"]."</td>";
						echo "</tr>";
					}
				?>
			</table>	
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
				<li><a href="index.php?codigo=<?php echo $codigo?>">Home</a></li>
				<li><a href="perfil.php?codigo=<?php echo $codigo?>">Mi Perfil</a></li>
				<li><a href="evento.php?codigo=<?php echo $codigo?>">Comprar</a></li>
				<li><a href="crear_evento.php?codigo=<?php echo $codigo?>">Crear Eventos</a></li>
				<li><a href="">Mis Compras</a></li>
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
