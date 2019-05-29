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
    <div class="content">
        <h1 class="logo">Crear <span>Evento</span></h1>
        <div class="contact-wrapper">
            <div class="contact-form">
                <h3>Paso 1: Crea tu Empresa u Organizador (Si ya lo registraste lo puedes encontrar)</h3>
                <form action="../controladores/php/crear_empresa.php" method="post" onsubmit="return validar()" enctype="multipart/form-data">
                    <p>
                        <input type="text" name="id" id="id" value="<?php echo $codigo ?>" hidden="hidden">
                        <label for="nombres">Nombre Empresa</label>
                        <input type="text" name="nombres" id="nombres">
                    </p>
                    <p>
                        <label for="ruc">RUC</label>
                        <input type="text" name="ruc" id="ruc">
                    </p>
                    <p>
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccion">
                    </p>
                    <p>
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" id="telefono">
                    </p>
                    <p class="block">
                    	<label for="latitude">Latitud:</label>
                    	<input id="txtLat" type="text" style="color:red" value="19.4326077" />
                    	<label for="longitude">Longitud:</label>
                    	<input id="txtLng" type="text" style="color:red" value="-99.13320799999997" /><br />
                    </p>
                    	<div id="map_canvas" style="width: auto; height: 400px;"></div>	
                    <p>
                        <?php
					    	$sql="SELECT * FROM T_CATEGORIAS";
							$result = $conn->query($sql);
						?>
                        <label for="categoria">Categoria</label>
                        <select name="cat" id="cat">
                  			<?php
								while($row = $result->fetch_assoc()){
									echo "<option value=".$row['cat_id'].">".$row['cat_desc']."</option>";
								}
							?>
                        </select>
                    </p>
                    <p class="block">
                        <input type="submit" value="Registrar" class="button" id="botonA">
                        <input type="reset" value="Cancelar" class="button" onclick="limpiar()" id="botonB">
                    </p>
                </form>
            </div>
            <div class="contact-info">
                <h3>Paso 2: Crea tu Evento para que este disponible </h3>
                <form action="../controladores/php/crear_evento.php" method="post" onsubmit="return validar()" enctype="multipart/form-data">
                    <p>
                        <input type="text" name="id" id="id" value="<?php echo $codigo ?>" hidden="hidden">
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
                    	<label for="imagenUpdate">Imagen</label>
                    	<input type='file' name='imagenUpdate' id='imagen' size='20'>
                    </p>
                     <p>
                    	<label for="asientos">Asientos</label>
                    	 <input type="text" name="asientos" id="asientos">
                   	 </p>
                   	 <p>
                    	<label for="asientos">Asientos General</label>
                    	 <input type="text" name="asientosG" id="asientosG">
                   	 </p>
                   	 <p>
                    	<label for="asientos">Asientos Tribuna</label>
                    	 <input type="text" name="asientosT" id="asientosT">
                   	 </p>
                   	 <p>
                    	<label for="asientos">Asientos VIP</label>
                    	 <input type="text" name="asientosV" id="asientosV">
                   	 </p>
                   	 <p>
                    	<label for="asientos">Asientos BOX</label>
                    	 <input type="text" name="asientosB" id="asientosB">
                   	 </p>
                   	 <p>
                    	<label for="precio">Precio $</label>
                    	 <input type="text" name="precio" id="precio">
                   	 </p>
                   	 <p>
                    	<label for="precio">Precio General $</label>
                    	 <input type="text" name="precioG" id="precioG">
                   	 </p>
                   	 <p>
                    	<label for="precio">Precio Tribuna $</label>
                    	 <input type="text" name="precioT" id="precioT">
                   	 </p>
                   	 <p>
                    	<label for="precio">Precio VIP $</label>
                    	 <input type="text" name="precioV" id="precioV">
                   	 </p>
                   	 <p>
                    	<label for="precio">Precio BOX $</label>
                    	 <input type="text" name="precioB" id="precioB">
                   	 </p>
                   	 <p>
                        <?php
					    	$sql="SELECT * FROM T_EMPRESAS";
							$result = $conn->query($sql);
						?>
                        <label for="empresa">Empresa</label>
                        <select name="emp" id="emp">
                  			<?php
								while($row = $result->fetch_assoc()){
									echo "<option value=".$row['emp_id'].">".$row['emp_nombre']."</option>";
								}
							?>
                        </select>
                    </p>
                    <p class="block">
                        <input type="submit" value="Registrar" class="button" id="botonA">
                        <input type="reset" value="Cancelar" class="button" id="botonB">
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
				<li><a href="#">Mi Perfil</a></li>
				<li><a href="">Comprar</a></li>
				<li><a href="">Crear Eventos</a></li>
				<li><a href="">Mis Compras</a></li>
			</ul>
		</div>
		<div class="footer-txt">
			<p> &copy; Todos Los Derechos Reservados Universidad Politécnica Salesiana</p>
			<p id="f-min">Cuenca-Ecuador</p>
		</div>
	</footer>
</body>
</html>