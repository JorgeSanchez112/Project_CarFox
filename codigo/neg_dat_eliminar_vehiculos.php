<?php
class Vehiculos
{
	public function eliminar ($id_vehiculo)
	{
		include ("conexion.php");
		
		mysqli_query($db, "DELETE FROM  vehiculos WHERE id_vehiculo='$id_vehiculo'");

		header ("location:neg_dat_consultar_vehiculos.php");
	}
}//termina la clase
$nuevo=new Vehiculos();
$nuevo-> eliminar($_POST["id_vehiculo"]);
?>