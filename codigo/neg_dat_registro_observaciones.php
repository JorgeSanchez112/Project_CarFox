<?php
include('ventana_observaciones.php');

class Observaciones
{

	public function registrar($placa,$cod_repuesto,$descripcion_reparacion,$usuario_actual,$fecha_salida)
	{
		include ('destinobitacoras.php');

			// Nombre de las imagenes
			date_default_timezone_set("America/Bogota"); 
			$fecha_img = date("_Y-m-d Hi");
			$nombreimg = $placa.$fecha_img;

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

			//Variable para poder generar reporte o no
			$reporte = 0;

			include('conexion.php');

			if (move_uploaded_file($_FILES['file']['tmp_name'][0],$destino.'/'.$imagenfinal)){
				mysqli_query($db,"INSERT INTO observaciones(id_observaciones, fk_placa, cod_repuesto,descripcion_reparacion, documento, fecha_entrada, fecha_salida, imagenes, reporte, nombre_img) VALUES (NULL,'$placa','$cod_repuesto', '$descripcion_reparacion','$usuario_actual','$fecha_entrada','$fecha_salida','$imagenfinal','$reporte','$nombreimg')");
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

$nuevo=new Observaciones();
$nuevo-> registrar($_POST["placa"],$_POST["cod_repuesto"],$_POST["descripcion_reparacion"],$_SESSION["usuario_actual"],$_POST["fecha_salida"]);

?>