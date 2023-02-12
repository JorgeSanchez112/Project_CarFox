<?php

include ('ventana_observaciones_mecanico.php');

class Observaciones//inicio clase
{  
	public function actualizar($id_observaciones,$placa,$cod_repuesto,$descripcion_reparacion,$documento,$fecha_entrada,$fecha_salida)
{
	include("conexion.php");

	mysqli_query($db,"UPDATE observaciones SET fk_placa='$placa', cod_repuesto='$cod_repuesto', descripcion_reparacion='$descripcion_reparacion', documento='$documento', fecha_entrada='$fecha_entrada',fecha_salida='$fecha_salida' WHERE id_observaciones='$id_observaciones'");
		
}
}
$nuevo =new Observaciones ();
$nuevo->actualizar($_POST["id_observaciones"],$_POST["placa"],$_POST["cod_repuesto"],$_POST["descripcion_reparacion"],$_POST["documento"],$_POST["fecha_entrada"],$_POST["fecha_salida"]);

?>