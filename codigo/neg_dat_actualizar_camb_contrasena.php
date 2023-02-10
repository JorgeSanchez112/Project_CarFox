<?php
include('neg_seguridad_actualizar_camb_contra.php');

class Camb_contra
{

	public function registrar($documento,$contrasena)
	{		
		include('conexion.php');

		$p_cifrada=password_hash($contrasena, PASSWORD_DEFAULT);

		mysqli_query($db,"UPDATE usuarios SET contrasena='$p_cifrada' WHERE documento='$documento'");

		header("location:neg_salir.php");
	}
}
$nuevo=new Camb_contra();
$nuevo-> registrar($_SESSION["usuario_actual"],$_POST["contrasena"],);

?>