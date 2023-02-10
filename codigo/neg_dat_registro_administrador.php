<?php

class Usuarios
{

	public function registrar_administrador($documento,$nombres,$apellidos,$contrasena)
	{		
		include('conexion.php');

		$p_cifrada=password_hash($contrasena, PASSWORD_DEFAULT);

		mysqli_query($db,"INSERT INTO usuarios(id_usuario, documento, nombres, apellidos, contrasena) VALUES (NULL,'$documento', '$nombres','$apellidos','$p_cifrada')");
        
		$fk_id_rol="1";
		$nuevo="0";
		mysqli_query($db, "INSERT INTO permisos(id_permiso, documento, fk_id_rol, nuevo) VALUES (NULL,'$documento','$fk_id_rol','$nuevo')");

        unlink(pres_usuario_nuevo.php);

        header('location:index.php');
	}
}
$nuevo=new Usuarios();
$nuevo-> registrar_administrador($_POST["documento"],$_POST["nombre"],$_POST["apellido"],$_POST["documento"]);

?>