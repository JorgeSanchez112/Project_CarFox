<?php

include ('ventana_empleados.php');

class Usuarios
{

	public function registrar($documento,$nombres,$apellidos,$contrasena)
	{		
		include('conexion.php');

		$p_cifrada=password_hash($contrasena, PASSWORD_DEFAULT);

		mysqli_query($db,"INSERT INTO usuarios(id_usuario, documento, nombres, apellidos, contrasena) VALUES (NULL,'$documento', '$nombres','$apellidos','$p_cifrada')");
        
		$fk_id_rol="2";
		$nuevo="0";
		mysqli_query($db, "INSERT INTO permisos(id_permiso, documento, fk_id_rol, nuevo) VALUES (NULL,'$documento','$fk_id_rol','$nuevo')");
	}
}
$nuevo=new Usuarios();
$nuevo-> registrar($_POST["documento"],$_POST["nombre"],$_POST["apellido"],$_POST["documento"]);

?>