<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion de imagen</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_administrador.php'); ?>
    <main>
    <?php
    class  Entrada_vehiculo{
        public function actualizar_imagen($id_entrada,$nombre)
        {
            include("conexion.php");

            $sql = "SELECT * FROM entrada_vehiculo where id_entrada='$id_entrada'";
            if(!$result = $db->query($sql)):
                die('Hay un error primera consulta!!! ['.$db->error.']');
            endif;

            while ($row=$result->fetch_assoc()) :
                $id_entradad=stripslashes($row["id_entrada"]);
            endwhile;

            echo "<section class='container'>";
            echo "<article class='article__icon-triangle'> </article>";
            echo "<h2>ENTRADA VEHICULO</h2>";
            echo "<article class='article__container-form'>";
                    echo "<form method='POST' action='neg_dat_actualizar_entrada_vehiculo_imagen.php' enctype='multipart/form-data'>";
                    echo "<input type='hidden' name='id_entrada' value='$id_entrada'>";
                    echo "<input type='hidden' name='nombre' value='$nombre'>";
                    echo "<label for='foto_vehiculo'>Foto del vehiculo</label>";
                    echo "<input type='file' name='file[]' id='foto_vehiculo' multiple required>";
                    echo "<input class='input__btn-color' type='submit'>";
                    echo "</form>";
                echo "</article>";
            echo "</section>";


        }
    }
    $nuevo=new  Entrada_vehiculo();
    $nuevo-> actualizar_imagen($_GET["id_entrada"],$_GET["nombre"]);

    ?>
        
    </main>
</body>
</html>