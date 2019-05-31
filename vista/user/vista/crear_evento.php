<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Evento</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles_evento.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoJ3ujl8XgJZMJ3H8Hfu4wXa41tY_Eozc"></script>
    <script type="text/javascript">
        function initialize() {
            // Creating map object
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 12,
                center: new google.maps.LatLng(-2.897583, -78.997963),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // creates a draggable marker to the given coords
            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(-2.897583, -78.997963),
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
</head>
<body onload="initialize();">
   
   <?php
		$codigo = $_GET["codigo"];
		include '../../../config/conexion.php';
		
		$sql="SELECT *
			  FROM T_USUARIOS
			  WHERE usu_id = $codigo";
		
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
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
    <div class="content">
        <h1 class="logo">Crear <span>Evento</span></h1>
        <div class="contact-wrapper">
            <div class="contact-form">
                <h3>Crea tu Evento de acuerdo a tus comodidades</h3>
                <form action="../controladores/php/crear_empresa.php" method="post" onsubmit="return validar()" enctype="multipart/form-data">
                 	<p>
                        <input type="text" name="id" id="id" value="<?php echo $codigo ?>" hidden="hidden">
                        <input id="txtLat" name="latitud" type="text" style="color:red;" hidden="hidden" value="19.4326077"/>
                    	<input id="txtLng"  name="longitud" type="text" style="color:red;" hidden="hidden" value="-99.13320799999997" />
                        <label for="nombres">Nombre del Evento</label>
                        <input type="text" name="nombres" id="nombres">
                    </p>
                    <p>
                        <label for="fecha">Fecha del Evento</label>
                        <input type="text" name="fecha" id="fecha">
                    </p>
                    <p>
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion">
                    </p>
                    <p>
                    	<label for="imagenUpdate">Selecciona una Imagen</label>
                    	<input type='file' name='imagenUpdate' id='imagen' size='10' style="font-size:10px;">
                    </p>
                    <p>
                    	<label for="asiento">Escoge tus asientos</label>
                    </p>
                    <div class="block">
                    	
                    	<input type="checkbox" value="general">
                    	<span>General</span>
                    	<input type="checkbox" value="general">
                    	<span>Tribuna</span>
                    	<input type="checkbox" value="general">
                    	<span>Palco</span>
                    	<input type="checkbox" value="general">
                    	<span>VIP</span>
                    	<input type="checkbox" value="general">
                    	<span>BOX</span>
                    </div>
                    <p class="block">
                        <input type="submit" value="Registrar" class="button" id="botonA">
                        <input type="reset" value="Cancelar" class="button" id="botonB">
                    </p>
                    
                </form>
            </div>
            <div class="contact-info">
                 <h3>Escoge la ubicación de tu evento</h3>    
                 <div id="map_canvas" style="width: auto; height: 400px;" class="block"></div>	     
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
</body>
</html>