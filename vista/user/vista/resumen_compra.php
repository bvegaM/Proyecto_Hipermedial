<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>
 <?php
		$evt=$_GET["evt"];
		$evtId=$_GET["evtId"];
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
        <h1 class="logo">Revisa Tu <span>Compra</span></h1>
        <div class="contact-wrapper">
            <div class="contact-info">
                <h3>Selecciona la cantidad de Tickets a comprar</h3>
                <form enctype="multipart/form-data" style="display:block;">
                  <p>
                        <?php
					    	$sqle="SELECT * 
								   FROM T_EVENTOS,
			   					   T_EVENTOS_ASIENTOS,
			   					   T_TIPO_ASIENTO
			   					   WHERE evt_id=eat_evt_id AND
			   		 			      	 ast_id = eat_ast_id AND
					 					 eat_evt_id =$evt AND
										 eat_num_asientos > 0";
							$resulte = $conn->query($sqle);
						?>
                        <label for="ast">Escoge el tipo de Asiento</label>
                        <select name="ast" id="ast" onchange="cambio();">
                  			<?php
								while($rowe = $resulte->fetch_assoc()){
									if($rowe["ast_id"] == $evtId){
										echo "<option value=".$rowe['ast_id']." selected>".$rowe['ast_desc']."</option>";
									}else{
										echo "<option value=".$rowe['ast_id'].">".$rowe['ast_desc']."</option>";
									}
									
								}
							?>
                        </select>
                    </p>	
                   <p>
                   	 <label for="cant">Cantidad de Boletos </label>
                   	 <input type="number" name="cant" id="cant" value="0" min="0" max="3" step="1" onchange="cambiarCantidad();" onkeyup="cambiarCantidad();">
                   </p>
                   <p style="text-align:center display:block;"> 
                   	 Te recordamos que solo puedes escoger hasta tres boletos ya que más de 3 es excederse del limite acordado.
                   </p>
                </form>
            </div>
            <div class="contact-form">
                <h3>Vista Previa</h3>
                <form action="../controladores/php/crear_factura.php" method="post" onsubmit="return validar()" enctype="multipart/form-data" style="display:block;">
                  <input type="text" name="cnt" id="cnt" value="" hidden="hidden">
                  <input type="text" name="codigo" id="codigo" value="<?php echo $codigo;?>" hidden="hidden">
                  <input type="text" name="evento" id="evento" value="<?php echo $evt;?>" hidden="hidden">
                  <input type="text" name="eventoId" id="eventoId" value="<?php echo $evtId;?>" hidden="hidden">
                   <div class="cabecera" style="background: white;">
                   	<i class="fas fa-ticket-alt" style="font-size:35px; color:red;"></i>
                   	<h2 style="margin:0; font-size:20px; color:black;">TIcket Home</h2>
                   	<article class="datos">
                   		<p class="datos-info"><?php echo $row["usu_nombres"]?></p>
                   		<p class="datos-info"><?php echo $row["usu_cedula"]?></p>
                   		<p class="datos-info"><?php echo $row["usu_direccion"]?></p>
                   	</article>
                   </div>
                   <div class="detalle" style="background:white;">
                   	<table style="width:100%; color:black; text-align:center;">
                   		<tr>
                   			<th >Cantidad</th>
                   			<th>Descripcion</th>
                   			<th>Precio U</th>
                   			<th>Precio</th>
                   			<th>Eliminar</th>
                   		</tr>
                   		<br>
                   		<br>
                   		<br>
                   		<?php
	
						 $sql1="SELECT * 
			   					FROM T_EVENTOS,
								T_EVENTOS_ASIENTOS,
								T_TIPO_ASIENTO
								WHERE evt_id=eat_evt_id AND
			   		 				  ast_id = eat_ast_id AND
									  eat_evt_id =$evt ";
		
						$result1 = $conn->query($sql1);
						while($row1 = $result1->fetch_assoc()){
							
							 if($evtId == $row1["ast_id"]){
								echo "<tr id='d".$row1["ast_id"]."'>";
									echo "<td id='c".$row1["ast_id"]."'>1</td>";
									echo "<td style='font-size:13px;'>".$row1["evt_desc"]." ".$row1["ast_desc"]." </td>";
									echo "<td>$".$row1["eat_precio"]."</td>";
								 	echo "<td id='p".$row1["ast_id"]."'>$".$row1["eat_precio"]."</td>";
								 	echo "<td>"."<input type='text'  id='pU".$row1["ast_id"]."' value='".$row1["eat_precio"]."' hidden='hidden'>"."</td>";
								 	echo "<td>"."<input type='text'  name='pT".$row1["ast_id"]."' id='pT".$row1["ast_id"]."' value='".$row1["eat_precio"]."' hidden='hidden'>"."</td>";
								 	echo "<td>"."<input type='text'  name='cF".$row1["ast_id"]."' id='cF".$row1["ast_id"]."' value='1' hidden='hidden'>"."</td>";
								echo "</tr>";

							 }else{
								echo "<tr id='d".$row1["ast_id"]."' style='visibility:hidden;'>";
									echo "<td id='c".$row1["ast_id"]."'>1</td>";
									echo "<td style='font-size:13px;'>".$row1["evt_desc"]." ".$row1["ast_desc"]." </td>";
									echo "<td>$".$row1["eat_precio"]."</td>";
								 	echo "<td id='p".$row1["ast_id"]."'>$".$row1["eat_precio"]."</td>";
									echo "<td>"."<i class='fas fa-trash-alt' style='color:red;'></i>"."</td>";
								 	echo "<td>"."<input type='text'  id='pU".$row1["ast_id"]."' value='".$row1["eat_precio"]."' hidden='hidden'>"."</td>";
								 	echo "<td>"."<input type='text'  name='pT".$row1["ast_id"]."' id='pT".$row1["ast_id"]."' value='0' hidden='hidden'>"."</td>";
								 	echo "<td>"."<input type='text'  name='cF".$row1["ast_id"]."' id='cF".$row1["ast_id"]."' value='0' hidden='hidden'>"."</td>";
								echo "</tr>"; 
							 }
						}
						$sql1="SELECT * 
			   					FROM T_EVENTOS,
								T_EVENTOS_ASIENTOS,
								T_TIPO_ASIENTO
								WHERE evt_id=eat_evt_id AND
			   		 				  ast_id = eat_ast_id AND
									  eat_evt_id =$evt AND
									  ast_id = $evtId";
		
						$result1 = $conn->query($sql1);
						$row1 = $result1->fetch_assoc();
						echo "<input type='text'  name='nombreDesc' value='".$row1["evt_desc"]."' hidden='hidden'>";
						echo "<tr>";
                   				echo "<td></td>";
								echo "<td></td>";
                   				echo "<td style='font-weight: bolder;'>Subtotal:</td>";
                   				echo "<td id='total'>$".$row1["eat_precio"]."</td>";
								echo "<td>"."<input type='text' name='total' id='totalI' value='".$row1["eat_precio"]."' hidden='hidden'>"."</td>";
								echo "<td>"."<input type='text' name='total' id='totalR' value='".$row1["eat_precio"]."' hidden='hidden'>"."</td>";
                   		echo "</tr>";
						echo "<tr>";
                   				echo "<td></td>";
								echo "<td></td>";
                   				echo "<td style='font-weight: bolder;'>Iva:</td>";
                   				echo "<td id='iva'>0.12%</td>";
								echo "<td>"."<input type='text' name='total' id='totalI' value='".$row1["eat_precio"]."' hidden='hidden'>"."</td>";
								echo "<td>"."<input type='text' name='total' id='totalR' value='".$row1["eat_precio"]."' hidden='hidden'>"."</td>";
                   		echo "</tr>";	
						echo "<tr>";
                   				echo "<td></td>";
								echo "<td></td>";
                   				echo "<td style='font-weight: bolder;'>Total:</td>";
                   				echo "<td id='totalTo'>$".($row1["eat_precio"]+$row1["eat_precio"]*0.12)."</td>";
                   		echo "</tr>";	
						?>
                   		
                   	</table>
                   </div>
                    <p class="block">
                        <input type="submit" value="Comprar" class="button" id="botonA">
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
	<script src="../controladores/js/funciones.js"></script>
</body>
</html>