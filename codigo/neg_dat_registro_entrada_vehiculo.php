<?php
include('ventana_entrada_vehiculo.php');

class Entrada_vehiculo
{

	public function registrar($fk_vehiculo,$estado,$descripcion_entrada)
	{
		include ('destinobitacoras.php');

			// Nombre de las imagenes
			date_default_timezone_set("America/Bogota"); 
			$fecha_img = date("_Y-m-d Hi");
			$nombreimg = $fk_vehiculo.$fecha_img;

			//Subir imagen de observaciones
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

			// Genera la hora actual
			date_default_timezone_set("America/Bogota"); 

			$fecha_entrada = date("Y-m-d H:i:s");

			include('conexion.php');

			if (move_uploaded_file($_FILES['file']['tmp_name'][0],$destino.'/'.$imagenfinal)){
				mysqli_query($db,"INSERT INTO entrada_vehiculo(id_entrada, estado, descripcion_entrada, fecha_entrada, imagenes_entrada, nombre_img_entrada, fk_vehiculo) VALUES (NULL, '$estado', '$descripcion_entrada','$fecha_entrada','$imagenfinal','$nombreimg','$fk_vehiculo')");
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

				include('conexion.php');

				if (move_uploaded_file($_FILES['file']['tmp_name'][$key],$destino.'/'.$imagenfinal2)){
					mysqli_query($db,"INSERT INTO imagen_reporte(id_img_reporte, nombre, urlimagen) VALUES (NULL,'$nombreimg','$imagenfinal2')");
				}
			}

	}
	
}

$nuevo=new Entrada_vehiculo();
$nuevo-> registrar($_POST["fk_vehiculo"],$_POST["estado"],$_POST["descripcion_entrada"]);

?>