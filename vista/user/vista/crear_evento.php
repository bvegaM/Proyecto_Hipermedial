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
</head>
<body>
   
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
                <form action="../controladores/php/update_perfil.php" method="post" onsubmit="return validar()" enctype="multipart/form-data">
                    <p>
                        <input type="text" name="id" id="id" value="<?php echo $codigo ?>" hidden="hidden">
                        <label for="nombres">Nombre Empresa</label>
                        <input type="text" name="nombres" id="nombres">
                    </p>
                    <p>
                        <label for="apellidos">RUC</label>
                        <input type="text" name="apellidos" id="apellidos">
                    </p>
                    <p>
                        <label for="apellidos">Direccion</label>
                        <input type="text" name="apellidos" id="apellidos">
                    </p>
                    <p>
                        <label for="cedula">Telefono</label>
                        <input type="text" name="cedula" id="cedula">
                    </p>
                    <p>
                        <?php
					    	$sql="SELECT * FROM T_CATEGORIAS";
							$result = $conn->query($sql);
						?>
                        <label for="telefono">Categoria</label>
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
                <form action="../controladores/php/update_perfil.php" method="post" onsubmit="return validar()" enctype="multipart/form-data">
                    <p>
                        <input type="text" name="id" id="id" value="<?php echo $codigo ?>" hidden="hidden">
                        <label for="nombres">Nombre del Evento</label>
                        <input type="text" name="nombres" id="nombres">
                    </p>
                    <p>
                        <label for="fecha">Fecha del Evento</label>
                        <input type="text" name="fechaNacimiento" id="fechaNacimiento">
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
                        <label for="mepresa">Empresa</label>
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