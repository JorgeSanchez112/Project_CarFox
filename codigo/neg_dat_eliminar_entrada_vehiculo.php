<?php

class Entrada_vehiculo
{

	public function eliminar ($id_entradad)
	{
		include ("conexion.php");

		//Eliminar observaciones
		$sql = "SELECT * FROM entrada_vehiculo WHERE id_entrada='$id_entradad'";
	    if(!$result = $db->query($sql)):
		    die('Hay un error primera consulta!!! ['.$db->error.']');
        endif;
        
        while ($row=$result->fetch_assoc()):
            $iimagenes=stripslashes($row["imagenes_entrada"]);
			$nnombre_img=stripslashes($row["nombre_img"]);
        endwhile;
	
	    $ruta="imagenes/$iimagenes";
	
	    unlink($ruta);
		
		mysqli_query($db, "DELETE FROM  entrada_vehiculo WHERE id_entrada='$id_entradad'");

		//Eliminar imagenes de reporte
		$sql1 = "SELECT * FROM imagen_reporte WHERE nombre='$nnombre_img'";
	    if(!$result1 = $db->query($sql1)):
		    die('Hay un error segunda consulta!!! ['.$db->error.']');
        endif;

		while ($row1=$result1->fetch_assoc()):
            $uurlimagen=stripslashes($row1["urlimagen"]);
        endwhile;

		$ruta2="imagenes/$uurlimagen";

		unlink($ruta2);

		mysqli_query($db, "DELETE FROM imagen_reporte WHERE nombre='$nnombre_img'");


		header ("location:neg_dat_consultar_entrada_vehiculo.php");
	}
}//termina la clase
$nuevo=new Entrada_vehiculo();
$nuevo-> eliminar($_POST["id_entrada"]);
?>