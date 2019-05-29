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
	<title>Comprar</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
				<li class="menu__item"><a href="contact.html" class="menu__link"><i class="fas fa-money-check-alt"><span>Mis Compras</span></i></a></li>
			</ul>
		</div>
		<div class="rol">
			<a href="perfil.php?codigo=<?php echo $codigo?>" class="sesion"><i class="fas fa-smile-beam"><span>Bienvenido <?php echo $row["usu_nombres"]; ?></span></i></a>
			<a href="../controladores/php/cerrar_sesion.php" class="sesion"><i class="fas fa-sign-in-alt" id="inicio"><span>Cerrar Sesión</span></i></a>
		</div>
	</nav>
	<section class="banner_category">
		<div class="opacidad"></div>
		<div class="banner__content">Por medio de esta página elige el evento y compra el ticket</div>
	</section>
	<main class="main">
	
		<section class="grupo_eventos grupo_event_musica">
			<h3 class="titulo_event_php">CATEGORIA MUSICA</h3>
			<div class="eventos">
				
				<?php
				 include '../../config/conexion.php';
					
				 $sql = "SELECT *
				 		 FROM T_EVENTOS,
						 	  T_CATEGORIAS,
							  T_EMPRESAS
					 	 WHERE evt_emp_id = emp_id and
						 	   emp_cat_id =cat_id and
							   cat_id =1";
				
				 $result = $conn->query($sql);
				
				 while($row = $result->fetch_assoc()){
					echo "<div class='column_event'>";
						echo "<img class='img_event' src='data:".$row['evt_img_tipo']."; base64,".base64_encode($row['evt_img'])."'>";
					 	echo "<h4 class='title_event'>".$row["evt_desc"]."</h4>";
					 	echo "<p>".$row['evt_fec_evento']."</p>";
					 	echo "<a href='resumen.php?evt='".$row["evt_id"]."class='link_event'>Ir al Evento</a>";
					echo "</div>";
				 }
				
				?>	
			</div>
		</section>
		<section class="grupo_eventos grupo_event_teatro">
			<h3 class="titulo_event_php">CATEGORIA TEATRO</h3>
			<div class="eventos">
				
				<?php
				 include '../../config/conexion.php';
					
				
				 $sql = "SELECT *
				 		 FROM T_EVENTOS,
						 	  T_CATEGORIAS,
							  T_EMPRESAS
					 	 WHERE evt_emp_id = emp_id and
						 	   emp_cat_id =cat_id and
							   cat_id = 2";
				
				 $result = $conn->query($sql);
				
				 while($row = $result->fetch_assoc()){
					echo "<div class='column_event'>";
						echo "<img class='img_event' src='data:".$row['evt_img_tipo']."; base64,".base64_encode($row['evt_img'])."'>";
					 	echo "<h4 class='title_event'>".$row["evt_desc"]."</h4>";
					 	echo "<p>".$row['evt_fec_evento']."</p>";
					 	echo "<a href='resumen.php' class='link_event'>Ir al Evento</a>";
					echo "</div>";
				 }
				
				?>	
			</div>
		</section>
		<section class="grupo_eventos grupo_event_deporte">
			<h3 class="titulo_event_php">CATEGORIA DEPORTE</h3>
			<div class="eventos">
				
				<?php
				 include '../../config/conexion.php';
					
				
				 $sql = "SELECT *
				 		 FROM T_EVENTOS,
						 	  T_CATEGORIAS,
							  T_EMPRESAS
					 	 WHERE evt_emp_id = emp_id and
						 	   emp_cat_id =cat_id and
							   cat_id = 3";
				
				 $result = $conn->query($sql);
				
				 while($row = $result->fetch_assoc()){
					echo "<div class='column_event'>";
						echo "<img class='img_event' src='data:".$row['evt_img_tipo']."; base64,".base64_encode($row['evt_img'])."'>";
					 	echo "<h4 class='title_event'>".$row["evt_desc"]."</h4>";
					 	echo "<p>".$row['evt_fec_evento']."</p>";
					 	echo "<a href='resumen.php' class='link_event'>Ir al Evento</a>";
					echo "</div>";
				 }
				
				?>	
			</div>
		</section>
		<section class="grupo_eventos grupo_event_congreso">
			<h3 class="titulo_event_php" style="color:black;">CATEGORIA CONGRESO</h3>
			<div class="eventos">
				
				<?php
				 include '../../config/conexion.php';
					
				
				 $sql = "SELECT *
				 		 FROM T_EVENTOS,
						 	  T_CATEGORIAS,
							  T_EMPRESAS
					 	 WHERE evt_emp_id = emp_id and
						 	   emp_cat_id =cat_id and
							   cat_id = 4";
				
				 $result = $conn->query($sql);
				
				 while($row = $result->fetch_assoc()){
					echo "<div class='column_event'>";
						echo "<img class='img_event' src='data:".$row['evt_img_tipo']."; base64,".base64_encode($row['evt_img'])."'>";
					 	echo "<h4 class='title_event'>".$row["evt_desc"]."</h4>";
					 	echo "<p>".$row['evt_fec_evento']."</p>";
					 	echo "<a href='' class='link_event'>Ir al Evento</a>";
					echo "</div>";
				 }
				
				?>	
			</div>
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
