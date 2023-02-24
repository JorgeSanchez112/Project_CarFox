<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion de observacion</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_administrador.php'); ?>
    <main>
    <?php
    class Observaciones
    {
        public function actualizar($id_observaciones)
        {
            include('conexion.php');
            $sql = "SELECT * FROM observaciones where id_observaciones='$id_observaciones'";
	        if(!$result = $db->query($sql)):
		        die('Hay un error primera consulta!!! ['.$db->error.']');
            endif;

            while ($row=$result->fetch_assoc()):
                $id_observaciones=stripslashes($row["id_observaciones"]);
                $placa=stripslashes($row["fk_placa"]);
                $descripcion_reparacion=stripslashes($row["descripcion_reparacion"]);
                $cod_repuesto=stripslashes($row["cod_repuesto"]);
                $documento=stripslashes($row["documento"]);
                $fecha_entrada=stripslashes($row["fecha_entrada"]);
                $fecha_salida=stripslashes($row["fecha_salida"]);
                $imagenes=stripslashes($row["imagenes"]);
                $nombre_img=stripslashes($row["nombre_img"]);
            endwhile;

            echo "<section class='container'>";
                echo "<article class='article__icon-triangle'> </article>";
                echo "<h2>OBSERVACIONES</h2>";
                echo "<article class='article__container-form'>";
                    echo "<form method='POST' action='neg_dat_actualizar_observaciones.php' enctype='multipart/form-data'>";
                        echo "<input type='hidden' name='id_observaciones' value='$id_observaciones' required>";
                        echo "<label for='placa'>Placa</label>";
                        echo "<input type='text' id='placa' name='placa' placeholder='Ingresar placa del vehiculo' value='$placa' maxlength='6'>";
                        echo "<label for='des_reparacion'>Descripcion de reparacion</label>";
                        echo "<input type='text' id='des_reparacion' name='descripcion_reparacion' placeholder='Ingresar descripcion de reparacion' value='$descripcion_reparacion' maxlength='70'>";
                        echo "<label for='cod_repuesto'>Codigo de repuesto</label>";
                        echo "<input type='text' id='cod_repuesto' name='cod_repuesto' placeholder='Ingresar codigo de repuesto usado' value='$cod_repuesto' maxlength='10'>";
                        echo "<input type='hidden' name='documento' placeholder='ingrese el documento' value='$documento'maxlength='15'>";
                        echo "<label for='fecha_entrada'>Fecha de entrada del vehiculo</label>";
                        echo "<input type='datetime-local' name='fecha_entrada' id='fecha_entrada' value='$fecha_entrada' required>";
                        echo "<label for='fecha_salida'>Fecha de salida del vehiculo</label>";
                        echo "<input type='datetime-local' name='fecha_salida' id='fecha_salida' value='$fecha_salida' required>";
                        echo "<a class='btn__actualizar-imagen' href='pres_neg_dat_actualizar_imagen.php?id_observaciones=$id_observaciones&nombre=$nombre_img'>Actualizar imagen</a>";
                        echo "<input class='input__btn-color' type='submit'>";
                    echo "</form>";
                echo "</article>";
            echo "</section>";
        }
    }
    $nuevo=new Observaciones();
    $nuevo -> actualizar($_POST["id_observaciones"]);
    ?>
    </main>
</body>
</html>