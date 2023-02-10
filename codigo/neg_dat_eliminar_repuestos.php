<?php
class Repuestos
{
	public function eliminar ($id_repuesto)
	{
		include ("conexion.php");
		
		mysqli_query($db, "DELETE FROM  repuestos WHERE id_repuesto='$id_repuesto'");

		header ("location:neg_dat_consultar_repuestos.php");
	}
}//termina la clase
$nuevo=new Repuestos();
$nuevo-> eliminar($_POST["id_repuesto"]);
?>