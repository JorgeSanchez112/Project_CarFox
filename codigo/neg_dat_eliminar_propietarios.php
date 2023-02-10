<?php
class Propietarios
{
	public function eliminar ($id_propietario)
	{
		include ("conexion.php");
		
		mysqli_query($db, "DELETE FROM  propietarios WHERE id_propietario='$id_propietario'");

		header ("location:neg_dat_consultar_propietarios.php");
	}
}//termina la clase
$nuevo=new Propietarios();
$nuevo-> eliminar($_POST["id_propietario"]);
?>