<?php

include ('ventana_entrada_vehiculo_mecanico.php');

class Entrada_vehiculo//inicio clase
{  
	public function actualizar($id_entrada,$placa,$estado,$descripcion_entrada,$fecha_entrada)
{
	include("conexion.php");

	mysqli_query($db,"UPDATE entrada_vehiculo SET estado='$estado', descripcion_entrada='$descripcion_entrada', fecha_entrada='$fecha_entrada', fk_vehiculo='$placa' WHERE id_entrada='$id_entrada'");
		
}
}
$nuevo =new Entrada_vehiculo ();
$nuevo->actualizar($_POST["id_entrada"],$_POST["placa"],$_POST["estado"],$_POST["descripcion_entrada"],$_POST["fecha_entrada"]);

?>