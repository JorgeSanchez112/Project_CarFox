<?php
class Usuarios
{
	public function eliminar ($id_usuario)
	{
		include ("conexion.php");
				
		mysqli_query($db, "DELETE FROM  usuarios WHERE id_usuario='$id_usuario'");

		header ("location:neg_dat_consultar_empleados.php");
	}
}//termina la clase
$nuevo=new Usuarios();
$nuevo-> eliminar($_POST["id_usuario"]);
?>