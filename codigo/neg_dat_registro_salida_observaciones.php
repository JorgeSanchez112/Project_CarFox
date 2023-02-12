<?php
Class Observaciones{

    public function registrar_salida($id_observaciones){

        include('conexion.php');

        // Genera la hora actual
		date_default_timezone_set("America/Bogota"); 
	
		$fecha_salida = date("Y-m-d H:i:s");

        // Insercion

        mysqli_query($db,"UPDATE observaciones SET fecha_salida='$fecha_salida' WHERE  id_observaciones='$id_observaciones'");

        $reporte = 1;

        mysqli_query($db,"UPDATE observaciones SET reporte='$reporte' WHERE  id_observaciones='$id_observaciones'");

        header ("location:neg_dat_consultar_observaciones.php");

    }
}

$nuevo = new Observaciones();
$nuevo-> registrar_salida($_POST["id_observaciones"]);

?>