<?php
class Observaciones
{

	public function registrar($placa,$cod_repuesto,$descripcion_reparacion,$usuario_actual,$fecha_entrada,$fecha_salida)
	{
		include ('destinobitacoras.php');
	
                            $imagen= $_FILES['file']['name'];
							
                            $tipo_archivo = $_FILES['file']['type'];
						    $tamano_archivo = $_FILES['file']['size'];
                          //  $nomimag=$clave.'.png';

						  if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 2000000))) {
							echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
							- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';	
							
						 }else{
							$num=date("Gis");
							$imagenfinal=$num.$imagen;
								 
						 }
		
		include('conexion.php');


		if (move_uploaded_file($_FILES['file']['tmp_name'],$destino.'/'.$imagenfinal)){
		mysqli_query($db,"INSERT INTO observaciones(id_observaciones, fk_placa, cod_repuesto,descripcion_reparacion, documento, fecha_entrada, fecha_salida, imagenes) VALUES (NULL,'$placa','$cod_repuesto', '$descripcion_reparacion','$usuario_actual','$fecha_entrada','$fecha_salida','$imagenfinal')");
	}

		
	}
}
$nuevo=new Observaciones();
$nuevo-> registrar($_POST["placa"],$_POST["cod_repuesto"],$_POST["descripcion_reparacion"],$_SESSION["usuario_actual"],$_POST["fecha_entrada"],$_POST["fecha_salida"]);

?>
