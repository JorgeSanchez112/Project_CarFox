<?php

include ('ventana_empleados.php');

class Usuarios//inicio clase
{  
	public function actualizar($id_usuario,$documento,$nombres,$apellidos)
{
	include("conexion.php");

	mysqli_query($db,"UPDATE usuarios SET documento='$documento', nombres='$nombres', apellidos='$apellidos' WHERE id_usuario='$id_usuario'");
	
	mysqli_query($db,"UPDATE permisos SET documento='$documento' WHERE id_permiso='$id_usuario'");
	
	mysqli_query($db,"UPDATE camb_contra SET fk_documento='$documento' WHERE id_pregunta='$id_usuario'");
}
}
$nuevo =new Usuarios();
$nuevo->actualizar($_POST["id_usuario"],$_POST["documento"],$_POST["nombres"],$_POST["apellidos"]);

?>