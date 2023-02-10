<?php

include ('ventana_repuestos.php');

class Repuestos//inicio clase
{
	public function actualizar($id_repuesto,$repuesto,$descripcion,$cod_repuesto,$entrada)
	{
		include ("conexion.php");
		mysqli_query($db,"UPDATE repuestos SET repuesto='$repuesto', descripcion='$descripcion', cod_repuesto='$cod_repuesto', entrada='$entrada' WHERE id_repuesto='$id_repuesto'");
	}
}
$nuevo =new Repuestos ();
$nuevo->actualizar($_POST["id_repuesto"],$_POST["repuesto"],$_POST["descripcion"],$_POST["cod_repuesto"],$_POST["entrada"]);

?>

