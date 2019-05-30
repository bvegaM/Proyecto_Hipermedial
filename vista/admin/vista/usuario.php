<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>
 <?php
		$codigo = $_GET["codigo"];
		include '../../../config/conexion.php';
		
		$sql="SELECT *
			  FROM T_USUARIOS
			  WHERE usu_id = $codigo";
		
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		$sql1="SELECT *
			  FROM T_USUARIOS";
		
		$result1 = $conn->query($sql1);
	?>
  <?php
			include '../../../config/conexion.php';

			$codigoc = $_GET['codigo'];
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
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles_evento.css">
    <style>
		.datos{
			background: #181818;
			color: white;
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
				<li class="menu__item"><a href="facturas.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="fas fa-ticket-alt"><span>Facturas</span></i></a></li>
				<li class="menu__item"><a href="evento.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="far fa-plus-square"><span>Eventos</span></i></a></li>
				<li class="menu__item"><a href="empresa.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="far fa-plus-square"><span>Empresa</span></i></a></li>
				<li class="menu__item"><a href="usuario.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="fas fa-money-check-alt"><span>Usuarios</span></i></a></li>
			</ul>
		</div>
		<div class="rol">
			<a href="index.php?codigo=<?php echo $codigo?>" class="sesion"><i class="fas fa-smile-beam"><span>Bienvenido <?php echo $row["usu_nombres"]; ?></span></i></a>
			<a href="../controladores/php/cerrar_sesion.php" class="sesion"><i class="fas fa-sign-in-alt" id="inicio"><span>Cerrar Sesión</span></i></a>
		</div>
	</nav>
    <div class="content">
        <h1 class="logo"><span>Usuarios</span></h1>
        <div class="contact-wrapper-compras">               
            <div class="contact-form-compras">
                <h3>Mis Compras</h3>
                <form action="../controladores/php/crear_factura.php" method="post" onsubmit="return validar()" enctype="multipart/form-data">
                   <div class="detalle" style="background:white;">
                   	<table style="width:100%; color:black; text-align:center;">
                   		<tr>
                   			<th style="border-bottom:1px solid black;">Nombres</th>
                   			<th style="border-bottom:1px solid black;">Apellidos</th>
                   			<th style="border-bottom:1px solid black;">Cádula</th>
                   			<th style="border-bottom:1px solid black;">Correo</th>
                   			<th style="border-bottom:1px solid black;">Modificar</th>
                   			<th style="border-bottom:1px solid black;">Eliminar</th>
                   		</tr>
                   		<?php
							while($row1 = $result1->fetch_assoc()){
								echo "<tr class='datos'>";
									echo "<td>".$row1["usu_nombres"]."</td>";
									echo "<td>".$row1["usu_apelidos"]."</td>";
									echo "<td>".$row1["usu_cedula"]."</td>";
									echo "<td>".$row1["usu_correo"]."</td>";
									echo "<td class='link_compra'><a href='perfil.php?usu=".$row1["usu_id"]."&codigo=".$codigo."'><i class='fas fa-user-edit' style='color:greenyellow;'></i></a></td>";
									if($row1["usu_estado_elimina"] == 'N'){
										echo "<td class='link_compra'><a href='../controladores/php/eliminar_usuario.php?usu=".$row1["usu_id"]."&codigo=".$codigo."'><i class='fas fa-trash-alt' style='color:red;'></i></a></td>";
									}else{
										echo "<td>ELIMINADO</td>";
									}
									
								echo "</tr>";
							}
						?>
                   	</table>
                   </div>
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
				<li><a href="evento.php?codigo=<?php echo $codigo?>">Facturas</a></li>
				<li><a href="evento.php?codigo=<?php echo $codigo?>">Eventos</a></li>
				<li><a href="empresa.php?codigo=<?php echo $codigo?>">Empresa</a></li>
				<li><a href="usuario.php?codigo=<?php echo $codigo?>">Usuarios</a></li>
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