<?php

include ('ventana_observaciones.php');

class Observaciones//inicio clase
{  
	public function actualizar($id_observaciones,$descripcion_reparacion,$cod_repuesto,$documento,$fecha_salida)
{
	include("conexion.php");

	mysqli_query($db,"UPDATE observaciones SET descripcion_reparacion='$descripcion_reparacion', cod_repuesto='$cod_repuesto', documento='$documento', fecha_salida='$fecha_salida' WHERE id_observaciones='$id_observaciones'");
		
}
}
$nuevo =new Observaciones ();
$nuevo->actualizar($_POST["id_observaciones"],$_POST["descripcion_reparacion"],$_POST["cod_repuesto"],$_POST["documento"],$_POST["fecha_salida"]);

?>