<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../../public/vista/login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eventos</title>
    <style type="text/css">
        .holi{
            background: red;
        }
    </style>
</head>
<body>
<section class="grupo_eventos grupo_event_musica">
	<div class="eventos">
		 <?php
            include '../../../../config/conexion.php';
            $evento = $_GET['evt'];
			$codigo = $_GET['usuario'];
            $sql ="SELECT *
                FROM T_EVENTOS
				WHERE evt_desc like '%$evento%' AND
					  evt_estado_elimina ='N'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){
                            echo "<div class='column_event'>";
								echo "<img class='img_event' src='data:".$row['evt_img_tipo']."; base64,".base64_encode($row['evt_img'])."'>";
					 			echo "<h4 class='title_event'>".$row["evt_desc"]."</h4>";
					 			echo "<p>".$row['evt_fec_evento']."</p>";
					 			echo "<a href='resumen.php?evt=".$row["evt_id"]."&codigo=".$codigo."' class='link_event'>Ir al Evento</a>";
							echo "</div>";
                         }  
                }else{
                }      
        ?>
	</div>
</section>


</body>
</html>