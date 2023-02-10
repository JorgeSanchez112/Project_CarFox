<?php

include('ventana_vehiculos.php');

class Vehiculos
{

	public function registrar($placa, $marca,$modelo,$tipo_de_vehiculo,$mecanico,$estado,$descripcion,$doc_propietario)
	{
		include ("conexion.php");
		mysqli_query($db, "INSERT INTO vehiculos(id_vehiculo, placa, marca, modelo, tipo_de_vehiculo, mecanico, estado, descripcion, doc_propietario) VALUES (NULL,'$placa','$marca','$modelo','$tipo_de_vehiculo','$mecanico','$estado','$descripcion','$doc_propietario')");

		
	}
}
$nuevo=new Vehiculos();
$nuevo-> registrar($_POST["placa"],$_POST["marca"],$_POST["modelo"],$_POST["tipo"],$_POST["mecanico"],$_POST["estado"],$_POST["descripcion"],$_POST["doc_propietario"]);

?>