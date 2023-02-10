<?php

include('ventana_propietarios.php');

class Propietarios
{

	public function registrar($documento,$nombres,$apellidos)
	{		
		include('conexion.php');

		mysqli_query($db,"INSERT INTO propietarios(id_propietario, doc_propietario, nombres, apellidos) VALUES (NULL,'$documento', '$nombres','$apellidos')");
        
	}
}
$nuevo=new Propietarios();
$nuevo-> registrar($_POST["documento"],$_POST["nombres"],$_POST["apellidos"]);

?>