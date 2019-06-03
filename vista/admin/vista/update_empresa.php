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
   <?php
		$codigo = $_GET["codigo"];
		$emp = $_GET["emp"];
		include '../../../config/conexion.php';
		
		$sql="SELECT *
			  FROM T_EMPRESA
			  WHERE emp_id = $emp";
	
		$sql1="SELECT *
			  FROM T_USUARIOS
			  WHERE usu_id = $codigo";
		
		
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	
		$result1 = $conn->query($sql1);
		$row1 = $result1->fetch_assoc();

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
				<li class="menu__item"><a href="facturas.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="fas fa-ticket-alt"><span>Facturas</span></i></a></li>
				<li class="menu__item"><a href="evento.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="far fa-plus-square"><span>Eventos</span></i></a></li>
				<li class="menu__item"><a href="empresa.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="far fa-plus-square"><span>Empresa</span></i></a></li>
				<li class="menu__item"><a href="usuario.php?codigo=<?php echo $codigo?>" class="menu__link"><i class="fas fa-money-check-alt"><span>Usuarios</span></i></a></li>
			</ul>
		</div>
		<div class="rol">
			<a href="index.php?codigo=<?php echo $codigo?>" class="sesion"><i class="fas fa-smile-beam"><span>Bienvenido <?php echo $row1["usu_nombres"]; ?></span></i></a>
			<a href="../controladores/php/cerrar_sesion.php" class="sesion"><i class="fas fa-sign-in-alt" id="inicio"><span>Cerrar Sesión</span></i></a>
		</div>
	</nav>
    <div class="content">
        <h1 class="logo">Mi <span>Perfil</span></h1>
        <div class="contact-wrapper" style="display:block;">
            <div class="contact-form">
                <h3>Este es tu perfil</h3>
                <form action="../controladores/php/update_perfil_user.php" method="post" enctype="multipart/form-data">
                    <p>
                        <input type="text" name="id" id="id" value="<?php echo $row["emp_id"] ?>" hidden="hidden">
                         <input type="text" name="codi" id="codi" value="<?php echo $codigo ?>" hidden="hidden">
                        <label for="nombres">Nombre de la Empresa</label>
                        <input type="text" name="nombres" id="nombres" value="<?php echo $row["emp_nombre"]?>" onkeyup="validarLetras(this,'nombres')">
                    </p>
                    <p>
                        <label for="cedula">RUC</label>
                        <input type="text" name="cedula" id="cedula" value="<?php echo $row["emp_ruc"]?>" onkeyup="validarCedula();validarNumeros(this,'cedula')">
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
                        <?php
					    	$sqle="SELECT * 
								   FROM T_CATEGORIAS";
							$resulte = $conn->query($sqle);
						?>
                        <label for="ast">Escoge el tipo de Asiento</label>
                        <select name="ast" id="ast" onchange="cambio();">
                  			<?php
								while($rowe = $resulte->fetch_assoc()){
									if($rowe["cat_id"] == $row["emp_cat_id"]){
										echo "<option value=".$rowe['cat_id']." selected>".$rowe['cat_desc']."</option>";
									}else{
										echo "<option value=".$rowe['cat_id'].">".$rowe['cat_desc']."</option>";
									}
									
								}
							?>
                        </select>
                    </p>
                    <p class="block">
                        <input type="submit" value="Guardar Cambios" class="button" id="botonA">
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
				<li><a href="facturas.php?codigo=<?php echo $codigo?>">Facturas</a></li>
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
	<script type="text/javascript" src="../controladores/js/funcion.js"></script>
</body>
</html>
