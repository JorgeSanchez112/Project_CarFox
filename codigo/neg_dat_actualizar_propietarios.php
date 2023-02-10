<?php

include ('ventana_propietarios.php');

class Propietarios//inicio clase
{  
	public function actualizar($id_propietario,$doc_propietario,$nombres,$apellidos)
{
	include("conexion.php");

	mysqli_query($db,"UPDATE propietarios SET doc_propietario='$doc_propietario', nombres='$nombres', apellidos='$apellidos' WHERE id_propietario='$id_propietario'");
		
}
}
$nuevo =new Propietarios();
$nuevo->actualizar($_POST["id_propietario"],$_POST["doc_propietario"],$_POST["nombres"],$_POST["apellidos"]);

?>