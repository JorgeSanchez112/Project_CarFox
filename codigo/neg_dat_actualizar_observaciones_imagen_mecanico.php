<?php
include ('ventana_observaciones_mecanico.php');


class Observaciones//inicio clase
{  
	public function actualizar_imagen($id_observaciones,$nombre)
	{

		include ('destinobitacoras.php');

		include('conexion.php');

		//Se eliminan las imagenes para no causar problemas por si se insertan menos imagenes de las que habia.
		mysqli_query($db, "DELETE FROM imagen_reporte WHERE nombre='$nombre'");

		//Subir imagen de observaciones
		date_default_timezone_set("America/Bogota"); 
		$fecha_img = date("_Y-m-d Hi");

		$imagen= $_FILES['file']['name'][0];		
		$tipo_archivo = $_FILES['file']['type'][0];
		$tamano_archivo = $_FILES['file']['size'][0];

		if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 2000000))) {
			echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
			- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';		
		}else{ 
			$num=date("Gis");
			$imagenfinal=$num.$imagen;		 
		} 

		if (move_uploaded_file($_FILES['file']['tmp_name'][0],$destino.'/'.$imagenfinal)){	
			mysqli_query($db,"UPDATE observaciones SET imagenes='$imagenfinal' WHERE id_observaciones='$id_observaciones'");
		}

		//Registrar en la tabla imagen_reporte
		foreach($_FILES['file']['tmp_name'] as $key => $value){

			$imagen = $_FILES['file']['name'][$key];		
			$tipo_archivo = $_FILES['file']['type'][$key];
			$tamano_archivo = $_FILES['file']['size'][$key];

			$num=date("Gis");
			$imagenfinal2=$num.$imagen;	

			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 2000000))) {
				echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
				- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';		
			}

			if (move_uploaded_file($_FILES['file']['tmp_name'][$key],$destino.'/'.$imagenfinal2)){
				mysqli_query($db,"INSERT INTO imagen_reporte(id_img_reporte, nombre, urlimagen) VALUES (NULL,'$nombre','$imagenfinal2')");
			}
		}
					
	}

}
$nuevo =new Observaciones ();
$nuevo->actualizar_imagen($_POST["id_observaciones"],$_POST["nombre"]);

?>