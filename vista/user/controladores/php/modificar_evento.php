<?php
   
    session_start();
	include '../../../../config/conexion.php';
	date_default_timezone_set("America/Guayaquil");	

	$id = isset($_POST["id"]) ? trim($_POST["id"]): null;
    $codigoEvento=$_SESSION['codigoEvento'];
	//DATOS PARA CREAR EVENTO
	$fechaC = date("y-m-d h:i:s",time());
	$nombres =isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"): null;
	$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
	$fecha = isset($_POST["fecha"])? trim($_POST["fecha"]): null;
    $empresa = isset($_POST["emp"])?trim($_POST["emp"]):null;
    

	$nombre_archivo = $_FILES['imagenUpdate']['name'];
    $tipo_archivo = $_FILES['imagenUpdate']['type'];
    $tamano_archivo = $_FILES['imagenUpdate']['size'];

    	//PARA EL MAPA
	$latitud =  isset($_POST["latitud"])?trim($_POST["latitud"]):null;
	$longitud =  isset($_POST["longitud"])?trim($_POST["longitud"]):null;



    if($nombre_archivo == ''){
        $sql ="UPDATE T_EVENTOS 
        SET evt_desc = '$nombres',
            evt_fec_evento = STR_TO_DATE(REPLACE('$fecha','/','.') ,GET_FORMAT(date,'EUR')),
            evt_direccion = '$direccion',
            evt_latitud = '$latitud',
            evt_longitud = '$longitud'
         WHERE evt_id = $codigoEvento";
    }else{
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] .'/Proyecto_Hipermedial/images';
            $archivo_objetivo = fopen($_FILES['imagenUpdate']['tmp_name'],'r');
        $contenido=fread($archivo_objetivo,$tamano_archivo);
            $contenido = addslashes($contenido);
        fclose($archivo_objetivo);	
        $sql ="UPDATE T_EVENTOS 
        SET evt_desc = '$nombres',
            evt_fec_evento = STR_TO_DATE(REPLACE('$fecha','/','.') ,GET_FORMAT(date,'EUR')),
            evt_direccion = '$direccion',
            evt_latitud = '$latitud',
            evt_longitud = '$longitud',
            evt_img = '$contenido',
            evt_img_tipo = '$tipo_archivo'
           
         WHERE evt_id = $codigoEvento";

        $aG = isset($_POST["genA"]) ? trim($_POST["genA"]): null;
        $aT = isset($_POST["tribA"]) ? trim($_POST["tribA"]): null;
        $aP = isset($_POST["palA"]) ? trim($_POST["palA"]): null;
        $aV = isset($_POST["vipA"]) ? trim($_POST["vipA"]): null;
        $aB = isset($_POST["boxA"]) ? trim($_POST["boxA"]): null;
        $pG = isset($_POST["genP"]) ? trim($_POST["genP"]): null;
        $pT = isset($_POST["tribP"]) ? trim($_POST["tribP"]): null;
        $pP = isset($_POST["palP"]) ? trim($_POST["palP"]): null;
        $pV = isset($_POST["vipP"]) ? trim($_POST["vipP"]): null;
        $pB = isset($_POST["boxP"]) ? trim($_POST["boxP"]): null;


        if($conn->query($sql) === TRUE){
    
            if($aG!="" && $pG !=""){
                $sql1="UPDATE T_EVENTOS_ASIENTOS SET eat_precio ='$pG', eat_num_asientos='$aG' WHERE eat_evt_id='$id' " ;
                $result1=$conn->query($sql1);
            }
            if($aT!="" && $pT !=""){
                $sql1="UPDATE T_EVENTOS_ASIENTOS SET eat_precio='$pT', eat_num_asientos='$aT' WHERE eat_evt_id='$id' ";
                $result1=$conn->query($sql1);
            }
            if($aP!="" && $pP !=""){
                $sql1="UPDATE T_EVENTOS_ASIENTOS SET eat_precio='$pP', eat_num_asientos='$aP' WHERE eat_evt_id='$id' ";
                $result1=$conn->query($sql1);
            }
            if($aV!="" && $pV !=""){
                $sql1="UPDATE T_EVENTOS_ASIENTOS SET eat_precio='$pV', eat_num_asientos='$aV' WHERE eat_evt_id='$id' ";
                $result1=$conn->query($sql1);
            }
            if($aB!="" && $pB !=""){
                $sql1="UPDATE T_EVENTOS_ASIENTOS SET eat_precio='$pB', eat_num_asientos='$aB' WHERE eat_evt_id='$id' ";
                $result1=$conn->query($sql1);
            }
            header("Location: ../../vista/index.php?codigo=".$id);
        }else{
            echo "error";
        }


    };






	//ASIENTOS PARA EL EVENTO
	
	//IMAGEN
    // $archivo_objetivo = fopen($_FILES['imagenUpdate']['tmp_name'],'r');
    // $contenido=fread($archivo_objetivo,$tamano_archivo);
    // $contenido = addslashes($contenido);
    // fclose($archivo_objetivo);

	// $sql = "INSERT INTO T_EVENTOS VALUES(0,'$nombres',STR_TO_DATE(REPLACE('$fecha','/','.') ,GET_FORMAT(date,'EUR')),'$direccion',$latitud,$longitud,'$contenido','$tipo_archivo','D',0,'admin','$fechaC','N',$empresa)";


?>
