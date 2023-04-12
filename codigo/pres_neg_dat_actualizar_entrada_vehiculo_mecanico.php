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
    <?php include('header_mecanico.php'); ?>
    <main>
    <?php
    class Entrada_vehiculo
    {
        public function actualizar($id_entrada)
        {
            include('conexion.php');
            $sql = "SELECT * FROM entrada_vehiculo where id_entrada='$id_entrada'";
	        if(!$result = $db->query($sql)):
		        die('Hay un error primera consulta!!! ['.$db->error.']');
            endif;

            while ($row=$result->fetch_assoc()):
                $id_entradad=stripslashes($row["id_entrada"]);
                $estadod=stripslashes($row["estado"]);
                $descripcion_entradad=stripslashes($row["descripcion_entrada"]);
                $fecha_entradad=stripslashes($row["fecha_entrada"]);
                $imagenesd=stripslashes($row["imagenes_entrada"]);
                $nombre_imgd=stripslashes($row["nombre_img_entrada"]);
                $placad=stripslashes($row["fk_vehiculo"]);
            endwhile;

            echo "<section class='container'>";
                echo "<article class='article__icon-triangle'> </article>";
                echo "<h2>ENTRADA DE VEHICULO</h2>";
                echo "<article class='article__container-form'>";
                    echo "<form method='POST' action='neg_dat_actualizar_entrada_vehiculo_mecanico.php' enctype='multipart/form-data'>";
                        echo "<input type='hidden' name='id_entrada' value='$id_entradad' required>";
                        echo "<label for='placa'>Placa</label>";
                        echo "<input type='text' id='placa' name='placa' placeholder='Ingresar placa del vehiculo' value='$placad' maxlength='6'>";
                        echo "<label for='estado'>Estado</label>";
                        echo "<input type='text' id='estado' name='estado' placeholder='Ingresar estado del vehiculo' value='$estadod' maxlength='16'>";
                        echo "<label for='des_entrada'>Descripcion de entrada</label>";
                        echo "<input type='text' id='des_entrada' name='descripcion_entrada' placeholder='Ingresar descripcion de entrada' value='$descripcion_entradad' maxlength='70'>";
                        echo "<input type='hidden' name='fecha_entrada' id='fecha_entrada' value='$fecha_entradad' required>";
                        echo "<a class='btn__actualizar-imagen' href='pres_neg_dat_actualizar_imagen_entrada_vehiculo_mecanico.php?id_entrada=$id_entradad&nombre=$nombre_imgd'>Actualizar imagen</a>";
                        echo "<input class='input__btn-color' type='submit'>";
                    echo "</form>";
                echo "</article>";
            echo "</section>";
        }
    }
    $nuevo=new Entrada_vehiculo();
    $nuevo -> actualizar($_POST["id_entrada"]);
    ?>
    </main>
</body>
</html>