<?php
include ('ventana_observaciones_mecanico.php');


class Observaciones//inicio clase
{  
	public function actualizar_imagen($id_observaciones)
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
		mysqli_query($db,"UPDATE observaciones SET imagenes='$imagenfinal' WHERE id_observaciones='$id_observaciones'");
		}
}
}
$nuevo =new Observaciones ();
$nuevo->actualizar_imagen($_POST["id_observaciones"]);

?>