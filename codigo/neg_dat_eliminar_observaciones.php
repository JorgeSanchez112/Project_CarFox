<?php

class Observaciones
{

	public function eliminar ($id_observaciones)
	{
		include ("conexion.php");

		//Cnsulta
		//echo $id_observaciones;
		$sql = "SELECT * FROM observaciones WHERE id_observaciones='$id_observaciones'";
	    if(!$result = $db->query($sql)):
		    die('Hay un error primera consulta!!! ['.$db->error.']');
        endif;
        
        while ($row=$result->fetch_assoc()):
            //echo "entrando";
            $iimagenes=stripslashes($row["imagenes"]);
        endwhile;
	
	    $ruta="imagenes/$iimagenes";
	
	    unlink($ruta);
		
		mysqli_query($db, "DELETE FROM  observaciones WHERE id_observaciones='$id_observaciones'");

		header ("location:neg_dat_consultar_observaciones.php");
	}
}//termina la clase
$nuevo=new Observaciones();
$nuevo-> eliminar($_POST["id_observaciones"]);
?>