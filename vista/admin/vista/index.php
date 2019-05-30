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
    <title>Perfil</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles_perfil.css">
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
        <h1 class="logo">Mi <span>Perfil</span></h1>
        <div class="contact-wrapper">
            <div class="contact-form">
                <h3>Este es tu perfil</h3>
                <form action="../controladores/php/update_perfil.php" method="post" enctype="multipart/form-data">
                    <p>
                        <input type="text" name="id" id="id" value="<?php echo $codigo ?>" hidden="hidden">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" id="nombres" value="<?php echo $row["usu_nombres"]?>" onkeyup="validarLetras(this,'nombres')">
                    </p>
                    <p>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" value="<?php echo $row["usu_apelidos"]?>" onkeyup="validarLetras(this,'apellidos')">
                    </p>
                    <p>
                        <label for="cedula">Cedula</label>
                        <input type="text" name="cedula" id="cedula" value="<?php echo $row["usu_cedula"]?>" onkeyup="validarCedula();validarNumeros(this,'cedula')">
                    </p>
                    <p>
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" id="telefono" value="<?php echo $row["usu_telefono"]?>" onkeyup="validarTelefono();validarNumeros(this,'telefono')">
                    </p>
                    <p>
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" value="<?php echo $row["usu_direccion"]?>" onkeyup="validarLetras(this,'direccion')">
                    </p>
                    <p>
                        <label for="fecha">Fecha de Nacimiento</label>
                        <input type="text" name="fechaNacimiento" id="fechaNacimiento"  value="<?php echo $row["usu_fec_nac"]?>" onkeyup="validarFecha()">
                    </p>
                    <p>
                        <label for="correo">Correo</label>
                        <input type="text" name="correo" id="correo" value="<?php echo $row["usu_correo"]?>" onkeyup="validarCorreo()">
                    </p>
                    <p>
                    	<label for="imagenUpdate">Cambiar Imagen</label>
                    	<input type='file' name='imagenUpdate' id='imagen' size='20'>
                    </p>
                    <p class="block">
                        <input type="submit" value="Guardar Cambios" class="button" id="botonA">
                        <input type="reset" value="Cancelar" class="button" onclick="limpiar()" id="botonB">
                    </p>
                </form>
            </div>
            <div class="contact-info">
                <h4 class="logo"><i class="fas fa-ticket-alt" style="color: rgb(229,9,20,1)"></i><?php echo $row["usu_nombres"]; echo " ";echo $row["usu_apelidos"] ?></h4>
                <ul>
                    <li><?php echo "<img class='img_perfil' src='data:".$row['usu_img_tipo']."; base64,".base64_encode($row['usu_img'])."'>";?></li>
                    <li><a href="cambiar_contrasena.php?codigo=<?php echo $codigo;?>">Cambiar Contraseña</a></li>
                    <li><p style="color:white; font-size:10px;">Este es tu perfil, en donde puedes ver todos los datos que has ingresado al momento de registrarte en nuestra página si deseas cambiar cualquier campo hazlo sin ningun problema</p></li>
                </ul>
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
				<li><a href="evento.php?codigo=<?php echo $codigo?>">Comprar</a></li>
				<li><a href="crear_evento.php?codigo=<?php echo $codigo?>">Crear Eventos</a></li>
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
