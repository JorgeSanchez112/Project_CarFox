<?php
include('neg_seguridad_camb_contra.php');

class Camb_contra
{

	public function registrar($contrasena,$pregunta,$respuesta,$fk_documento)
	{		
		include('conexion.php');

		$p_cifrada=password_hash($contrasena, PASSWORD_DEFAULT);

		mysqli_query($db,"UPDATE usuarios SET contrasena='$p_cifrada' WHERE documento='$fk_documento'");

		$c_vieja=1;
		mysqli_query($db,"UPDATE permisos SET nuevo='$c_vieja' WHERE documento='$fk_documento'");
        
		mysqli_query($db, "INSERT INTO camb_contra(id_pregunta, preguntas, respuesta, fk_documento) VALUES (NULL,'$pregunta','$respuesta','$fk_documento')");

		header("location:neg_salir.php");
	}
}
$nuevo=new Camb_contra();
$nuevo-> registrar($_POST["contrasenac"],$_POST["pregunta"],$_POST["respuesta"],$_SESSION["usuario_actual"]);

?>