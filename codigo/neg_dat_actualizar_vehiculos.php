<?php

include ('ventana_vehiculos.php');

class vehiculo
{
    public function actualizar($id_vehiculo, $placa ,$marca, $modelo, $tipo_de_vehiculo, $mecanico, $doc_propietario)
    {

        include("conexion.php");

        mysqli_query($db,"UPDATE vehiculos SET placa='$placa', marca='$marca', modelo='$modelo', tipo_de_vehiculo='$tipo_de_vehiculo', mecanico='$mecanico', doc_propietario='$doc_propietario' WHERE id_vehiculo='$id_vehiculo'");
    }
}

$nuevo= new vehiculo();
$nuevo->actualizar($_POST["id_vehiculo"],$_POST["placa"],$_POST["marca"],$_POST["modelo"],$_POST["tipo"],$_POST["mecanico"],$_POST["doc_propietario"]);

?>