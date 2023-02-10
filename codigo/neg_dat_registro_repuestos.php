<?php

include('ventana_repuestos.php');

class Repuestos
{

	public function registrar($repuesto, $descripcion,$cod_repuesto,$entrada,$salida)
	{
		include ("conexion.php");
		mysqli_query($db, "INSERT INTO repuestos(id_repuesto, repuesto, descripcion, cod_repuesto, entrada, salida) VALUES (NULL,'$repuesto','$descripcion','$cod_repuesto','$entrada','$salida')");
	}
}
$nuevo=new Repuestos();
$nuevo-> registrar($_POST["repuesto"],$_POST["descripcion"],$_POST["cod_repuesto"],$_POST["entrada"],$_POST["salida"]);

?>