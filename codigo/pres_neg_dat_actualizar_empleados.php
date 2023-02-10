<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion de empleados</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_administrador.php'); ?>
    <main>
    <?php
    class Usuarios
    {
        public function actualizar($id_usuario)
        {
            include('conexion.php');
            $sql = "SELECT * FROM usuarios where id_usuario='$id_usuario'";
	        if(!$result = $db->query($sql)):
		        die('Hay un error primera consulta!!! ['.$db->error.']');
            endif;

            while ($row=$result->fetch_assoc()):
                $id_usuario=stripslashes($row["id_usuario"]);
                $documento=stripslashes($row["documento"]);
                $nombres=stripslashes($row["nombres"]);
                $apellidos=stripslashes($row["apellidos"]);
            endwhile;

            echo "<section class='container'>";
                echo "<article class='article__icon-triangle'> </article>";
                echo "<h2>EMPLEADOS</h2>";
                echo "<article class='article__container-form'>";
                    echo "<form method='POST' action='neg_dat_actualizar_empleados.php'>";
                        echo "<input type='hidden' name='id_usuario' value='$id_usuario'>";
                        echo "<label for='documento'>Documento</label>";
                        echo "<input type='int' id='documento' name='documento' placeholder='Ingresar documento' value='$documento' required>";
                        echo "<label for='nombre'>Nombres</label>";
                        echo "<input type='text' id='nombre' name='nombres' placeholder='Ingresar descripcion de reparacion' value='$nombres' required>";
                        echo "<label for='apellido'>Apellidos</label>";
                        echo "<input type='text' id='apellido' name='apellidos' placeholder='Ingresar codigo de repuesto usado' value='$apellidos' required>";
                        echo "<input class='input__btn-color' type='submit'>";
                    echo "</form>";
                echo "</article>";
            echo "</section>";
        }
    }
    $nuevo=new Usuarios();
    $nuevo -> actualizar($_POST["id_usuario"]);

        
    ?>
    </main>
</body>
</html>