<?php
include('ventana_observaciones_mecanico.php');

class Observaciones
{

	public function registrar($placa, $descripcion_reparacion, $cod_repuesto, $usuario_actual,$fecha_salida)
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
				mysqli_query($db,"INSERT INTO observaciones(id_observaciones, descripcion_reparacion, cod_repuesto, documento, fecha_salida, imagenes, reporte, fk_entrada, nombre_img) VALUES (NULL, '$descripcion_reparacion', '$cod_repuesto','$usuario_actual','$fecha_salida','$imagenfinal','$reporte', '$placa', '$nombreimg')");
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

			//registrar el uso de un repuesto en la tabla repuestos
			$sql = "SELECT * FROM repuestos WHERE cod_repuesto = '$cod_repuesto'";
			if(!$result = $db->query($sql)):
				die('Hay un error segunda consulta!!! ['.$db->error.']');
			endif;

			while ($row=$result->fetch_assoc()):
				$id_repuestod=stripslashes($row["id_repuesto"]);
				$repuesto=stripslashes($row["repuesto"]);
				$entrada=stripslashes($row["entrada"]);
				$salida=stripslashes($row["salida"]);
			endwhile;

			$descuento = $salida + 1;

			mysqli_query($db,"UPDATE repuestos SET salida='$descuento' WHERE id_repuesto='$id_repuestod'");

	}
	
}

$nuevo=new Observaciones();
$nuevo-> registrar($_POST["placa"], $_POST["descripcion_reparacion"], $_POST["cod_repuesto"], $_SESSION["usuario_actual"], $_POST["fecha_salida"]);

?>