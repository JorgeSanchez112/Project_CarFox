<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion de propietarios</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_mecanico.php'); ?>
    <main>
    <?php
    class Propietarios
    {
        public function actualizar($id_propietario)
        {
            include('conexion.php');
            $sql = "SELECT * FROM propietarios where id_propietario='$id_propietario'";
	        if(!$result = $db->query($sql)):
		        die('Hay un error primera consulta!!! ['.$db->error.']');
            endif;

            while ($row=$result->fetch_assoc()):
                $id_propietario=stripslashes($row["id_propietario"]);
                $doc_propietario=stripslashes($row["doc_propietario"]);
                $nombres=stripslashes($row["nombres"]);
                $apellidos=stripslashes($row["apellidos"]);
            endwhile;

            echo "<section class='container'>";
                echo "<article class='article__icon-triangle'> </article>";
                echo "<h2>PROPIETARIOS</h2>";
                echo "<article class='article__container-form'>";
                    echo "<form method='POST' action='neg_dat_actualizar_propietarios_mecanico.php'>";
                        echo "<input type='hidden' name='id_propietario' value='$id_propietario'>";
                        echo "<input type='hidden' id='documento' name='doc_propietario' placeholder='Ingresar documento' value='$doc_propietario' oninput='maxLengthCheck(this)' maxlength = '10'>";
                        echo "<label for='nombre'>Nombres</label>";
                        echo "<input type='text' id='nombre' name='nombres' placeholder='Ingresar descripcion de reparacion' value='$nombres' maxlength='25'>";
                        echo "<label for='apellido'>Apellidos</label>";
                        echo "<input type='text' id='apellido' name='apellidos' placeholder='Ingresar codigo de repuesto usado' value='$apellidos' maxlength='25'>";
                        echo "<input class='input__btn-color' type='submit'>";
                    echo "</form>";
                echo "</article>";
            echo "</section>";
        }
    }
    $nuevo=new Propietarios();
    $nuevo -> actualizar($_POST["id_propietario"]);

        
    ?>
    </main>
</body>
<script src="js/maxLengthNumber.js"></script>